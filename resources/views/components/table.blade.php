<div>
    <div class="overflow-x-auto">
        <table class="w-full border divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    @foreach($columns as $column)
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            {{ $column['label'] }}
                        </th>
                    @endforeach

                    @if(isset($edit) && $edit)
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">editar</span>
                        </th>
                    @endif

                    @if(isset($delete) && $delete)
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">deletar</span>
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($items as $item)
                    <tr>
                        @foreach ($columns as $column)
                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                {{ data_get($item, $column['column']) }}
                            </td>
                        @endforeach

                        @if(isset($edit) && $edit)
                            <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                <a href="{{ route($edit, $item->id) }}" class="text-indigo-500 hover:text-indigo-900">
                                    {{ __('Edit') }}
                                </a>
                            </td>
                        @endif

                        @if(isset($delete) && $delete)
                            <th class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                <button wire:click="destroy({{ $item->id }})" class="text-indigo-500 hover:text-indigo-900">
                                    {{ __('Delete') }}
                                </button>
                            </th>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="py-4">
        {{ $items->links() }}
    </div>
</div>