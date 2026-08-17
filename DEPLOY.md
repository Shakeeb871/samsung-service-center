# Putting this site on samsung-servicecenterdubai.com (Bluehost)

Everything in this folder is the whole site. There is no build step, no
database and no installer — the files are the site.

## 1. Upload

1. Log in to Bluehost → **Advanced** (or **cPanel**) → **File Manager**.
2. Open **public_html**.
3. If anything is already in there (a default `index.html`, a "coming
   soon" page, an old site), select it and delete it first. Leave any
   `cgi-bin` folder alone.
4. Press **Upload**, choose `samsung-service-center.zip`, and wait for it
   to finish.
5. Go back to **public_html**, right-click the zip → **Extract** →
   **Extract Files**.
6. Delete the zip once it has extracted.

`index.php`, `about/`, `services/`, `inc/` and `assets/` must sit
directly inside **public_html** — not inside a folder called
`samsung-service-center`. If they landed in a subfolder, open it, select
everything, **Move** it up to `public_html`, then delete the empty
folder.

## 2. Turn on HTTPS

Bluehost → **Security** → **SSL/TLS Status** (or **Domains → SSL**) and
make sure the certificate for the domain is issued and active. The site
redirects to https by itself once the certificate exists; before that,
the redirect would loop.

## 3. Check it landed

Open **https://samsung-servicecenterdubai.com/deploy-check.php**. It
lists every file and image the server can see, and says plainly which are
missing. When it is all green, the upload is complete.

Then check these by eye:

- https://samsung-servicecenterdubai.com/
- https://samsung-servicecenterdubai.com/services/
- https://samsung-servicecenterdubai.com/services/samsung-ac-repair/
- https://samsung-servicecenterdubai.com/robots.txt
- https://samsung-servicecenterdubai.com/sitemap.xml

## 4. What is already handled

- **Indexing.** `inc/config.php` holds `LIVE_HOST`. On that domain the
  pages are indexable; on any other host serving the same files — the
  staging subdomain, a preview URL — every page sends `noindex`. Nothing
  to switch on or off by hand, and the two copies cannot compete for the
  same content in Google.
- **Domain in canonicals, sitemap and robots.txt.** All worked out from
  the address the visitor used, so nothing points at the old subdomain.
- **Folder position.** Every link is relative to wherever the files sit,
  so the site works at the domain root or inside a subfolder.
- **PHP.** Plain PHP, no framework, no Composer. Runs on PHP 7.4 and
  8.x. If Bluehost offers a choice, 8.1 or newer.

## 5. Still to fill in

- `inc/config.php` → `BIZ_EMAIL` is `info@example.com`. Put the real
  address in; it prints in the top bar, the footer and the contact page.
- `inc/config.php` → `BIZ_ADDRESS` currently reads "Dubai, United Arab
  Emirates". A full street address is better for local search.
- `assets/img/logo.png` — drop the real logo in and it replaces the drawn
  one automatically. Nothing else to change.

## 6. After launch

1. Google Search Console → add the property → verify → submit
   `https://samsung-servicecenterdubai.com/sitemap.xml`.
2. If the staging subdomain stays online, leave it exactly as it is. It
   already tells Google not to index it.
