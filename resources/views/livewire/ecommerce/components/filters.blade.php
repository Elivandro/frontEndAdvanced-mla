<div>
    <div class="w-[200px] flex flex-col mt-40">

        <div class="pb-6 border-b border-neutral-200">
            <span class="text-title-sm">
                Filtros ativos
            </span>
        
            @forelse($filters as $filter)
                <div class="flex flex-col mt-2">
                    <div wire:click="removeFilter({{ $filter['id'] }})" class="flex items-center justify-between cursor-pointer active:scale-95 bg-neutral-100">
                        <span class="break-words text-body-md">{{ $filter['name'] }}</span>

                        <button>
                            {{-- x-circle --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @empty
                <div>
                    <span>Nenhum selecionado</span>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            <span class="text-title-sm">
                Categorias
            </span>

            @foreach($categories as $category)
                <div class="flex flex-col mt-2">
                    <button wire:click="addFilter({{ $category->id }})" class="flex py-2 active:scale-95">
                        <span class="text-body-md">{{ $category->name }}</span>
                    </button>
                </div>
            @endforeach
        </div>

    </div>
</div>
