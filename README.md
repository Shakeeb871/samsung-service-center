# samsung-service-center

Website for an independent Samsung appliance repair service in Dubai.
Currently deployed to **https://samsung.aiqonquickcool.com.my** through
cPanel Git Version Control.

Plain PHP with includes — no build step, no dependencies. Upload it and it
runs.

## Before this goes anywhere near a customer

Open `inc/config.php`. Every value marked `REPLACE` is a placeholder, and the
site is not usable until they are real:

- `BIZ_PHONE` and `BIZ_PHONE_LINK` — the call buttons currently dial nothing
- `BIZ_WHATSAPP` — every WhatsApp link points at an invalid number
- `BIZ_EMAIL` — where the contact form delivers
- `BIZ_ADDRESS` — or delete the address row from `contact.php` and the footer
  if there is no walk-in office

There is also no imagery yet. `assets/img/` does not exist, and the header
references a favicon that has not been added.

## Layout

```
index.php            Home
about.php            About              -> /about/
contact.php          Contact form       -> /contact/
404.php              Error page
services/
  index.php          Services hub       -> /services/
  samsung-*/         Seven service pages -> /services/<slug>/
inc/
  config.php         Business details, staging switch, service list
  header.php         <head>, nav, canonical, noindex
  footer.php         CTA band, footer, WhatsApp button
  landing-page.php   Shared layout for the seven service pages
  page-hero.php      The banner every inner page opens with
api/contact.php      Form handler, answers JSON
assets/css/style.css
assets/js/main.js    Mobile nav, FAQ accordion, form submit
.htaccess            Clean URLs, HTTPS, caching, security headers
```

`inc/` is blocked from the web in `.htaccess`. It holds config and template
fragments, none of which should be reachable by URL.

## Editing content

Service page copy lives in the page file itself as an `$LP` array — the
intro, the service centre block, the model range, the faults with the fix for
each, the process, the inspection list, support, coverage and the closing
block. `inc/landing-page.php` holds the structure, so a layout change is one
file rather than seven, and a new page is copy rather than markup.

Adding a service means creating `services/<slug>/index.php` with its `$LP`
array and adding an entry to `$SERVICES` in `inc/config.php`. The nav, footer, home grid, services hub and
the related-services block all read that array, so nothing else needs editing.

## Staging

`IS_STAGING` is `true` in `inc/config.php`, so every page sends
`noindex, nofollow`. The subdomain is not this site's final address, and
letting Google index it now would put a second copy of this content online
that competes with the real domain later.

Crawling is left open in `robots.txt` on purpose — a `Disallow: /` would stop
crawlers reading the noindex, which defeats it.

At launch, three things change together:

1. `IS_STAGING` to `false` and `SITE_URL` to the live domain, in `inc/config.php`
2. The `Sitemap:` line in `robots.txt`
3. Every `<loc>` in `sitemap.xml`

## Deploying

The repository is cloned directly into the folder the subdomain serves:

```
/home/carpente/samsung.aiqonquickcool.com.my
```

So a pull *is* the deployment — there is no copy step and no `.cpanel.yml`.
Pushing to `main` and then pressing **Update from Remote** in cPanel &rarr;
Git&trade; Version Control puts the change live. **Deploy HEAD Commit** is
not needed and does nothing.

Because the clone sits in the web root, `.htaccess` blocks `/.git/`,
`.gitignore` and `README.md` from being served. Do not remove those rules —
`/.git/config` is readable without them, and the whole history behind it.

If a pull ever refuses with *"local changes would be overwritten"*, it means
files in that folder were edited or uploaded outside git. Discard them and
take the remote as the truth:

```
cd /home/carpente/samsung.aiqonquickcool.com.my
git fetch origin main
git reset --hard origin/main
git clean -fd
```

## Mail

`api/contact.php` uses PHP `mail()`, which works on cPanel without setup but
lands in spam more often than not, because the sending address is not
authenticated for the domain. Once the site is on its real domain, move it to
SMTP through a real mailbox. Only the send call at the bottom of the file
changes.

## Local preview

```
php -S 127.0.0.1:8000
```

Clean URLs come from `.htaccess`, which the built-in server ignores, so
browse the `.php` paths directly when previewing locally.
