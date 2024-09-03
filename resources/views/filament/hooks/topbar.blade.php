<div>
    @php
        $bookmarks = config('zeus-delia.models.Bookmark')::query()
            ->where('user_id',auth()->user()->id)
            ->get();
    @endphp
    <x-filament::dropdown>
        <x-slot name="trigger">
            <x-filament::icon-button size="lg"
                icon="heroicon-m-bookmark-square"
            >
                More actions
            </x-filament::icon-button>
        </x-slot>

        <x-filament::dropdown.list>
            @foreach($bookmarks as $bookmark)
                @if(class_exists($bookmark->bookmarkable_resource))
                    @php
                        $resourceClass = app($bookmark->bookmarkable_resource);
                    @endphp
                    <x-filament::dropdown.list.item
                        tag="a"
                        :icon="$resourceClass->getNavigationIcon()"
                        :href="$resourceClass->getUrl()"
                    >
                        {{ $resourceClass->getNavigationLabel() }}
                    </x-filament::dropdown.list.item>
                    @endif
            @endforeach
        </x-filament::dropdown.list>
    </x-filament::dropdown>
</div>