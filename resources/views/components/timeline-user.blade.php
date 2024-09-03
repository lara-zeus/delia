<div>
    @if($record->user !== null)
        <x-zeus::user-card :id="$record->user->id">
            <x-slot name="trigger">
                <span class="cursor-pointer">
                    {{ __('By') . ' ' . $record->user->{$record->user->getUserFullNameAttribute()} }}
                </span>
            </x-slot>
            @include('zeus::filament.ticket.user-card', ['user' => $record?->user])
        </x-zeus::user-card>
    @else
        <x-zeus::user-card :id="rand()">
            <x-slot name="trigger">
                <span class="cursor-pointer">
                    {{ __('By ') . ' ' . __('system') }}
                </span>
            </x-slot>
            <div class="w-[300px] px-2 py-4 flex items-center gap-2">
                @svg('clarity-repeat-line', 'w-4 h-4 text-gray-500')
                {{ __('Automated by system') }}
            </div>
        </x-zeus::user-card>
    @endif
</div>