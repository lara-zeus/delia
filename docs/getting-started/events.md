---
title: Events
weight: 6
---

## Available Events

Thunder will fire these events:
- `LaraZeus\Delia\Events\TicketCreated`

## Register a Listener:

* First, create your listener:
* 
```bash
php artisan make:listener SendThunderNotification --event=TicketCreated
```

* Second, register the listener in your `EventServiceProvider`

```php
protected $listen = [
    //...
    TicketCreated::class => [
        SendThunderNotification::class,
    ],
];
```

* Finally, you can receive the form object in the `handle` method and do whatever you want.
  For example:

```php
Mail::to(User::first())->send(new Contact(
    $event->ticket->subject, $event->user->email, $event->ticket->subject
));
```
