<x-layouts.base>
    @if(
            in_array(request()->route()->getName(), [
                'register',
                'register-example',
                'login',
                'login-example',
                'forgot-password',
                'forgot-password-example',
                'reset-password',
                'reset-password-example'
            ])
        )

            <div class='lg'>
                @yield('content')
            </div>
            {{-- Footer --}}
            @include('layouts.footer2')


    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

        <div class='lg'>
        @yield('content')
        </div>
    @else
        {{-- Nav --}}
        @include('layouts.nav')
        {{-- SideNav --}}
        @include('layouts.sidenav')
        <main class="content">
            <div class='lg'>
            @yield('content')
            </div>
            <!-- <hr> -->
            {{-- Footer --}}
            @include('layouts.footer')
        </main>

    @endif
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</x-layouts.base>