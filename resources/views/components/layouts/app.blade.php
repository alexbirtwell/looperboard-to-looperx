<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Looperboard to Looper X Tool</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="antialiased">
        <div class="relative flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
             <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <h3 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Headrush Looperboard to Sheeran Looper X</h3>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex">
                            <div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">What will this do?</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    It will copy and rename your loop wav files and convert your configuration files in to a way that will allow them to play and work in the same way when imported to the Sheeran Looper X.
                                </p>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Getting Started</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Connect your machine to your Headrush Looperboard in <b>Transfer</b> mode and the <b>"Loops"</b> folder to <span class="text-sm sm:text-base inline-flex text-left items-center space-x-4 bg-gray-800 text-white rounded-lg p-4 pl-6">{{config('conversion.source-disk') == 'local' ? 'AppData' : 'Documents'}}/{{config('conversion.source-path')}}/{Loops}</span>. Once completed the converted folder will be located in <span class="text-sm sm:text-base inline-flex text-left items-center space-x-4 bg-gray-800 text-white rounded-lg p-4 pl-6">{{config('conversion.destination-disk') == 'local' ? 'AppData' : 'Documents'}}/{{config('conversion.destination-path')}}/{Loops}</span> and ready to copy across to your LooperX in transfer mode.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1">
                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex transition-all duration-250">
                            <div>
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm sm:text-left">
                        &nbsp;
                    </div>

                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Created to help fellow loopers by <a href="https://instagram.com/alexbirtwell">@alexbirtwell</a>.
                    </div>
                </div>
            </div>
        </div>
    @livewireScripts
    </body>
</html>
