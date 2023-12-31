<div x-show="tab === 'general'" class="flex flex-col items-start w-full py-8 gap-y-4">

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
            <x-input-label for="name" value="Nome" class="mt-4" />
            <x-text-input wire:model.defer="product.name" type="text" id="name" name="name" class="w-full mt-1" value="{{ old('name') }}" />
            <x-input-error :messages="$errors->get('product.name')" class="mt-2" />
        </div>

        <div class="w-full">
            <x-input-label for="price" value="Preço" class="mt-4" />
            <x-text-input wire:model.defer="product.price" type="text" id="price" name="price" class="w-full mt-1" value="{{ old('price') }}" />
            <x-input-error :messages="$errors->get('product.price')" class="mt-2" />
        </div>

        <div class="w-full">
            <x-input-label for="shortDescription" value="Descrição rápida" class="mt-4" />
            <x-text-area wire:model.defer="product.short_description" type="text" id="description" name="short_description" class="w-full mt-1" value="{{ old('description') }}" style="resize: none" />
            <x-input-error :messages="$errors->get('product.short_description')" class="mt-2" />
        </div>

        <div class="w-full">
            <x-input-label for="longDescription" value="Descrição completa" class="mt-4" />
            <x-text-area wire:model.defer="product.long_description" type="text" id="description" name="long_description" class="w-full mt-1" value="{{ old('description') }}" style="resize: none" />
            <x-input-error :messages="$errors->get('product.long_description')" class="mt-2" />
        </div>

        <x-primary-button wire:loading.remove wire:target="save" type="submit" class="mt-2" wire:click="save">
            Salvar
        </x-primary-button>

        <x-primary-button wire:loading wire:target="save" class="mt-2 cursor-not-allowed" disabled>
            <svg class="w-5 h-5 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
            </svg>
        </x-primary-button>

    </div>
</div>