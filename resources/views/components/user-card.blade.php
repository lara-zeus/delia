@props(['id' => 0])

<div>
    <template x-ref="template{{ $id }}">
        {{ $slot }}
    </template>

    <div class="inline"
        x-tooltip="{
            trigger: 'click',
            maxWidth: 'none',

            content: () => $refs.template{{ $id }}.innerHTML,
            appendTo: $root,
            allowHTML: true,
            interactive: true,
            theme: $store.theme,
        }"
    >
        {{ $trigger }}
    </div>
</div>