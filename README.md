# Craft CMS Boilerplate

> Personal boilerplate for Craft CMS projects.

## Features

* DDEV Integration for Local Development
* Application Configuration via Environment Variables
* Separate Host/PHP Setup for Control Panel
* Easy Coding Standard Integration for Code Style
* PHPStan Integration for Code Quality
* Application Cache via Redis
* Session Storage via Redis
* Queue Job Storage via Redis
* Various Control Panel Tweaks
* Upsun Configuration
* Vite Integration for Frontend Development

## Setup

**prepare configuration**
```bash
cp .env.development .env
```

**start containers**
```bash
ddev start
```

**install dependencies**
```bash
ddev composer install
ddev pnpm install
```

**install application**
```bash
ddev craft install
```

**build frontend**
```bash
ddev pnpm run build
```

**import data**
```bash
upsun db:dump -o | ddev import-db
upsun mount:download --app=panel --mount=web/files --target=web/files
```

**open application**
```bash
ddev launch
```

## Development

**URLs**
* Frontend: https://craft.ddev.site/
* Panel: https://panel.craft.ddev.site/
* Mails: https://craft.ddev.site:8026/
* UnoCSS: https://craft.ddev.site:3000/__unocss/

**start server**
```bash
ddev pnpm run dev
```

**build assets**
```bash
ddev pnpm run build
```

**observe logs**
```bash
ddev logs --follow
```
