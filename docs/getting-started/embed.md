---
title: Embed the Ticket
weight: 7
---

## Embed the Ticket Form

@zeus Thunder forms are simply a livewire component, you can embed it in any page.in your frontend or filament pages.

to embed the Form in any blade page, simply use:

```blade
<livewire:bolt.fill-form slug="feedback" extensionSlug="printers-department" inline="true" />
```

pass the office slug in the `extensionSlug`
