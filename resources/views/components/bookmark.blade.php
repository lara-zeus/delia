<div>
    {{ ($this->bookmarkAction)([
        'url' => $url,
        'title' => $title,
        'icon' => $icon,
    ]) }}

    <x-filament-actions::modals />
</div>