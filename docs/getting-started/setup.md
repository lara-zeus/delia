---
title: Setup
weight: 2
---

## Setup Thunder and Bolt

to install Thunder, use the command:

`php artisan thunder:install`

The install command will publish the migrations and the necessary assets for the frontend.

## Migrations

if you're using multi tenants, publish the migrations files, and add the tenant columns

```bash
php artisan vendor:publish --tag=zeus-thunder-migrations
```
and for the comments:

```bash
php artisan vendor:publish --provider="BeyondCode\Comments\CommentsServiceProvider" --tag="migrations"
```

then, run the migration:

```bash
php artisan migrate
```

## Register Thunder with Filament:

To set up the plugin with filament, you need to add it to your panel provider; The default one is `adminPanelProvider`

```php
->plugins([
    SpatieLaravelTranslatablePlugin::make()->defaultLocales([config('app.locale')]),
    BoltPlugin::make()
        ->extensions([
            \LaraZeus\Delia\Extensions\Thunder::class,
        ]),
    ThunderPlugin::make()
])
```

> [!NOTE]\ 
you can extend and replace the `Thunder` class if you want to customize the ticket creation.

### Comments configuration

when running the `thunder:install` command it will also publish the configuration for comments

open the file `condifg/comments.php` and set the `comment_class` to

```php
'comment_class' => \LaraZeus\Delia\Models\Comment::class,
```

### Add Manage Office to User Model

you need to add the trait to your `User` model:
`use \LaraZeus\Delia\Concerns\ManageOffice;`

and you can customize the `isSuperAdmin` method in your `User` model

```php
public function isSuperAdmin(): bool
{
    return $this->email === 'info@larazeus.com';
}
```
