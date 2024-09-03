<div>
    @if(!is_bool(\Livewire\Livewire::current()) && method_exists(\Livewire\Livewire::current(),'getResource'))
        <livewire:delia-bookmarks
            :resource="\Livewire\Livewire::current()->getResource()"
        />
    @endif
</div>