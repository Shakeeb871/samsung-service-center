# Deploying this site

The site is PHP. It runs two ways, from the same repository.

## GitHub Pages (what the domain uses)

GitHub Pages serves files and does not run PHP, so the PHP here never
reaches the web. `build.php` renders every page once and writes plain
HTML into `dist/`, and that is what gets published.

`.github/workflows/deploy.yml` does it automatically: **every push to
`main` rebuilds and republishes.** Nothing to click.

To build locally and look at the result:

```
php build.php
cd dist && php -S 127.0.0.1:8000
```

The build refuses to finish if a page came out carrying `noindex`, or if
any raw PHP is left in the output. Both would otherwise ship silently.

### One-time setup in GitHub

1. **Settings → Pages → Build and deployment → Source: GitHub Actions.**
2. **Settings → Pages → Custom domain:** `samsung-servicecenterdubai.com`,
   then tick **Enforce HTTPS** once the certificate is issued (this can
   take up to an hour after the DNS records resolve).

`build.php` writes the `CNAME` file itself, so the custom domain survives
every republish.

### DNS at the registrar

Point the apex at GitHub and `www` at the Pages host:

| Type  | Name | Value                     |
|-------|------|---------------------------|
| A     | @    | 185.199.108.153           |
| A     | @    | 185.199.109.153           |
| A     | @    | 185.199.110.153           |
| A     | @    | 185.199.111.153           |
| CNAME | www  | `<user>.github.io`        |

Delete any old A record or parking record for `@` first. Nothing else on
the domain needs to change; MX records for email stay exactly as they
are.

### The enquiry forms

There is no PHP to post to on Pages, so with no endpoint configured the
forms are not printed at all — their place is taken by the call and
WhatsApp panel. A form that throws messages away is worse than no form.

To switch them back on, create a form at formspree.io and set its URL in
**Settings → Secrets and variables → Actions → Variables** as
`FORM_ENDPOINT`. The next push picks it up. Nothing in the markup or the
JavaScript changes — the form already posts by fetch and reads back
`{ok: true}`, which is what Formspree answers.

## PHP hosting (cPanel, Bluehost, anywhere with PHP)

Upload the repository as it is — no build step. `index.php`, `about/`,
`services/`, `inc/` and `assets/` go directly in `public_html`. The
enquiry forms work through `api/contact.php` with no configuration.

## Both

- **Indexing follows the domain.** `LIVE_HOST` in `inc/config.php` names
  the real address; anything else serving these files sends `noindex`, so
  a staging copy can never compete with the live site for its own
  content.
- **Canonical tags, sitemap and robots.txt** are worked out from the
  address in use, so they never point at an old host.
- **Folder position does not matter.** Every link is relative to wherever
  the files sit.

## Still to fill in

- `inc/config.php` → `BIZ_EMAIL` is still `info@example.com`.
- `inc/config.php` → `BIZ_ADDRESS` is "Dubai, United Arab Emirates". A
  full street address is better for local search.
- `assets/img/logo.png` — drop the real logo in and it replaces the drawn
  one automatically.
