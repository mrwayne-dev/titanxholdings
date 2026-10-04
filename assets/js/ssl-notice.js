/* SSL/TLS notice overlay: visible countdown + manual dismiss.
   External rather than inline because the site-wide CSP in .htaccess
   only allows inline <script> by sha256 hash. 'self' covers this
   file. After the countdown reaches zero (or the user clicks Redirect
   Now) the overlay is removed and the real page is revealed. */
(function () {
  'use strict';

  var SECONDS = 15;
  var el      = document.getElementById('sslnotice-overlay');
  if (!el) return;

  document.documentElement.classList.add('sslnotice-locked');

  var countEl = document.getElementById('sslnotice-countdown');
  var btn     = document.getElementById('sslnotice-redirect-now');
  var remaining = SECONDS;

  function dismiss() {
    document.documentElement.classList.remove('sslnotice-locked');
    if (el && el.parentNode) el.parentNode.removeChild(el);
  }

  if (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      dismiss();
    });
  }

  var timer = setInterval(function () {
    remaining -= 1;
    if (countEl) countEl.textContent = remaining;
    if (remaining <= 0) {
      clearInterval(timer);
      dismiss();
    }
  }, 1000);
})();
