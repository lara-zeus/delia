---
title: Events
weight: 6
---

## Available Events

Delia will fire these events:
- `LaraZeus\Delia\Events\BookmarkAdded`
- `LaraZeus\Delia\Events\BookmarkRemoved`

## Register a Listener:

* First, create your listener:
* 
```bash
php artisan make:listener SendNotification --event=BookmarkAdded
```

* Second, register the listener in your `EventServiceProvider`

```php
protected $listen = [
    //...
    BookmarkAdded::class => [
        SendNotification::class,
    ],
];
```

* Finally, you can receive the form object in the `handle` method and do whatever you want.

