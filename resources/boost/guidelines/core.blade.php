# Lara Zeus Delia (`lara-zeus/delia`)

Bookmark manager plugin for FilamentPHP panels with topbar dropdown, table toolbar toggle, page header action, and a user-scoped `BookmarkResource`.

## Key Classes
- **Panel Plugin**: `LaraZeus\Delia\DeliaPlugin` (ID: `'zeus-delia'`, uses `HasModels`, `CanHideResources`, `HasNavigationGroupLabel`)
- **Service**: `LaraZeus\Delia\Delia` (`exist()`, `toggle()`, `add()`, `remove()`)
- **Header Action**: `LaraZeus\Delia\Filament\Actions\BookmarkHeaderAction` (extends `Filament\Actions\Action`, default name `'bookmark'`)
- **Resource & Model**: `LaraZeus\Delia\Filament\Resources\BookmarkResource`, `LaraZeus\Delia\Models\Bookmark`
- **Livewire Component**: `delia-bookmarks` (`LaraZeus\Delia\Livewire\BookmarkComponent`)
- **Service Provider**: `LaraZeus\Delia\DeliaServiceProvider` (`$name = 'zeus-delia'`, registers `delia:install`)

## Rules & Anti-Patterns
- **Publish & migrate before booting the panel**: `DeliaPlugin` registers render hooks (`TOPBAR_END` and `TOOLBAR_TOGGLE_COLUMN_TRIGGER_AFTER`) that query `Bookmark` on render; run `php artisan delia:install` (or publish `zeus-delia-migrations` + `zeus-delia-config` and migrate) first.
- **Use `->models([...])`, not `->deliaModels([...])`**: `DeliaPlugin` inherits `models(array $models)` from `HasModels` (with keys `'User'` and `'Bookmark'`); `deliaModels()` does not exist.
- **Authenticated user required**: `Delia`, `Bookmark::scopeUser()`, and `topbar.blade.php` access `auth()->user()->id` directly.
- **Set `table-prefix` before migrating**: Both `create_bookmarks_table` and `Bookmark::getTable()` read `config('zeus-delia.table-prefix')` (default `'delia_'`).
