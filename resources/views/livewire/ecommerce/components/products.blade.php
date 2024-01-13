<div class="flex flex-col w-full mt-12">
    @foreach($categories as $category)
        <div class="flex flex-col mb-8">
            <div class="relative">
                <span class="absolute text-neutral-white text-title-md left-4 top-6">{{ $category->name }}</span>
                <img class="rounded-md w-full h-[150px] object-cover" src="{{ $category->path }}" />
            </div>
        </div>

        <div class="flex flex-wrap justify-start">
            @foreach($category->products as $product)
                <div class="flex flex-col w-1/2 lg:w-1/4 transition ease-in-out duration-300 scale-100 hover:scale-[1.01] hover:shadow-lg mb-8 @if(!$loop->last) mr-4 @endif">

                    <div class="flex flex-col border rounded-md border-neutral-400">
                        @if ($product->photos->where('featured', 1)->isNotEmpty())
                            <img class="w-[350px] h-[350px] object-cover" src="{{ Storage::disk('s3')->temporaryUrl($product->photos->where('featured', 1)->first()->path, now()->addMinute()) }}" />
                        @else
                            <img class="w-[350px] h-[350px] object-cover" src="{{ $product->photos->first()->path }}" />
                        @endif

                        <div class="flex flex-col p-4">

                            <span class="text-body-md !font-bold text-neutral-800 mb-1">{{ $product->name }}</span>
                            <span class="mb-4 text-body-sm text-neutral-800">{{ $product->short_description }}</span>

                            <div class="flex justify-between gap-x-2">

                                <div class="flex flex-col">
                                    <span>De:</span>
                                    <span class="line-through text-body-sm text-neutral-200">R$ {{ $product->comparative_price }}</span>
                                </div>

                                <div class="flex flex-col">
                                    <span>Por:</span>
                                    <span class="!font-bold text-body-sm text-neutral-200">R$ {{ $product->price }}</span>
                                </div>

                            </div>

                            <span class="mt-1 text-[10px] text-neutral-dark">Economize {{ number_format((int)$product->price / (int)7 * 100, "2", ",") }}%</span>

                            <button wire:click="$emitTo('ecommerce.components.cart', 'addToCart', {{ $product }})" class="w-full px-4 py-3 mt-4 rounded-md text-btn text-neutral-white bg-neutral-800 hover:bg-neutral-dark">
                                <span class="text-neutral-white">Comprar</span>
                            </button>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    @endforeach
</div>
