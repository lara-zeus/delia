---
title: Configuration
weight: 3
---

## Configuration

to configure the plugin Thunder, you can pass the configuration to the plugin in `adminPanelProvider`

these all the available configuration, and their defaults values

```php
ThunderPlugin::make()
    ->thunderModels([
        'Office' => \LaraZeus\Delia\Models\Office::class,
        'Operations' => \LaraZeus\Delia\Models\Operations::class,
        'Ticket' => \LaraZeus\Delia\Models\Ticket::class,
        'TicketsStatus' => \LaraZeus\Delia\Models\TicketsStatus::class,
        'Abilities' => \LaraZeus\Delia\Enums\Abilities::class,
    ])
    ->uploadDisk('public')
    ->uploadDirectory('tickets')
    ->navigationGroupLabel('Thunder')
    ->hideResources([
        OfficeResource::class,
        TicketResource::class,
    ])
    
    ->globallySearchableAttributes([
        // you can return empty array to disable it
        OfficeResource::class => ['name', 'slug'],
        TicketResource::class => ['ticket_no'],
    ])
```

## Frontend Configuration

use the file `zeu-thunder.php`, to customize the frontend, like the prefix,domain, and middleware for each content type.

to publish the configuration:

```bash
php artisan vendor:publish --tag=zeus-thunder-config
```

## Ticket No Generator

by default, thunder will generate the ticket number using a random string, 

```php
namespace LaraZeus\Delia\Support;

use Illuminate\Support\Str;

class TicketNo
{
    public static function get(): string
    {
        return Str::random(6);
    }
}
```

if you want to change that, create any class with the method `get`, and set it in the config file:

`'ticket-no' => \LaraZeus\Delia\Support\TicketNo::class,`

for example:

```php
public static function get(): string
{
    return DB::table('tickets')->max('ticket_no') + 1;
}
```