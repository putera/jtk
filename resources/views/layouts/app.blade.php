<x-base>
    <body class="font-sans text-gray-900 antialiased h-full">
        <div class="min-h-full">

            @livewire('navigation')

            <div class="py-8">
                @hasSection('header')
                    <header>
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            @yield('header')
                        </div>
                    </header>
                @endif

                <main>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </main>

                <x-footer/>
            </div>
        </div>

        {{-- FOOTER COMPONENTS --}}
        @include('footer.components')
    </body>
</x-base>
