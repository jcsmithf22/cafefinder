@extends('layouts.base')

{{--<flux:navbar.item wire:navigate icon="home" href="#" :current="request()->is('/')">Home</flux:navbar.item>--}}
{{--<flux:navbar.item wire:navigate icon="inbox" href="{{ route('listing.index') }}"--}}
{{--                  :current="request()->routeIs('listing.*')">--}}
{{--    Listings--}}
{{--</flux:navbar.item>--}}

@section('body')
    <div class="dark:bg-zinc-800 bg-zinc-100 min-h-[100svh]">
        <flux:sidebar sticky stashable
                      class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <flux:brand href="{{ route('home') }}" name="Cafe Finder" class="max-lg:hidden dark:hidden">
                <x-lucide-coffee class="w-6 h-6" />
            </flux:brand>
            <flux:brand href="{{ route('home') }}" name="Cafe Finder" class="max-lg:!hidden hidden dark:flex">
                <x-lucide-coffee class="w-6 h-6 text-white" />
            </flux:brand>

            <livewire:command />

            <flux:navlist variant="outline">
                <flux:navlist.item wire:navigate icon="home" href="#" :current="request()->is('/')">Home
                </flux:navlist.item>
                <flux:navlist.item wire:navigate icon="inbox" href="{{ route('listing.index') }}"
                                   :current="request()->routeIs('listing.*')">Listings
                </flux:navlist.item>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
                <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
            </flux:navlist>

            <flux:dropdown position="top" align="left" class="max-lg:hidden">
                <flux:profile avatar="https://fluxui.dev/img/demo/user.png" name="Olivia Martin" />

                <flux:menu>
                    <flux:menu.radio.group>
                        <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                        <flux:menu.radio>Truly Delta</flux:menu.radio>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
        </flux:header>

        <flux:main container class="max-w-4xl">
            @yield('content')
        </flux:main>

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
