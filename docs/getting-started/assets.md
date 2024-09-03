---
title: Themes and Assets
weight: 5
---

## Compiling assets

we use [tailwind Css](https://tailwindcss.com/) and custom themes by filament, make sure you are familiar with [tailwindcss configuration](https://tailwindcss.com/docs/configuration), and how to make custom [filament theme](https://filamentphp.com/docs/3.x/admin/appearance#building-themes).

### Custom Classes:

You need to add these files to your `tailwind.config.js` file in the `content` section.

* frontend:
  * `./vendor/lara-zeus/core/resources/views/**/*.blade.php`
  * `./vendor/lara-zeus/thunder/resources/views/themes/**/*.blade.php`
  * `'./vendor/lara-zeus/thunder/src/Models/TicketsStatus.php',`

* filament:
  * `'./vendor/lara-zeus/thunder/resources/views/filament/**/*.blade.php',`
  * `'./vendor/lara-zeus/thunder/src/Models/TicketsStatus.php',`
  * `'./vendor/lara-zeus/thunder/src/Filament/Resources/TicketResource.php',`
