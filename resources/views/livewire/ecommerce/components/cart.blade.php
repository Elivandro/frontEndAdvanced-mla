<div x-data="{ visible: @entangle('visible') }" @toggle-cart.window="visible = !visible" x-init="$watch('visible', value => value ? document.body.classList.add('overflow-hidden') : document.body.classList.remove('overflow-hidden'))" x-cloak>
    <div x-show="visible"
            x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-75"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-75"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-opacity-25 bg-neutral-400"></div>

    <div x-show="visible"
            @click.outside="visible = false"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="absolute min-h-screen right-0 top-0 w-[365px] flex bg-neutral-dark/95">
        
        <div class="relative w-full h-screen overflow-y-auto">

            <div class="w-full px-4 pt-4 pb-20 divide-y divide-solid divide-neutral-white bg-neutral-200">

                @if(session()->has('cart'))
                    @foreach(session()->get('cart') as $cart)

                        <div class="flex items-center py-4 gap-x-2">
                            <div class="p-4 rounded-full bg-neutral-white"></div>
                            <div class="flex flex-col">
                                <span class="text-neutral-white text-body-lg">{{ $cart['product']['name'] }}</span>
                                <span class="text-neutral-white text-body-sm">R$ {{ $cart['product']['price'] }}</span>
                                <span class="text-neutral-white text-body-sm">{{ $cart['product']['short_description'] }}</span>
                            </div>
                        </div>

                    @endforeach
                @endif

            </div>

            <div class="p-4 fixed max-w-[365px] bottom-0 w-full border-t border-neutral-800 bg-neutral-400">
                <button class="w-full px-4 py-5 rounded-md text-btn bg-neutral-800 hover:bg-neutral-400">
                    <span class="text-neutral-white">FINALIZAR COMPRA</span>
                </button>
            </div>

        </div>
    </div>
</div>