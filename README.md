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

**open application**
```bash
ddev launch
```

## Development

**Run queue**
```bash
ddev craft queue/listen --verbose
```
