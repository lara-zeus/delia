---
title: Usage
weight: 3
---

## Use the bookmark as a header action

to add the bookmark action to any filament page:

```php
protected function getHeaderActions(): array
{
    return [
        BookmarkHeaderAction::make()
    ];
}
```
