# samsung-service-center

Website repo. Deploys to **https://samsung.aiqonquickcool.com.my** through
cPanel Git Version Control.

## How deployment works

The repo is cloned inside cPanel at `~/repositories/samsung-service-center`,
which is outside the web root. On **Deploy HEAD Commit**, cPanel reads
`.cpanel.yml` and copies the site files into the subdomain's document root.
Nothing under `.git` is ever web-reachable, and `README.md` and `.cpanel.yml`
are deliberately left behind.

## Deploying a change

1. Push to `main`.
2. cPanel &rarr; Git™ Version Control &rarr; **Manage** &rarr; **Pull or Deploy**.
3. **Update from Remote**, then **Deploy HEAD Commit**.

## Adding new files

`.cpanel.yml` copies files by name, so a new page will not appear on the
server until it is listed there. Add a `cp` line for every file or folder you
add to the site.

## Staging notice

The subdomain is a staging address. `index.html` carries
`<meta name="robots" content="noindex, nofollow">` so search engines leave it
alone. Remove that tag on every page only when the site moves to its real
domain, otherwise the staging copy competes with the live one.
