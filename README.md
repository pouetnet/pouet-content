# Pouët content

The user uploads of [Pouët.net](https://www.pouet.net), on
<https://content.pouet.net>: avatars, group logos, prod screenshots, NFOs
and party results.

## How it works

www writes the uploads into this checkout (`POUET_CONTENT_LOCAL` in its
config), so `avatars/`, `files/` and `logos/` are gitignored. Only the
`buttons/` images and two files are in git: `screenshot_legacy.php`, which
keeps the old `/screenshots/<id>.<ext>` URLs working, and `.htaccess`,
which also forbids directory listings.

## Running it locally

The local stack (Docker images matching production, configs and sample
data) lives in [pouet-infra](https://github.com/pouetnet/pouet-infra),
which is only open to the team for now. If you have access:

```sh
git clone git@github.com:pouetnet/pouet-infra.git
cd pouet-infra
just setup
```

This clones this repo and the other site repos under `sites/`, starts
everything and loads sample data, uploads included. Content is then on
<http://content.pouet.localhost>. pouet-infra's `ARCHITECTURE.md`
describes how it runs in production.

## Contributing

Open a pull request against `master`. PRs are squash-merged once CI
passes, and a merged PR is live on content.pouet.net within a minute.

PHP follows [PER Coding Style 3.0](https://www.php-fig.org/per/coding-style/).
CI flags style issues without blocking the merge; `php-cs-fixer fix`
(3.95.27) fixes them.
