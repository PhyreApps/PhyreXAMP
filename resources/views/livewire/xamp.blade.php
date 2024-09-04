<div>

    <!-- Static sidebar for desktop -->
    <div class="flex w-64 flex-col fixed inset-y-0">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex-1 flex flex-col min-h-0 p-2 bg-[#464646]">
            <div class="flex items-center h-16 flex-shrink-0 px-2">

                <div class="w-full relative rounded-md shadow-sm">
                    <input type="text" name="search" id="search" class="bg-[#525252] border border-[#595959] block w-full px-2 py-1 sm:text-sm rounded-md" placeholder="Search...">
                </div>

            </div>
            <div class="flex-1 flex flex-col overflow-y-auto">
                <nav class="flex-1 px-2 py-4 space-y-1">

                    <label class="text-[0.7rem] text-white">
                        SITES
                    </label>

                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="bg-[#408be5] text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <svg class="text-white mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Active Website
                    </a>

                    <a href="#" class="text-gray-400 group-hover:text-gray-300 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <svg class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Active Website
                    </a>

                </nav>
            </div>
        </div>
    </div>
    <div class="md:pl-64 flex flex-col">
        <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-[#1e1e1e] shadow">
            <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/menu-alt-2 -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
            <div class="flex-1 px-4 flex justify-end">
                <div class="flex items-center gap-2">

                    @if($this->status == 'stopped')
                        <button type="button"
                                wire:click="start"
                                wire:loading.class="opacity-50"
                                wire:loading.attr="disabled"
                                class="inline-flex items-center gap-2 text-[0.8rem] p-1 px-2 border border-transparent rounded-full shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"  viewBox="0 0 512 512">
                                <path fill="currentColor" d="M256 464c-114.69 0-208-93.47-208-208.35c0-62.45 27.25-121 74.76-160.55a22 22 0 1 1 28.17 33.8C113.48 160.1 92 206.3 92 255.65C92 346.27 165.57 420 256 420s164-73.73 164-164.35A164 164 0 0 0 360.17 129a22 22 0 1 1 28-33.92A207.88 207.88 0 0 1 464 255.65C464 370.53 370.69 464 256 464" />
                                <path fill="currentColor" d="M256 272a22 22 0 0 1-22-22V70a22 22 0 0 1 44 0v180a22 22 0 0 1-22 22" />
                            </svg>
                            <span wire:loading.remove>Start</span>
                            <span wire:loading wire:target="start">Starting...</span>
                        </button>
                    @endif
                    @if($this->status == 'started')

                        <div class="text-green-500 text-sm">
                            Running...
                        </div>

                    <button type="button"
                            wire:click="stop"
                            wire:loading.class="opacity-50"
                            wire:loading.attr="disabled"
                            class="inline-flex items-center gap-2 text-[0.8rem] p-1 px-2 border border-transparent rounded-full shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"  viewBox="0 0 512 512">
                            <path fill="currentColor" d="M256 464c-114.69 0-208-93.47-208-208.35c0-62.45 27.25-121 74.76-160.55a22 22 0 1 1 28.17 33.8C113.48 160.1 92 206.3 92 255.65C92 346.27 165.57 420 256 420s164-73.73 164-164.35A164 164 0 0 0 360.17 129a22 22 0 1 1 28-33.92A207.88 207.88 0 0 1 464 255.65C464 370.53 370.69 464 256 464" />
                            <path fill="currentColor" d="M256 272a22 22 0 0 1-22-22V70a22 22 0 0 1 44 0v180a22 22 0 0 1-22 22" />
                        </svg>
                        <span wire:loading.remove>Stop</span>
                        <span wire:loading wire:target="stop">Stopping...</span>
                    </button>
                    @endif

                </div>
            </div>
        </div>

        <main class="flex-1">
            <div class="p-6">
               test
            </div>
        </main>
    </div>
</div>
