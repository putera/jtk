<div>
    @yield('scripts')

    {{-- NOTIFICATIONS --}}
    @include('footer.notifications')
    <div data-turbo-cache="false">
        <x-notifications />
    </div>

    {{-- DIALOG --}}
    <div data-turbo-cache="false">
        <x-dialog z-index="z-50"/>
    </div>

    {{-- MODAL --}}
    <div id="livewire-ui-modal" data-turbo-permanent>
        @livewire('livewire-ui-modal')
    </div>

    @auth
        {{-- WELCOME MESSAGE --}}
        @if (System::config('show_welcome_msg') && session()->has('first-login'))
            <div data-turbo-cache="false">
                @livewire('dialog.welcome')
            </div>
        @endif

        {{-- NEED CHANGE PASSWORD --}}
        @if (session()->has('need-change-pwd') && !session()->has('first-login'))
            <div data-turbo-cache="false">
                <script>
                    setTimeout(() => {
                        Livewire.emit('openModal', 'dialog.need-change-password');
                    }, 2000);
                </script>
            </div>
        @endif
    @endauth
</div>
