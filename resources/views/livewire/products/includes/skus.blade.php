<div x-show="tab === 'skus'" class="flex flex-col items-start w-full py-8 gap-y-4">

    @foreach ($product->skus as $index => $sku)

        <div class="flex items-center gap-x-2" wire:key="sku-{{ $sku->id }}">

            <div class="w-2/3">
                <x-input-label for="sku" :value="__('SKU')" />
                <x-text-input wire:model.defer="product.skus.{{ $index }}.sku" name="sku" id="sku" class="block w-full mt-1" type="text" />
                <x-input-error :messages="$errors->get('product.skus.' .$index. '.sku')" class="mt-2" />
            </div>

            <div class="w-1/3">
                <x-input-label for="quantity" :value="__('Quantity')" />
                <x-text-input wire:model.defer="product.skus.{{ $index }}.quantity" name="quantity" id="quantity" class="block w-full mt-1" type="text" />
                <x-input-error :messages="$errors->get('product.skus.' .$index. '.quantity')" class="mt-2" />
            </div>

            <x-secondary-button wire:click="saveSku({{ $sku }})" class="mt-6 gap-x-2">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
                Update

            </x-secondary-button>

            <x-secondary-button wire:click="removeSku({{ $sku->id }})" class="mt-6 gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </x-secondary-button>

        </div>

    @endforeach
    
    <div wire:loading.remove wire:target="saveSku" class="flex items-center gap-x-2">

        <div class="w-2/3">
            <x-input-label for="sku" :value="__('Sku')" />
            <x-text-input wire:model.defer="sku" id="sku"  class="block w-full mt-1" type="text" name="sku" />
            <x-input-error :messages="$errors->get('sku')" class="mt-2" />
        </div>

        <div class="w-1/3">
            <x-input-label for="quantity" :value="__('quantity')" />
            <x-text-input wire:model.defer="quantity" id="quantity" class="block w-full mt-1" type="text" name="quantity" />
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
        </div>

        <x-secondary-button wire:click="saveSku" class="mt-6 gap-x-2">
            {{-- add svg --}}
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

            Add
        </x-secondary-button>
    </div>

</div>