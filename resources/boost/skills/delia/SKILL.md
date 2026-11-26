---
name: zeus-delia
description: Use when adding user-scoped page and resource bookmarking to a Filament panel with lara-zeus/delia.
---

# Lara Zeus Delia

## Overview & Requirements
`lara-zeus/delia` adds personal bookmarking to Filament panels via a topbar bookmarks dropdown, table toolbar bookmark toggle, `BookmarkHeaderAction` for pages, and `BookmarkResource`.
- **PHP**: `^8.2`
- **Dependencies**: `lara-zeus/filament-plugin-tools ^3.0`
- **Package Name**: `lara-zeus/delia` (Service Provider: `LaraZeus\Delia\DeliaServiceProvider`)

## Installation
```bash
composer require lara-zeus/delia
php artisan delia:install
```

## Configuration & Migrations
`php artisan delia:install` publishes migrations (`zeus-delia-migrations`), config (`zeus-delia-config`, `zeus-config`), and assets (`zeus-assets`), then runs `php artisan migrate`.

To publish manually:
```bash
php artisan vendor:publish --tag=zeus-delia-config
php artisan vendor:publish --tag=zeus-delia-migrations
php artisan migrate
```

Key options in `config/zeus-delia.php`:
- `render-hooks.list`: default `PanelsRenderHook::TOPBAR_END`
- `render-hooks.bookmark_toggle_icon`: default `TablesRenderHook::TOOLBAR_TOGGLE_COLUMN_TRIGGER_AFTER`
- `dropdown`: `title`, `icon`, `empty_icon`
- `table-prefix`: default `'delia_'` (creates `delia_bookmarks`)
- `models`: `'User'` and `'Bookmark'` (`LaraZeus\Delia\Models\Bookmark::class`)

## Filament Panel Registration
Register `DeliaPlugin::make()` in your `PanelProvider`:
```php
use Filament\Panel;
use LaraZeus\Delia\DeliaPlugin;
use LaraZeus\Delia\Filament\Resources\BookmarkResource;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            DeliaPlugin::make()
                ->models([
                    'User' => config('auth.providers.users.model'),
                    'Bookmark' => \LaraZeus\Delia\Models\Bookmark::class,
                ])
                ->navigationGroupLabel('Delia')
                ->hideResources([
                    // BookmarkResource::class,
                ]),
        ]);
}
```

## Core Usage & Examples

### Page Header Action
Add `BookmarkHeaderAction` to any Filament Resource or custom Page `getHeaderActions()`:
```php
use LaraZeus\Delia\Filament\Actions\BookmarkHeaderAction;

protected function getHeaderActions(): array
{
    return [
        BookmarkHeaderAction::make(),
    ];
}
```

### Programmatic Bookmark API (`LaraZeus\Delia\Delia`)
```php
use LaraZeus\Delia\Delia;

Delia::exist($url);
Delia::toggle($url, $title, 'heroicon-o-bookmark');
Delia::add($url, $title, 'heroicon-o-bookmark');
Delia::remove($url);
```

## Common Pitfalls / Anti-Patterns
- **Calling `->deliaModels()` on `DeliaPlugin`**: The `HasModels` trait provides `->models([...])`, not `->deliaModels([...])`.
- **Guest access to panels with `DeliaPlugin`**: The topbar hook (`zeus-delia::filament.hooks.topbar`) and `Delia` methods read `auth()->user()->id` without null checks, so `DeliaPlugin` must only be active on authenticated panels.
- **Changing `table-prefix` after migrating**: Update `zeus-delia.table-prefix` before running `php artisan migrate` so the created table matches `Bookmark::getTable()`.
