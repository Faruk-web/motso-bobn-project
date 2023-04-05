<x-template::backend>
    <x-slot name="title"> Hello World </x-slot>
    <x-template::backend.container>
        <x-slot name="title"> Hello World </x-slot>
        <p>
            This view is loaded from modules: {!! config('core.name') !!}
        </p>
        <livewire:core::test-counter />
    </x-template::backend.container>
</x-template::backend>

