<div class="w-full">
    @if(!$converting)
            <div
                wire:click="convert"
                wire:loading.remove
              type="button"
              data-twe-ripple-init
              data-twe-ripple-color="light"
              class="flex items-center mx-auto rounded bg-blue-600 px-6 pb-2 pt-2.5 text-lg font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong w-full">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="40" height="40" viewBox="0 0 40 40" xml:space="preserve">

        <defs>
        </defs>
        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(0.4 0.4)" >
            <path d="M 69.131 75.433 c -0.623 0 -1.252 -0.121 -1.854 -0.37 c -1.813 -0.75 -2.984 -2.503 -2.984 -4.464 V 67.11 H 34.779 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 30.684 c 2.664 0 4.831 2.168 4.831 4.832 v 1.837 l 13.224 -13.224 L 70.294 41.332 v 1.837 c 0 2.664 -2.167 4.832 -4.831 4.832 H 47.124 c -1.657 0 -3 -1.343 -3 -3 c 0 -1.657 1.343 -3 3 -3 h 17.17 v -3.489 c 0 -1.962 1.171 -3.714 2.984 -4.465 c 1.814 -0.75 3.879 -0.339 5.266 1.049 l 16.044 16.044 c 1.884 1.884 1.884 4.948 0 6.832 L 72.542 74.016 C 71.617 74.943 70.386 75.433 69.131 75.433 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path d="M 20.869 56.323 c -1.255 0 -2.484 -0.49 -3.411 -1.416 L 1.413 38.862 c -1.884 -1.884 -1.884 -4.949 0 -6.833 l 16.044 -16.044 c 1.386 -1.386 3.454 -1.798 5.265 -1.047 c 1.813 0.75 2.984 2.503 2.984 4.464 v 3.489 h 29.515 c 1.657 0 3 1.343 3 3 c 0 1.657 -1.343 3 -3 3 H 24.538 c -2.664 0 -4.832 -2.168 -4.832 -4.832 v -1.837 L 6.482 35.445 l 13.224 13.224 v -1.837 c 0 -2.665 2.168 -4.832 4.832 -4.832 h 22.587 c 1.657 0 3 1.343 3 3 c 0 1.657 -1.343 3 -3 3 H 25.706 v 3.488 c 0 1.961 -1.171 3.713 -2.983 4.464 C 22.122 56.202 21.492 56.323 20.869 56.323 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
        </g>
        </svg>
              Convert Loops
            </div>
        @endif
            <span wire:loading.inline-flex class="hidden text-sm sm:text-base text-left items-center space-x-4 bg-gray-800 text-white rounded-lg p-4 pl-6">Progress: <span class="text-emerald-500 px-3" wire:stream="progress">{{ $converted }}</span>/<span class="text-emerald-500 px-3" wire:stream="total">{{ $total }}</span></span>
         @if($success)
            <span class="text-sm sm:text-base inline-flex text-left items-center space-x-4 bg-gray-800 text-white rounded-lg p-4 pl-6"><span class="text-emerald-500">Conversion Complete with {{$converted}} Loops Converted!</span></span>
        @endif
</div>
