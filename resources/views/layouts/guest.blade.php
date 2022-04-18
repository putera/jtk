<x-base>
    <body class="font-sans text-gray-900 antialiased">
        {{ $slot }}

        {{-- FOOTER COMPONENTS --}}
        @include('footer.components')
    </body>
</x-base>
