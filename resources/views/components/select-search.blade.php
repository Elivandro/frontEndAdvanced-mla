<div x-data="{visible: false}">

    <div class="flex flex-col justify-between lg:relative">
        <div class="relative flex flex-row items-center">
            <x-text-input wire:model.debounce.500ms="{{ $searchable }}" @click="visible = !visible" class="block w-full pr-8 mt-1 cursor-pointer" type="text" />

            <span class="absolute mt-2 text-gray-500 transition cursor-pointer material-symbols-outlined right-3" :class="{'transform rotate-180': visible}">
                expand_circle_down
            </span>
        </div>

        <div
            x-show="visible"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute top-0 left-0 lg:rounded-lg flex flex-col w-full h-screen lg:top-14 lg:h-auto lg:max-h-[250px] overflow-y-auto lg:border border-gray-300 lg:shadow-lg px-2 py-4 bg-white"
        >
        
        <div class="flex flex-col w-full mb-4 lg:hidden">
            <div class="flex flex-row justify-end">
                <button @click="visible = false" class="inline-flex p-2 text-gray-400 transition duration-150 ease-in-out focus:outline-none focus:text-gray-500">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </button>
            </div>

            <div class="relative flex flex-row items-center">
                <x-text-input wire:model.debounce.500ms="{{ $searchable }}" class="block w-full pr-8 mt-1 cursor-pointer" type="text" />

                <span class="absolute mt-2 text-gray-500 transition cursor-pointer material-symbols-outlined right-3">
                    search
                </span>
            </div>
        </div>

        <div class="flex flex-col divide-y divide-gray-400 divide-dotted">
            @if($items->count() === 0)
                <button class="flex flex-row justify-start w-full py-4 transform active:opacity-40 hover:opacity-80">
                    Nenhum item
                </button>
            @endif

            <div class="flex items-center justify-start w-full h-full" wire:loading wire:target="search">
                @foreach($items as $item)
                    <div class="w-full p-4 mx-auto">
                        <div class="flex animate-pulse">
                            <div class="flex-1 py-1 space-y-1">
                                <div class="h-2 rounded bg-slate-700"></div>
                                <div class="h-3 rounded bg-slate-700"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @foreach($items as $item)
                <button wire:loading.remove wire:target="{{ $searchable }}"
                    @click="
                        $wire.set('{{ $model }}', '{{ data_get($item, $value) }}');
                        $wire.set('{{ $searchable }}', '{{ data_get($item, $key) }}');
                        visible = false;
                    "
                    class="flex flex-row justify-start w-full py-4 transform active:opacity-40 hover:opacity-60"
                >
                    {{ data_get($item, $key) }}
                </button>
            @endforeach
        </div>
        
    </div>

</div>