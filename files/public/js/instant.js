/*
    Instant navigation — pages change in place.

    Hovering, focusing, touching or pressing a link fetches its page into
    memory; a click swaps this page's <main> for that page's <main>, at once
    when it was already fetched. The title, the address, back and forward, and
    the scroll position all behave as a full page load would. Once the page is
    idle the header's links are fetched ahead of any intent.

    The switch is `data-instant-navigation` on <body>. A layout with a different
    header or footer names itself (`data-instant-navigation="auth"`): pages swap
    only between layouts of the same name, and a move between two names is an
    ordinary page load, since everything outside <main> has to change. A link or a region
    carrying `data-instant-navigation="false"` is left to the browser, as are
    links to other sites, files, mailto:/tel:, new tabs and downloads. Anything
    that cannot be swapped — an error page, a redirect off the site, a page
    without <main> or without the switch — becomes an ordinary page load, so a
    visitor never meets a blank page.

    The header, the footer and the layout's scripts run once per visit. After
    each change `site:navigated` fires on document with
    { url, main } — main.js listens for it and sets up the new content.

    While a page that was not fetched ahead is on its way, <html> carries
    `is-navigating` and a thin `.nav-progress` bar shows; restyle either in
    site.css. No dependency, no build step. With JavaScript off, every link is
    an ordinary link.
*/
(function () {
    if (window.__instantNavigation) return;

    var body = document.body;
    var root = document.documentElement;

    function off(value) {
        value = String(value === null ? '' : value).toLowerCase();
        return value === 'false' || value === 'off' || value === '0';
    }

    var framed = false;
    try { framed = window.self !== window.top; } catch (e) { framed = true; }

    if (
        !body ||
        !body.hasAttribute('data-instant-navigation') ||
        off(body.getAttribute('data-instant-navigation')) ||
        framed || // an editor or preview frame loads pages whole
        !window.fetch || !window.DOMParser || !window.URL || !window.Map ||
        !window.history || !window.history.pushState ||
        !document.querySelector('main')
    ) {
        return;
    }
    window.__instantNavigation = true;

    var TTL = 5 * 60 * 1000;   // a fetched page answers clicks for five minutes
    var MAX_ENTRIES = 40;
    var HOVER_DELAY = 80;      // a pointer passing over a link is not intent
    var PROGRESS_DELAY = 120;  // a page already in memory never shows the bar
    var WARM_LIMIT = 10;

    var cache = new Map();
    var inflight = new Map();
    var current = keyOf(new URL(location.href));
    var sequence = 0;
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function keyOf(url) { return url.pathname + url.search; }

    function saveData() {
        var connection = navigator.connection;
        if (!connection) return false;
        return connection.saveData === true || /(^|[^0-9])2g$/.test(String(connection.effectiveType || ''));
    }

    function modified(event) { return event.metaKey || event.ctrlKey || event.shiftKey || event.altKey; }

    function isPage(pathname) {
        var last = pathname.split('/').pop() || '';
        var dot = last.lastIndexOf('.');
        if (dot === -1) return true;
        var extension = last.slice(dot + 1).toLowerCase();
        return extension === 'html' || extension === 'htm';
    }

    /* The link under an event target, if it is one this runtime handles. */
    function linkFor(target) {
        var link = target && target.closest ? target.closest('a[href]') : null;
        if (!link) return null;

        var href = link.getAttribute('href');
        var linkTarget = link.getAttribute('target');
        var rel = ' ' + (link.getAttribute('rel') || '') + ' ';
        if (!href || link.hasAttribute('download') || (linkTarget && linkTarget !== '_self') || rel.indexOf(' external ') !== -1) return null;

        var scope = link.closest('[data-instant-navigation]');
        if (scope && scope !== body && off(scope.getAttribute('data-instant-navigation'))) return null;

        var url;
        try { url = new URL(href, location.href); } catch (e) { return null; }
        if (url.origin !== location.origin || (url.protocol !== 'http:' && url.protocol !== 'https:') || !isPage(url.pathname)) return null;

        return { link: link, url: url };
    }

    function remember(key, entry) {
        cache.delete(key);
        cache.set(key, entry);
        while (cache.size > MAX_ENTRIES) cache.delete(cache.keys().next().value);
    }

    /* One request per address at a time; a fresh answer in memory is reused. */
    function load(url, preloading) {
        var key = keyOf(url);
        var hit = cache.get(key);
        if (hit && Date.now() - hit.at < TTL) return Promise.resolve(hit);

        var pending = inflight.get(key);
        if (pending) return pending;

        var init = { credentials: 'same-origin', headers: { Accept: 'text/html' } };
        if (preloading) init.priority = 'low';

        var request = fetch(key, init)
            .then(function (response) {
                var type = response.headers.get('Content-Type') || '';
                var final = url;
                try { final = new URL(response.url || url.href, location.href); } catch (e) { final = url; }
                if (!response.ok || type.indexOf('text/html') === -1 || final.origin !== location.origin) {
                    // nothing here to swap in; let the answer go, or its unread body holds the connection open
                    try { if (response.body) response.body.cancel(); } catch (e) {}
                    return { html: null, at: Date.now(), url: final };
                }
                return response.text().then(function (html) { return { html: html, at: Date.now(), url: final }; });
            })
            .catch(function () { return { html: null, at: 0, url: url }; })
            .then(function (entry) {
                inflight.delete(key);
                remember(key, entry);
                return entry;
            });

        inflight.set(key, request);
        return request;
    }

    function preload(url) {
        if (saveData() || keyOf(url) === current) return;
        load(url, true);
    }

    /* The layout's name: the switch's value, where bare / true / on all mean the unnamed, default one. */
    function frameOf(element) {
        var value = String(element.getAttribute('data-instant-navigation') || '').toLowerCase();
        return value === 'true' || value === 'on' || value === '1' ? '' : value;
    }

    function parse(html) {
        var doc = new DOMParser().parseFromString(html, 'text/html');
        var main = doc.querySelector('main');
        var next = doc.body;
        if (!main || !next || !next.hasAttribute('data-instant-navigation') || off(next.getAttribute('data-instant-navigation'))) return null;
        if (frameOf(next) !== frameOf(body)) return null; // another layout: its header and footer are not the ones on screen
        return { doc: doc, main: main };
    }

    /* A page may bring a stylesheet or a script the first page did not have. */
    function adopt(doc) {
        var main = doc.querySelector('main');

        doc.querySelectorAll('link[rel="stylesheet"][href]').forEach(function (node) {
            if (main.contains(node)) return;
            var href = node.getAttribute('href');
            var present = Array.prototype.some.call(document.querySelectorAll('link[rel="stylesheet"]'), function (l) { return l.getAttribute('href') === href; });
            if (!present) document.head.appendChild(document.importNode(node, true));
        });

        doc.querySelectorAll('script[src]').forEach(function (node) {
            if (main.contains(node) || !executable(node)) return;
            if (!hasScript(node.getAttribute('src'), null)) body.appendChild(cloneScript(node));
        });
    }

    function hasScript(src, ignore) {
        return Array.prototype.some.call(document.scripts, function (s) {
            return s.getAttribute('src') === src && !(ignore && ignore.contains(s));
        });
    }

    function executable(script) {
        var type = (script.getAttribute('type') || '').toLowerCase();
        return type === '' || type === 'module' || type === 'text/javascript' || type === 'application/javascript';
    }

    function cloneScript(source) {
        var script = document.createElement('script');
        Array.prototype.forEach.call(source.attributes, function (a) { script.setAttribute(a.name, a.value); });
        script.textContent = source.textContent;
        return script;
    }

    /* Scripts that arrive inside <main> are inert until re-created. */
    function runScripts(main) {
        main.querySelectorAll('script').forEach(function (script) {
            var src = script.getAttribute('src');
            if (!executable(script) || (src && hasScript(src, main))) return;
            script.parentNode.replaceChild(cloneScript(script), script);
        });
    }

    function syncHead(doc) {
        document.title = doc.title;
        sync(doc, 'meta[name="description"]', 'content');
        sync(doc, 'link[rel="canonical"]', 'href');
    }

    function sync(doc, selector, attribute) {
        var next = doc.querySelector(selector);
        var existing = document.querySelector(selector);
        if (next && existing) existing.setAttribute(attribute, next.getAttribute(attribute));
        else if (next) document.head.appendChild(document.importNode(next, true));
    }

    function scrollTo(x, y) {
        try { window.scrollTo({ left: x, top: y, behavior: 'instant' }); } catch (e) { window.scrollTo(x, y); }
    }

    function scrollToHash(hash) {
        var id = '';
        try { id = decodeURIComponent(hash.slice(1)); } catch (e) { id = hash.slice(1); }
        var target = id && (document.getElementById(id) || document.querySelector('a[name="' + id.replace(/"/g, '') + '"]'));
        if (!target) return false;
        settleOn(target);
        return true;
    }

    /*
        Scroll to an anchor and keep it there while the arriving page settles.
        Straight after a swap the new content is not laid out at its final size
        yet (styles for its classes are still being generated, images arrive),
        so one scroll lands somewhere above or below the section. Re-align each
        frame until the section has held still for a few frames, for at most
        1.5s, and stop the moment the visitor scrolls on their own.
    */
    var settling = null;
    function settleOn(target) {
        if (settling) settling();
        var stop = false, last = null, still = 0, start = Date.now();
        function align() { try { target.scrollIntoView({ behavior: 'instant', block: 'start' }); } catch (e) { target.scrollIntoView(true); } }
        function cancel() {
            stop = true;
            ['wheel', 'touchstart', 'keydown', 'pointerdown'].forEach(function (type) { window.removeEventListener(type, cancel, true); });
            settling = null;
        }
        ['wheel', 'touchstart', 'keydown', 'pointerdown'].forEach(function (type) { window.addEventListener(type, cancel, { capture: true, passive: true }); });
        settling = cancel;
        align();
        (function tick() {
            if (stop || !target.isConnected) return cancel();
            var top = Math.round(target.getBoundingClientRect().top);
            still = top === last ? still + 1 : 0;
            last = top;
            if (still >= 6 || Date.now() - start > 1500) return cancel();
            align();
            requestAnimationFrame(tick);
        })();
    }

    /* The scroll position rides on the history entry, so back returns to it. */
    function rememberScroll() {
        var state = history.state && typeof history.state === 'object' ? history.state : {};
        state = Object.assign({}, state, { instant: true, scroll: [window.scrollX, window.scrollY] });
        try { history.replaceState(state, '', location.href); } catch (e) {}
    }

    var progress = null;
    var progressTimer = null;

    function installStyles() {
        if (document.querySelector('style[data-instant-navigation-styles]')) return;
        var style = document.createElement('style');
        style.setAttribute('data-instant-navigation-styles', '');
        style.textContent =
            '.nav-progress{position:fixed;top:0;left:0;height:2px;width:0;z-index:2147483647;pointer-events:none;' +
            'background:var(--accent,currentColor);transition:width .5s ease-out,opacity .3s ease}' +
            '@media (prefers-reduced-motion:reduce){.nav-progress{transition:none}}';
        document.head.insertBefore(style, document.head.firstChild); // first, so site.css wins
    }

    function showProgress() {
        if (progress) return;
        progress = document.createElement('div');
        progress.className = 'nav-progress';
        progress.setAttribute('aria-hidden', 'true');
        body.appendChild(progress);
        window.requestAnimationFrame(function () { if (progress) progress.style.width = '70%'; });
    }

    function hideProgress() {
        window.clearTimeout(progressTimer);
        progressTimer = null;
        if (!progress) return;
        var node = progress;
        progress = null;
        node.style.width = '100%';
        node.style.opacity = '0';
        window.setTimeout(function () { if (node.parentNode) node.parentNode.removeChild(node); }, 320);
    }

    function setLoading(on) {
        root.classList.toggle('is-navigating', on);
        if (!on) return hideProgress();
        if (!progressTimer && !progress) progressTimer = window.setTimeout(showProgress, PROGRESS_DELAY);
    }

    function visit(url, options) {
        var seq = ++sequence;
        setLoading(true);
        load(url, false).then(function (entry) {
            if (seq !== sequence) return; // a newer click won
            setLoading(false);

            var page = entry.html ? parse(entry.html) : null;
            var target = document.querySelector('main');
            if (!page || !target) {
                if (options.push) location.assign(url.href); else location.reload();
                return;
            }
            render(page, entry.url, url.hash, target, options);
        });
    }

    function render(page, finalUrl, hash, target, options) {
        if (options.push) {
            var destination = keyOf(finalUrl) + hash;
            rememberScroll();
            try {
                if (keyOf(finalUrl) === current) history.replaceState({ instant: true }, '', destination);
                else history.pushState({ instant: true }, '', destination);
            } catch (e) {
                location.assign(finalUrl.href + hash);
                return;
            }
        }

        var fresh = null;

        function swap() {
            adopt(page.doc);
            fresh = document.adoptNode(page.main);
            target.parentNode.replaceChild(fresh, target);
            current = keyOf(finalUrl);
            runScripts(fresh);
            syncHead(page.doc);

            if (options.scroll) scrollTo(options.scroll[0], options.scroll[1]);
            else if (!hash || !scrollToHash(hash)) scrollTo(0, 0);

            if (!fresh.hasAttribute('tabindex')) fresh.setAttribute('tabindex', '-1');
            try { fresh.focus({ preventScroll: true }); } catch (e) {}

            document.dispatchEvent(new CustomEvent('site:navigated', { detail: { url: location.href, main: fresh }, bubbles: true }));
        }

        // Whatever goes wrong mid-swap, the visitor still gets the page: load it whole.
        function guarded() {
            try { swap(); } catch (e) { location.assign(finalUrl.href + hash); }
        }

        // Where the browser can, the swap rides the same cross-fade site.css gives full page loads.
        if (document.startViewTransition && !reduceMotion) {
            // A cross-fade the browser skips (the viewport changed size mid-way, another one began) has
            // still run the swap; its `ready` rejects, and unheard that surfaces as a script error.
            var transition = document.startViewTransition(guarded);
            if (transition && transition.ready) transition.ready.catch(function () {});
        } else guarded();
    }

    /* Intent: a resting pointer, keyboard focus, a touch, a press. */
    var hoverTimer = null;
    var hovered = null;

    document.addEventListener('mouseover', function (event) {
        var found = linkFor(event.target);
        if (!found || found.link === hovered) return;
        window.clearTimeout(hoverTimer);
        hovered = found.link;
        hoverTimer = window.setTimeout(function () { hovered = null; preload(found.url); }, HOVER_DELAY);
    }, { passive: true });

    document.addEventListener('mouseout', function (event) {
        if (hovered && hovered.contains(event.target) && !hovered.contains(event.relatedTarget)) {
            window.clearTimeout(hoverTimer);
            hovered = null;
        }
    }, { passive: true });

    document.addEventListener('focusin', function (event) {
        var found = linkFor(event.target);
        if (found) preload(found.url);
    });

    document.addEventListener('touchstart', function (event) {
        var found = linkFor(event.target);
        if (found) preload(found.url);
    }, { passive: true });

    document.addEventListener('pointerdown', function (event) {
        if (event.button !== 0 || modified(event)) return;
        var found = linkFor(event.target);
        if (found) preload(found.url);
    }, { passive: true });

    /* Ahead of any intent: once the page is idle, fetch where the navigation leads. */
    function warmNavigation() {
        if (saveData()) return;
        var links = document.querySelectorAll('nav a[href], [role="navigation"] a[href]');
        var seen = {};
        var count = 0;
        for (var i = 0; i < links.length && count < WARM_LIMIT; i++) {
            var found = linkFor(links[i]);
            if (!found) continue;
            var key = keyOf(found.url);
            if (key === current || seen[key]) continue;
            seen[key] = true;
            count++;
            load(found.url, true);
        }
    }

    function whenIdle(fn) {
        if (window.requestIdleCallback) window.requestIdleCallback(fn, { timeout: 2000 });
        else window.setTimeout(fn, 1500);
    }

    if (document.readyState === 'complete') whenIdle(warmNavigation);
    else window.addEventListener('load', function () { whenIdle(warmNavigation); });

    document.addEventListener('click', function (event) {
        if (event.defaultPrevented || event.button !== 0 || modified(event)) return;
        var found = linkFor(event.target);
        if (!found) return;
        rememberScroll();
        if (found.url.hash && keyOf(found.url) === current) return; // a jump within this page is the browser's
        event.preventDefault();
        visit(found.url, { push: true, scroll: null });
    });

    window.addEventListener('popstate', function (event) {
        var state = event.state;
        var url = new URL(location.href);
        if (keyOf(url) === current) {
            if (state && state.instant && state.scroll) scrollTo(state.scroll[0], state.scroll[1]);
            else if (url.hash) scrollToHash(url.hash);
            return;
        }
        if (!state || !state.instant) return;
        visit(url, { push: false, scroll: state.scroll || null });
    });

    if ('scrollRestoration' in history) history.scrollRestoration = 'manual';
    installStyles();
    rememberScroll();
})();
