<div x-show="tab === 'photos'" class="flex flex-col items-start w-full py-8 gap-y-4">

    <div
        x-data="{ isUploading: false, progress: 0}"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
        <div class="w-full">
            <x-input-label for="photo" value="Photos" />
            <x-text-input wire:model="photo" type="file" id="photo" name="photos" class="w-full mt-1" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>
    
        <div x-show="isUploading" class="mt-4">
            <div class="relative flex items-center justify-start w-full h-2 bg-gray-100 rounded-full">
                <div :style="{width: `${progress}%`}" class="absolute flex items-center w-full h-2 bg-green-700 rounded-full">
                
                </div>
            </div>
        </div>

    </div>

    <div class="flex flex-wrap items-center w-full gap-4">
        @foreach($product->photos as $photo)
            <div class="w-[100px] h-[100px] relative">

                <div class="absolute flex items-start justify-between w-full h-full p-2 opacity-0 hover:opacity-100">

                    <button wire:click="setFeatured({{ $photo->id }})">

                        {{-- star svg --}}
                        <svg @class([
                            'w-6 h-6',
                            'text-yellow-400 fill-yellow-400' => $photo->featured,
                            'text-gray-200 fill-gray-200' => !$photo->featured
                            ])
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>

                    </button>

                    <button wire:click="deletePhoto({{ $photo->id }})">

                        {{-- Trash svg --}}
                        <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>

                </div>

                <img class="p-4 border border-gray-300 rounded-lg h-[100px] w-[100px] object-contain" src="{{ Storage::disk('s3')->temporaryUrl($photo->path, now()->addMinute()) }}" />

            </div>
        @endforeach
    </div>
            
</div>