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

    <livewire:delia-bookmarks
        :url="request()->fullUrl()"
        :title="$class::getNavigationLabel()"
        :icon="$class::getNavigationIcon()"
    />
</div>