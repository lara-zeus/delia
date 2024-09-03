---
title: Setup
weight: 2
---

## Setup Delia

to install Delia, use the command:

```bash
php artisan delia:install
```

The install command will publish the migrations and the necessary assets and the config file.

## Migrations

if you're using multi tenants, publish the migrations files, and add the tenant columns

```bash
php artisan vendor:publish --tag=zeus-delia-migrations
```

then, run the migration:

```bash
php artisan migrate
```

## Register Delia with Filament:

To set up the plugin with filament, you need to add it to your panel provider; The default one is `adminPanelProvider`

```php
->plugins([
    DeliaPlugin::make()
])
```
