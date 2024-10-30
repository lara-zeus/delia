<div>
    @php
        $bookmarks = config('zeus-delia.models.Bookmark')::query()
            ->where('user_id',auth()->user()->id)
            ->get();
    @endphp
    <x-filament::dropdown>
        <x-slot name="trigger">
            <x-filament::icon-button size="lg"
                :icon="config('zeus-delia.dropdown.icon')"
            >
                {{ config('zeus-delia.dropdown.title') }}
            </x-filament::icon-button>
        </x-slot>

        @if($bookmarks->isEmpty())
            <x-filament::dropdown.header :icon="config('zeus-delia.dropdown.empty_icon')">
                No Bookmarks found
            </x-filament::dropdown.header>
        @else
            <x-filament::dropdown.list>
                @foreach($bookmarks as $bookmark)
                    <x-filament::dropdown.list.item
                            tag="a"
                            :icon="$bookmark->icon"
                            :href="$bookmark->url"
                    >
                        {{ $bookmark->title }}
                    </x-filament::dropdown.list.item>
                @endforeach
            </x-filament::dropdown.list>
        @endif
    </x-filament::dropdown>
</div>
