# Craft CMS Boilerplate

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

**Observe logs**
```bash
ddev logs --follow
```
