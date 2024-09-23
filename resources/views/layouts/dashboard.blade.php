@extends('layouts.base')

@section('body')
    <div class="dark:bg-zinc-800 bg-zinc-100 min-h-[100svh]">
        <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:brand href="{{ route('home') }}" name="Cafe Finder" class="max-lg:hidden dark:hidden">
                <x-lucide-coffee class="w-6 h-6" />
            </flux:brand>
            <flux:brand href="{{ route('home') }}" name="Cafe Finder"
                class="max-lg:!hidden hidden dark:flex">
                <x-lucide-coffee class="w-6 h-6 text-white" />
            </flux:brand>

            <flux:navbar class="max-lg:hidden">
                <flux:navbar.item icon="home" href="#" :current="request()->is('/')">Home</flux:navbar.item>
                <flux:navbar.item icon="inbox" href="#" :current="request()->routeIs('listing.*')">
                    Listings
                </flux:navbar.item>
                <flux:navbar.item icon="document-text" href="#">Documents</flux:navbar.item>
                <flux:navbar.item icon="calendar" href="#">Calendar</flux:navbar.item>

                <flux:separator vertical variant="subtle" class="my-2" />

                <flux:dropdown class="max-lg:hidden">
                    <flux:navbar.item icon-trailing="chevron-down">Favorites</flux:navbar.item>

                    <flux:navmenu>
                        <flux:navmenu.item href="#">Marketing site</flux:navmenu.item>
                        <flux:navmenu.item href="#">Android app</flux:navmenu.item>
                        <flux:navmenu.item href="#">Brand guidelines</flux:navmenu.item>
                    </flux:navmenu>
                </flux:dropdown>
            </flux:navbar>

            <flux:spacer />

            <flux:navbar class="mr-4">
                <flux:navbar.item icon="magnifying-glass" href="#" label="Search" />
                <flux:navbar.item class="max-lg:hidden" icon="cog-6-tooth" href="#" label="Settings" />
                <flux:navbar.item class="max-lg:hidden" icon="information-circle" href="#" label="Help" />
            </flux:navbar>

            <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />
        </flux:header>

        <flux:sidebar stashable sticky
            class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <flux:brand href="#" name="Cafe Finder"
                class="px-2 dark:hidden">
                <x-lucide-coffee class="w-6 h-6" />
            </flux:brand>

            <flux:brand href="#" name="Cafe Finder"
                class="px-2 hidden dark:flex" >
                <x-lucide-coffee class="w-6 h-6 text-white" />
            </flux:brand>

            <flux:navlist variant="outline">
                <flux:navlist.item icon="home" href="#" :current="request()->is('/')">Home</flux:navlist.item>
                <flux:navlist.item icon="inbox" href="#" :current="request()->routeIs('listing.*')">Listings</flux:navlist.item>
                <flux:navlist.item icon="document-text" href="#">Documents</flux:navlist.item>
                <flux:navlist.item icon="calendar" href="#">Calendar</flux:navlist.item>

                <flux:navlist.group expandable heading="Favorites" class="max-lg:hidden">
                    <flux:navlist.item href="#">Marketing site</flux:navlist.item>
                    <flux:navlist.item href="#">Android app</flux:navlist.item>
                    <flux:navlist.item href="#">Brand guidelines</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
                <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>

        <flux:main container>
            @yield('content')
        </flux:main>

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
