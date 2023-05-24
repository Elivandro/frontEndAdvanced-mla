<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Listar produtos') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="my-4">
                <a href="{{ route('product.create') }}" class="px-2 py-3 text-gray-200 bg-indigo-600 rounded-lg hover:bg-indigo-700 hover:text-gray-400">Criar produto<a/>
            </div>
            <div class="p-6 text-gray-900">
                <x-table
                    :items="$products"
                    :columns="[
                        ['label' => 'name', 'column' => 'name'],
                        ['label' => 'price', 'column' => 'price'],
                        ['label' => 'short_description', 'column' => 'short_description']
                    ]"
                    edit="product.update"
                    :delete="true"
                />
            </div>
        </div>
    </div>
</div>