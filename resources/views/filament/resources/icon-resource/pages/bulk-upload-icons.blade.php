<x-filament::page>
    <x-filament::form wire:submit.prevent="save">
        {{ $this->form }}

        <x-slot name="actions">
            <x-filament::button type="submit" color="success">
                Завантажити іконки
            </x-filament::button>
        </x-slot>
    </x-filament::form>
</x-filament::page>

