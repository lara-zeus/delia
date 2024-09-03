<div class="flex gap-2 items-start justify-start">
    <div class="flex flex-col gap-1">
        <span>{{ __('office') }}: {{ $getRecord()->office->name ??'' }}</span>
        <span class="text-xs">{{ __('Form') }}: {{ $getRecord()->form->name ?? '' }}</span>
    </div>
</div>