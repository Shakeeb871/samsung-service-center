/* Mobile nav, FAQ accordions and the contact form submit.
   No dependencies — everything here is plain DOM. */

(function () {
  'use strict';

  // --- Mobile navigation ---------------------------------------------
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.getElementById('nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(open));
    });

    // A tap on any link closes the menu, otherwise it stays open over the
    // new page position on browsers that keep scroll state.
    nav.addEventListener('click', function (e) {
      if (e.target.tagName === 'A') {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // --- Services dropdown ----------------------------------------------
  // On desktop CSS handles it with :hover and :focus-within. This is for
  // touch, where neither exists, and for the keyboard.
  var subToggles = document.querySelectorAll('.sub-toggle');

  Array.prototype.forEach.call(subToggles, function (btn) {
    var item = btn.closest('.has-sub');
    if (!item) return;

    btn.addEventListener('click', function (e) {
      e.preventDefault();
      var open = item.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', String(open));
    });
  });

  // A click anywhere else closes an open menu. Without this a touch user
  // has no way to dismiss it except by opening another one.
  document.addEventListener('click', function (e) {
    Array.prototype.forEach.call(document.querySelectorAll('.has-sub.is-open'), function (item) {
      if (!item.contains(e.target)) {
        item.classList.remove('is-open');
        var b = item.querySelector('.sub-toggle');
        if (b) b.setAttribute('aria-expanded', 'false');
      }
    });
  });

  // Escape closes it and returns focus to the control that opened it,
  // which is what a keyboard user expects of any menu.
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    Array.prototype.forEach.call(document.querySelectorAll('.has-sub.is-open'), function (item) {
      item.classList.remove('is-open');
      var b = item.querySelector('.sub-toggle');
      if (b) { b.setAttribute('aria-expanded', 'false'); b.focus(); }
    });
  });

  // --- FAQ accordion --------------------------------------------------
  // The accordion is a <details>, so it opens, closes, takes the keyboard
  // and gets found by find-in-page with this script removed entirely. All
  // this adds is the height animation, which <details> has no way to do
  // on its own — the native element jumps.
  //
  // Everything below therefore bails out to the native behaviour rather
  // than to a broken one: no Web Animations API, reduced motion asked for,
  // or a row missing its panel, and the click is left alone.
  var faqs = document.querySelectorAll('.faq');
  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)');

  Array.prototype.forEach.call(faqs, function (row) {
    var summary = row.querySelector('summary');
    var panel = row.querySelector('.faq-body');
    if (!summary || !panel || !panel.animate) return;

    var anim = null;
    var closing = false;

    // Every handler checks it is still the current animation before
    // touching shared state. Without that check a cancelled animation's
    // handler runs AFTER its replacement has started and clears the
    // reference to it — so the next click finds nothing to cancel, the
    // old animation runs to completion, and its onfinish closes a row the
    // visitor has just reopened. That leaves details.open false with the
    // panel still at full height: shut according to the DOM, open on the
    // screen. Three fast clicks was enough to reproduce it.
    function play(from, to, fade, duration, done) {
      var previous = anim;
      var current = panel.animate(
        { height: [from + 'px', to + 'px'], opacity: fade },
        { duration: duration, easing: 'cubic-bezier(.4, 0, .2, 1)' }
      );

      anim = current;
      if (previous) previous.cancel();

      current.onfinish = function () {
        if (anim !== current) return;     // superseded — not ours to finish
        anim = null;
        if (done) done();
      };
      current.oncancel = function () {
        if (anim === current) anim = null;
      };
    }

    summary.addEventListener('click', function (e) {
      if (reduceMotion && reduceMotion.matches) return;   // native jump, by request

      e.preventDefault();

      // Where the panel is right now, so an interrupted animation carries
      // on from where it stopped instead of snapping to one end first.
      var here = anim ? panel.getBoundingClientRect().height : (row.open ? null : 0);

      // `closing` matters because the element is still open while the
      // close animation runs: without it a second click reads as "close
      // it again" and the row sticks shut.
      if (!row.open || closing) {
        closing = false;
        row.open = true;                  // has to render before it can be measured
        if (here === null) here = 0;
        play(here, panel.scrollHeight, [here ? 1 : 0, 1], 260, null);
      } else {
        closing = true;
        if (here === null) here = panel.scrollHeight;
        play(here, 0, [1, 0], 220, function () {
          row.open = false;
          closing = false;
        });
      }
    });
  });

  // --- Coverage rail --------------------------------------------------
  // Every panel is in the markup and visible without this script, so the
  // section works with JavaScript off. The script's only job is to hide
  // all but the selected one.
  var tabs = document.querySelectorAll('.cov-tab');
  var panels = document.querySelectorAll('.cov-panel');

  if (tabs.length && panels.length) {
    Array.prototype.forEach.call(panels, function (panel, i) {
      if (i !== 0) panel.classList.remove('is-on');
    });

    Array.prototype.forEach.call(tabs, function (tab, i) {
      tab.addEventListener('click', function () {
        Array.prototype.forEach.call(tabs, function (t) {
          t.classList.remove('is-on');
          t.setAttribute('aria-selected', 'false');
        });
        Array.prototype.forEach.call(panels, function (p) {
          p.classList.remove('is-on');
        });
        tab.classList.add('is-on');
        tab.setAttribute('aria-selected', 'true');
        if (panels[i]) panels[i].classList.add('is-on');
      });

      // Left and right arrows move between emirates, which is what a
      // keyboard user expects of anything built as a tab list.
      tab.addEventListener('keydown', function (e) {
        var next = e.key === 'ArrowRight' || e.key === 'ArrowDown' ? i + 1
                 : e.key === 'ArrowLeft'  || e.key === 'ArrowUp'   ? i - 1 : null;
        if (next === null) return;
        e.preventDefault();
        var target = tabs[(next + tabs.length) % tabs.length];
        target.focus();
        target.click();
      });
    });
  }

  // --- Error code index -----------------------------------------------
  // The chips are ordinary anchors, so with the script off they still jump
  // to the right fault and it can be opened by hand. This only saves that
  // second tap by opening it on the way.
  function openFault(hash) {
    if (!hash || hash.charAt(0) !== '#') return null;
    var target;
    try { target = document.querySelector(hash); } catch (err) { return null; }
    if (!target || target.tagName !== 'DETAILS') return null;
    target.open = true;
    return target;
  }

  document.addEventListener('click', function (e) {
    var link = e.target.closest ? e.target.closest('.code-index a, .quick-jump a') : null;
    if (!link) return;
    var target = openFault(link.getAttribute('href'));
    if (!target) return;
    // Scrolled here rather than left to the browser, because the row is
    // opened in the same frame and the native jump lands on its old height.
    e.preventDefault();
    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    if (history.replaceState) history.replaceState(null, '', link.getAttribute('href'));
    var summary = target.querySelector('summary');
    if (summary) summary.focus({ preventScroll: true });
  });

  // Someone arriving on a shared link to one fault should find it open.
  if (window.location.hash) openFault(window.location.hash);

  // --- Contact form ---------------------------------------------------
  var form = document.getElementById('enquiry-form');
  if (!form) return;

  var status = form.querySelector('.form-status');
  var submit = form.querySelector('button[type="submit"]');

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!form.reportValidity()) return;

    submit.disabled = true;
    var original = submit.textContent;
    submit.textContent = 'Sending…';
    status.className = 'form-status';
    status.textContent = '';

    fetch(form.action, {
      method: 'POST',
      body: new FormData(form),
      headers: { 'Accept': 'application/json' }
    })
      .then(function (r) { return r.json().catch(function () { return {}; }); })
      .then(function (data) {
        if (data && data.ok) {
          form.reset();
          status.className = 'form-status is-ok';
          status.textContent = data.message || 'Thanks — your message has been sent.';
        } else {
          status.className = 'form-status is-err';
          status.textContent = (data && data.message) ||
            'Something went wrong. Please call or WhatsApp us instead.';
        }
      })
      .catch(function () {
        status.className = 'form-status is-err';
        status.textContent = 'Network error. Please call or WhatsApp us instead.';
      })
      .then(function () {
        submit.disabled = false;
        submit.textContent = original;
      });
  });
})();
