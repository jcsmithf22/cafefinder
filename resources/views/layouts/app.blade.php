@extends('layouts.base')

@section('body')
    <div
        class="relative flex-col min-h-screen sm:flex selection:bg-indigo-500 selection:text-white pb-8 max-w-7xl mx-auto">
        <div
            class="sticky top-2 z-50 flex flex-row items-center justify-between px-6 sm:px-8 my-2 bg-zinc-100/75 backdrop-blur transition-all duration-300 ring-zinc-300"
            :class="{ 'ring-1 shadow-lg mx-4 sm:mx-12 rounded-full': hasScrolled }" x-data="{ hasScrolled: false }"
            @scroll.window="hasScrolled = (window.scrollY >= 64);">
            <div class="font-medium font-serif tracking-wide text-lg hover:text-zinc-700">
                <a href="{{ route('home') }}" class=" flex items-center gap-x-2">
                    <x-lucide-coffee class="w-6 h-6" />
                    Café Finder
                </a>
            </div>
            @if (Route::has('login'))
                <div class="py-4 flex gap-x-4 items-center">
                    @auth
                        <a href="{{ route('home') }}"
                           class="text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Home</a>

                        <a href="{{ route('listing.index') }}"
                           class="text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Listings</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="group flex h-10 items-center justify-center rounded-full border border-orange-600 bg-gradient-to-b from-orange-400 via-orange-500 to-orange-600 px-4 text-neutral-50 shadow-[inset_0_1px_0px_0px_#FDBA74] hover:from-orange-600 hover:via-orange-600 hover:to-orange-600 active:[box-shadow:none]"><span
                                    class="block group-active:[transform:translate3d(0,1px,0)]">Get Started</span></a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="mx-2 sm:mx-8">
            @yield('content')
        </div>

    </div>

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
