<div class="py-12">
    
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Criar produto') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            
            <div x-data="{ tab: 'general' }">
                <div class="p-6 text-gray-900">

                    <div class="sm:hidden">

                        <label for="tabs" calss="sr-only">Select a tab</label>

                        <select x-model="tab" id="tab" name="tabs" class="block w-full py-2 border-gray-300 rounded-md">

                            <option value="general">General</option>
                            <option value="photos" @disabled(!$product->id)>Photos</option>
                            <option value="skus" @disabled(!$product->id)>Skus</option>

                        </select>

                    </div>

                    <div class="hidden sm:block">
                        <div class="border-b border-gray-200">
                            <nav class="flex -mb-px space-x-8" aria-label="Tabs">
                                <a x-on:click="tab = 'general'" class="px-1 py-4 text-sm font-medium border-b-2 cursor-pointer whitespace-nowrap" :class="{
                                    'border-transparent text-gray-500 hover:text-gray-700 hover-border-gray-300' : tab !== 'general', 'border-indigo-500 text-indigo-600' : tab === 'general'
                                    }">
                                    General
                                </a>
                                <a @if($product->id) x-on:click="tab = 'photos'" @endif class="px-1 py-4 text-sm font-medium border-b-2 cursor-pointer whitespace-nowrap" :class="{
                                    'border-transparent text-gray-500 hover:text-gray-700 hover-border-gray-300' : tab !== 'photos', 'border-indigo-500 text-indigo-600' : tab === 'photos'
                                    }">
                                    Photos
                                </a>
                                <a @if($product->id) x-on:click="tab = 'skus'" @endif class="px-1 py-4 text-sm font-medium border-b-2 cursor-pointer whitespace-nowrap" :class="{
                                    'border-transparent text-gray-500 hover:text-gray-700 hover-border-gray-300' : tab !== 'skus',
                                    'border-indigo-500 text-indigo-600': tab === 'skus'
                                    }">
                                    Skus
                                </a>
                            </nav>
                        </div>
                    </div>

                    @include('livewire.products.includes.general')
                    @include('livewire.products.includes.photos')
                    @include('livewire.products.includes.skus')
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('message'))
        <x-notification :message="session()->get('message')" />
    @endif
</div>
