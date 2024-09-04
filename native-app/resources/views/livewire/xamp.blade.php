<div>
    <div class="flex-1 px-4 flex items-center justify-between">

        <div>
            @if($this->status == 'started')
                <div class="text-green-500 text-sm">
                    Running on  <button type="button" wire:click="openLocalHost">
                        http://localhost
                    </button>
                </div>
            @endif
        </div>

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

            <button type="button"
                    wire:click="stop"
                    wire:loading.class="opacity-50"
                    wire:loading.attr="disabled"
                    class="inline-flex items-center gap-2 text-[0.8rem] p-1 px-2 border border-transparent rounded-full shadow-sm text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"  viewBox="0 0 512 512">
                    <path fill="currentColor" d="M256 464c-114.69 0-208-93.47-208-208.35c0-62.45 27.25-121 74.76-160.55a22 22 0 1 1 28.17 33.8C113.48 160.1 92 206.3 92 255.65C92 346.27 165.57 420 256 420s164-73.73 164-164.35A164 164 0 0 0 360.17 129a22 22 0 1 1 28-33.92A207.88 207.88 0 0 1 464 255.65C464 370.53 370.69 464 256 464" />
                    <path fill="currentColor" d="M256 272a22 22 0 0 1-22-22V70a22 22 0 0 1 44 0v180a22 22 0 0 1-22 22" />
                </svg>
                <span wire:loading.remove>Stop</span>
                <span wire:loading wire:target="stop">Stopping...</span>
            </button>

                <button type="button"
                        wire:click="restart"
                        wire:loading.class="opacity-50"
                        wire:loading.attr="disabled"
                        class="inline-flex items-center gap-2 text-[0.8rem] p-1 px-2 border border-transparent rounded-full shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M18.258 3.508a.75.75 0 0 1 .463.693v4.243a.75.75 0 0 1-.75.75h-4.243a.75.75 0 0 1-.53-1.28L14.8 6.31a7.25 7.25 0 1 0 4.393 5.783a.75.75 0 0 1 1.488-.187A8.75 8.75 0 1 1 15.93 5.18l1.51-1.51a.75.75 0 0 1 .817-.162" />
                    </svg>
                    <span wire:loading.remove>Restart</span>
                    <span wire:loading wire:target="restart">Restarting...</span>
                </button>
            @endif

        </div>


    </div>
</div>
