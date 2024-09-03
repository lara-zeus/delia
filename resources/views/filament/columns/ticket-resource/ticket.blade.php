<div class="px-2 w-full flex flex-col items-start gap-2">
    <div class="flex gap-1 items-center justify-between">
        <span class="text-sm">[{{ $getRecord()->ticket_no ??'' }}]</span>
        <span class="text-lg">{{ $getRecord()->subject ?? '' }}</span>
    </div>
    <div class="w-full">
        <div class="flex items-center justify-between gap-2">
            @php $getStatues = $getRecord()->statusDetails() @endphp
            <span
                class="{{ $getStatues['class']}}"
                x-tooltip="{
                    content: @js(__('status')),
                    theme: $store.theme,
                }"
            >
                @svg($getStatues['icon'],'w-4 h-4 inline')
                {{ $getStatues['label'] }}
            </span>

            <div class="flex items-center justify-end gap-1">
                <x-filament::icon-button
                    size="sm"
                    :color="$getRecord()->priority->getColor()"
                    :icon="$getRecord()->priority->getIcon()"
                    :tooltip="__('priority').' '.$getRecord()->priority->getLabel()"
                />

                <x-filament::icon-button
                    :color="($getRecord()->is_escalated) ? 'danger' : 'success'"
                    :tooltip="($getRecord()->is_escalated) ? __('is escalated') : __('is not escalated')"
                    size="sm"
                    icon="heroicon-o-flag"
                />
            </div>
        </div>
    </div>
</div>
