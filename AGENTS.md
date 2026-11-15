# AGENTS.md

Personal Craft CMS 5 boilerplate (PHP, Twig, Vue, UnoCSS) run locally with DDEV and built with Vite+.

## Code

- Site code lives in `modules/site/`, templates in `templates/`, frontend in `assets/`, configuration in `config/`.
- Everything under `plugins/` is a local path repository. Don't edit it from here.
- Configure via environment variables, never hard-code environment-specific values.
- Use code comments sparingly. Comment only what the code can't say, and keep the wording precise and concise.

## Checks

- Run PHP and Composer commands through DDEV, e.g. `ddev composer install`, `ddev vp install`.
- PHP: `composer lint:php`, `composer lint:twig`, `composer analyze`. Auto-fix with `composer fix:php` and `composer fix:twig`.
- Frontend: `pnpm lint` (ESLint, cspell, knip). Auto-fix with `pnpm fix`.
- Run the relevant checks before finishing.
- Never weaken a check to make it pass: no new ignores, baselines or lowered thresholds. Fix the cause.

## Git

- Commit only when asked.
- Use Conventional Commits, e.g. `feat: add redis session storage`.
- Don't add AI attribution such as co-author trailers or generated-by footers.
