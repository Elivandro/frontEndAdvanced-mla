<div>
    <div class="fixed inset-x-0 top-0 z-50 flex items-center justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-center">
        <div 
            x-data="{ show: false }"
            x-init="() => {
                setTimeout(() => show = true, 500);
                {{-- setTimeout(() => show = false, 10000); --}}
            }"
            x-show="show" 
            x-description="Notification panel, show/hide based on alert state." 
            @click.away="show = false" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            class="w-full max-w-sm bg-white rounded-lg shadow-lg pointer-events-auto">
            <div class="overflow-hidden rounded-lg shadow-xs">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <span class="text-green-700 material-symbols-outlined">
                                circle_notifications
                            </span>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium leading-5 text-gray-900">
                                {{ $message }}
                            </p>
                        </div>
                        <div class="flex flex-shrink-0 ml-4">
                            <button @click="show = false" class="inline-flex text-gray-400 transition duration-150 ease-in-out focus:outline-none focus:text-gray-500">
                                <span class="material-symbols-outlined">
                                    close
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>