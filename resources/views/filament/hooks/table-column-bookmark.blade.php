<div>
    @if(!is_bool(\Livewire\Livewire::current()))
        @if(method_exists(\Livewire\Livewire::current(),'getResource'))
            @php
                $class = \Livewire\Livewire::current()->getResource();
            @endphp
        @else
            @php
                $class = \Livewire\Livewire::current();
            @endphp
        @endif
    @endif

    @if(!($class instanceof \Filament\Widgets\TableWidget))
        @if($class instanceof \Filament\Resources\RelationManagers\RelationManager)
            @php
                $title = $class->getTable()->getHeading();
            @endphp
        @else
            @php
                $title = $class::getNavigationLabel();
                $icon = $class::getNavigationIcon();
            @endphp
        @endif

        <livewire:delia-bookmarks
            :url="request()->fullUrl()"
            :title="$title"
            :icon="$icon ?? 'heroicon-m-bookmark-slash'"
        />
    @endif
</div>
