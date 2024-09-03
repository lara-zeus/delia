<div>
    @if(!is_bool(\Livewire\Livewire::current()))
        <livewire:delia-bookmarks
            :resource="\Livewire\Livewire::current()->getResource()"
        />
    @endif
</div>