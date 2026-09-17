/*
    Starter — the interaction layer.

    Everything here is a progressive enhancement. With JavaScript off nothing
    is hidden and every link works; the matching transitions live in
    resources/css/site.css. Reduced motion short-circuits the reveals.
*/
document.documentElement.classList.add('js');

var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

headerState();
dropdowns();
mobileMenu();
markCurrentMenuItem();
reveals(document);

/* Transparent at the top; glass once content scrolls underneath (site.css #header rules). */
function headerState() {
    var header = document.getElementById('header');
    if (!header) return;
    function evaluate() { header.toggleAttribute('data-scrolled', window.scrollY > 8); }
    evaluate();
    window.addEventListener('scroll', evaluate, { passive: true });
}

/*
    Nav dropdowns. Hover opens after a short intent delay and closes after a
    longer one, so diagonal travel into the panel never slams it shut. Click
    toggles for touch; Escape and outside clicks dismiss; focus holds it open.
*/
function dropdowns() {
    var roots = document.querySelectorAll('[data-dropdown]');

    function closeOne(root) {
        root.classList.remove('is-open');
        var t = root.querySelector('[data-dropdown-trigger]');
        if (t) t.setAttribute('aria-expanded', 'false');
    }

    roots.forEach(function (root) {
        var trigger = root.querySelector('[data-dropdown-trigger]');
        var openTimer = null;
        var closeTimer = null;

        function open() {
            clearTimeout(closeTimer);
            roots.forEach(function (other) { if (other !== root) closeOne(other); });
            root.classList.add('is-open');
            if (trigger) trigger.setAttribute('aria-expanded', 'true');
        }

        root.addEventListener('pointerenter', function (e) {
            if (e.pointerType !== 'mouse') return;
            clearTimeout(closeTimer);
            openTimer = setTimeout(open, 50);
        });
        root.addEventListener('pointerleave', function (e) {
            if (e.pointerType !== 'mouse') return;
            clearTimeout(openTimer);
            closeTimer = setTimeout(function () { closeOne(root); }, 180);
        });
        if (trigger) {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                root.classList.contains('is-open') ? closeOne(root) : open();
            });
        }
        root.addEventListener('focusin', open);
        root.addEventListener('focusout', function (e) {
            if (!root.contains(e.relatedTarget)) closeOne(root);
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') roots.forEach(closeOne);
    });
    document.addEventListener('pointerdown', function (e) {
        roots.forEach(function (root) { if (!root.contains(e.target)) closeOne(root); });
    });
}

/* The mobile sheet: .menu-open on <html> shows it and locks scroll. */
function mobileMenu() {
    var toggle = document.querySelector('[data-mobile-toggle]');
    var panel = document.querySelector('[data-mobile-panel]');
    if (!toggle || !panel) return;
    var html = document.documentElement;

    function set(open) {
        html.classList.toggle('menu-open', open);
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    }
    toggle.addEventListener('click', function () { set(!html.classList.contains('menu-open')); });
    panel.addEventListener('click', function (e) { if (e.target.closest('a')) set(false); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') set(false); });
    window.matchMedia('(min-width: 64rem)').addEventListener('change', function (e) { if (e.matches) set(false); });
}

/* aria-current on the nav link matching the page. */
function markCurrentMenuItem() {
    var path = window.location.pathname.replace(/\/$/, '') || '/';
    document.querySelectorAll('#header nav a[href]').forEach(function (a) {
        var href = a.getAttribute('href').replace(/\/$/, '') || '/';
        if (href === path) a.setAttribute('aria-current', 'page');
    });
}

/* Scroll reveals: flip .is-visible once; anything above the fold shows at once. */
function reveals(root) {
    var targets = root.querySelectorAll('[data-reveal]');
    if (reduceMotion || !('IntersectionObserver' in window)) {
        targets.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.05 });

    targets.forEach(function (el) {
        if (el.getBoundingClientRect().top < window.innerHeight * 0.92) {
            el.classList.add('is-visible');
        } else {
            observer.observe(el);
        }
    });
}
