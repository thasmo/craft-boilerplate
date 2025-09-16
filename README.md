# Craft CMS Boilerplate

## Setup

**prepare configuration**
```bash
cp .env.example .env
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

**Run queue**
```bash
ddev craft queue/listen --verbose
```
