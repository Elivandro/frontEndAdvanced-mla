<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Atualizar categoria') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form wire:submit.prevent="save">
                    <div>
                        <div class="w-full">
                            <x-input-label for="name" value="Nome" />
                            <x-text-input wire:model="category.name" type="text" id="name" name="name" class="w-full mt-1" value="{{ old('name') }}" />
                            <x-input-error :messages="$errors->get('category.name')" class="mt-2" />
                        </div>
                        
                    </div>

                    <x-primary-button type="submit" class="mt-2">
                        Atualizar
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
