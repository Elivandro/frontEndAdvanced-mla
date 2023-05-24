<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Criar produto') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="w-6/12">

                    <div class="w-full">
                        <x-input-label for="category" value="Categoria" />
                        <x-select-search
                            id="category_id"
                            type="text"
                            model="product.category_id"
                            key="name"
                            value="id"
                            searchable="search"
                            :items="$categories"
                        />
                        <x-input-error :messages="$errors->get('product.category_id')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="name" value="Nome" />
                        <x-text-input wire:model="product.name" type="text" id="name" name="name" class="w-full mt-1" value="{{ old('name') }}" />
                        <x-input-error :messages="$errors->get('product.name')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="price" value="Preço" />
                        <x-text-input wire:model="product.price" type="text" id="price" name="price" class="w-full mt-1" value="{{ old('price') }}" />
                        <x-input-error :messages="$errors->get('product.price')" class="mt-2" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="description" value="Descrição" />
                        <x-text-area wire:model="product.short_description" type="text" id="description" name="short_description" class="w-full mt-1" value="{{ old('description') }}" style="resize: none" />
                        <x-input-error :messages="$errors->get('product.short_description')" class="mt-2" />
                    </div>

                </div>
                

                <x-primary-button wire:loading.remove wire:target="save" type="submit" class="mt-2" wire:click="save">
                    Salvar
                </x-primary-button>

                <x-primary-button wire:loading wire:target="save" class="mt-2 cursor-not-allowed" disabled>
                    <svg class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </x-primary-button>
            </div>
        </div>
    </div>
</div>