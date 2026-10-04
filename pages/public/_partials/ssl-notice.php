<?php
// ============================================================
// SSL/TLS notice overlay.
//
// Full-page overlay rendered on top of the homepage. Styled to look
// like a plain browser/Apache error page - NOT the site design
// system. All CSS is inline and scoped under `.sslnotice-*` so it
// does not inherit from txh-design.css and does not leak out.
//
// After 15 seconds (or when the user clicks "Redirect Now") the
// overlay is removed and the real homepage is revealed underneath.
// External JS because the site-wide CSP in .htaccess only allows
// inline <script> by sha256 hash.
// ============================================================
?>
<div class="sslnotice-overlay" id="sslnotice-overlay" role="dialog" aria-modal="true" aria-labelledby="sslnotice-title">
  <style>
    html.sslnotice-locked, html.sslnotice-locked body { overflow: hidden !important; }

    .sslnotice-overlay {
      position: fixed;
      inset: 0;
      z-index: 2147483000;
      background: #ffffff;
      overflow: auto;
      -webkit-font-smoothing: auto;
      -moz-osx-font-smoothing: auto;
    }
    .sslnotice-overlay * {
      box-sizing: border-box;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
    }

    .sslnotice-wrap {
      max-width: 760px;
      margin: 48px auto;
      padding: 0 24px;
      color: #000000;
      font-size: 16px;
      line-height: 1.5;
    }

    .sslnotice-title {
      font-size: 28px;
      font-weight: bold;
      margin: 0 0 8px 0;
      color: #111111;
      letter-spacing: normal;
      text-transform: none;
    }

    .sslnotice-rule {
      border: 0;
      border-top: 1px solid #cccccc;
      margin: 16px 0 24px 0;
    }

    .sslnotice-p {
      margin: 0 0 14px 0;
      color: #000000;
    }

    .sslnotice-label {
      display: inline-block;
      min-width: 170px;
      font-weight: bold;
      color: #000000;
    }

    .sslnotice-status {
      color: #a00000;
      font-weight: bold;
    }

    .sslnotice-redirect {
      margin-top: 32px;
      padding: 16px 18px;
      border: 1px solid #cccccc;
      background: #f6f6f6;
      font-size: 14px;
      color: #000000;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 12px;
    }
    .sslnotice-redirect .sslnotice-countdown { font-weight: bold; }

    .sslnotice-btn {
      display: inline-block;
      padding: 6px 14px;
      border: 1px solid #808080;
      background: #eeeeee;
      color: #000000;
      font-size: 14px;
      text-decoration: none;
      cursor: pointer;
      border-radius: 0;
      line-height: 1.4;
    }
    .sslnotice-btn:hover { background: #dddddd; }
    .sslnotice-btn:focus { outline: 2px solid #0066cc; outline-offset: 1px; }

    .sslnotice-foot {
      margin-top: 32px;
      font-style: italic;
      font-size: 13px;
      color: #555555;
    }
  </style>

  <div class="sslnotice-wrap">
    <h1 class="sslnotice-title" id="sslnotice-title">SSL/TLS Configuration Issue</h1>
    <hr class="sslnotice-rule">

    <p class="sslnotice-p">
      A potential issue has been detected with this website's
      <b>SSL/TLS configuration</b>, which may affect secure HTTPS
      communication.
    </p>

    <p class="sslnotice-p">
      <span class="sslnotice-label">Recommended Action:</span>
      Please contact your <b>hosting provider</b> to review and
      resolve the SSL/TLS configuration.
    </p>

    <p class="sslnotice-p">
      <span class="sslnotice-label">Status:</span>
      <span class="sslnotice-status">Requires Attention</span>
    </p>

    <div class="sslnotice-redirect">
      <span>You will be redirected in <span class="sslnotice-countdown" id="sslnotice-countdown">15</span> seconds.</span>
      <button type="button" class="sslnotice-btn" id="sslnotice-redirect-now">Redirect Now</button>
    </div>

    <p class="sslnotice-foot">Titan X Holdings &mdash; titanxholdings.com</p>
  </div>
</div>
<script src="<?= txh_asset('../../assets/js/ssl-notice.js') ?>" defer></script>
