<?php

namespace LaraZeus\Delia;

use Filament\Notifications\Notification;

class Delia
{
    public static function exist(string $url): bool
    {
        return config('zeus-delia.models.Bookmark')::query()
            ->where('url', $url)
            ->where('user_id', auth()->user()->id)
            ->exists();
    }

    public static function toggle(string $url, string $title, string $icon): void
    {
        if (static::exist($url)) {
            static::remove($url);
        } else {
            static::add($url, $title, $icon);
        }
    }

    public static function add(string $url, string $title, string $icon): void
    {
        config('zeus-delia.models.Bookmark')::create([
            'url' => $url,
            'title' => $title,
            'icon' => $icon,
            'user_id' => auth()->user()->id,
        ]);

        Notification::make()
            ->title(__('zeus-delia::bookmark.added'))
            ->success()
            ->send();
    }

    public static function remove(string $url): void
    {
        config('zeus-delia.models.Bookmark')::query()
            ->where('url', $url)
            ->where('user_id', auth()->user()->id)
            ->delete();

        Notification::make()
            ->title(__('zeus-delia::bookmark.removed'))
            ->info()
            ->send();
    }
}
