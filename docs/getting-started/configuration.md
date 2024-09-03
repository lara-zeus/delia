---
title: Configuration
weight: 3
---

## Configuration

to configure the plugin Delia, you can pass the configuration to the plugin in `adminPanelProvider`

these all the available configuration, and their defaults values

```php
DeliaPlugin::make()
    ->deliaModels([
        'User' => config('auth.providers.users.model'),
        'Bookmark' => \LaraZeus\Delia\Models\Bookmark::class,
    ])
    ->navigationGroupLabel('Delia')
    ->hideResources([
        BookmarkResource::class,
    ])
```

## Configuration File

use the file `zeu-delia.php`, to customize the global configuration.

to publish the configuration:

```bash
php artisan vendor:publish --tag=zeus-delia-config
```

## Render Hooks:

you can customize the render hooks in the config file:

```php
'render-hooks' => [
    'list' => PanelsRenderHook::TOPBAR_END,
    'bookmark_toggle_icon' => TablesRenderHook::TOOLBAR_TOGGLE_COLUMN_TRIGGER_AFTER,
],
```
