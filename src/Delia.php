<?php

namespace LaraZeus\Delia;

use Filament\Notifications\Notification;

class Delia
{
    public static function exist(string $class): bool
    {
        return config('zeus-delia.models.Bookmark')::query()
            ->where('bookmarkable_resource', $class)
            ->where('user_id', auth()->user()->id)
            ->exists();
    }

    public static function toggle(string $class): void
    {
        if (static::exist($class)) {
            config('zeus-delia.models.Bookmark')::query()
                ->where('bookmarkable_resource', $class)
                ->where('user_id', auth()->user()->id)
                ->delete();

            Notification::make()
                ->title(__('zeus-delia::bookmark.removed'))
                ->info()
                ->send();
        } else {
            config('zeus-delia.models.Bookmark')::create([
                'bookmarkable_resource' => $class,
                'user_id' => auth()->user()->id,
            ]);

            Notification::make()
                ->title(__('zeus-delia::bookmark.added'))
                ->success()
                ->send();
        }
    }
}
