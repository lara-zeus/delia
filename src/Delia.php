<?php

namespace LaraZeus\Delia;

use BackedEnum;
use Filament\Notifications\Notification;
use Filament\Support\Enums\IconSize;

class Delia
{
    public static function exist(string $url): bool
    {
        return config('zeus-delia.models.Bookmark')::query()
            ->where('url', $url)
            ->where('user_id', auth()->user()->id)
            ->exists();
    }

    public static function toggle(string $url, string $title, string | BackedEnum | null $icon): void
    {
        if (static::exist($url)) {
            static::remove($url);
        } else {
            static::add($url, $title, $icon);
        }
    }

    public static function add(string $url, string $title, string | BackedEnum | null $icon): void
    {
        config('zeus-delia.models.Bookmark')::create([
            'url' => $url,
            'title' => $title,
            /** @phpstan-ignore-next-line */
            'icon' => ($icon instanceof BackedEnum) ? $icon->getIconForSize(IconSize::Small) : $icon,
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
