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

  // --- FAQ accordion --------------------------------------------------
  // The answers are in the HTML and visible without JS; this only collapses
  // them once the script runs, so a failed script leaves content readable.
  var faqs = document.querySelectorAll('.faq-item');
  Array.prototype.forEach.call(faqs, function (item) {
    var q = item.querySelector('.faq-q');
    if (!q) return;
    item.classList.add('is-collapsed');
    q.setAttribute('aria-expanded', 'false');
    q.addEventListener('click', function () {
      var open = !item.classList.toggle('is-collapsed');
      q.setAttribute('aria-expanded', String(open));
    });
  });

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
