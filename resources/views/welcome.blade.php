@extends('layouts.app')

@section('content')
    <style>
        @media(prefers-color-scheme: dark) {
            .bg-dots {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(200,200,255,0.15)'/%3E%3C/svg%3E");
            }
        }

        @media(prefers-color-scheme: light) {
            .bg-dots {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,50,0.10)'/%3E%3C/svg%3E")
            }
        }
    </style>

    <div
        class="relative flex-col min-h-screen bg-zinc-100 sm:flex dark:bg-zinc-900 selection:bg-indigo-500 selection:text-white pb-8">
        <div class="sticky top-0 z-50 flex flex-row items-center justify-between mx-8">
            <div class="font-medium font-serif tracking-wide text-lg hover:text-zinc-700">
                <a href="{{ route('home') }}" class=" flex items-center gap-x-2">
                    <x-lucide-coffee class="w-6 h-6" />
                    Café Finder
                </a>
            </div>
            @if (Route::has('login'))
                <div class="py-6 flex gap-x-4 items-center">
                    @auth
                        <a href="{{ route('home') }}"
                            class="text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Home</a>
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

        <div class="mt-0 m-8 rounded-3xl overflow-hidden h-fit relative shadow-lg bg-zinc-900">
            <img src="{{ Vite::asset('resources/images/hero.webp') }}" alt="" class="brightness-50">
            <div class="absolute inset-x-0 bottom-8 flex-col items-center justify-center">
                <h1 class="text-white text-5xl tracking-normal text-center font-serif">
                    Find Your Dream Cafe
                </h1>
                <div
                    class="caret-black text-black mt-6 relative shadow-lg max-w-96 w-full mx-auto flex items-center bg-white rounded-full overflow-hidden focus-within:ring-2 focus-within:ring-orange-600">
                    <x-lucide-search class="w-7 h-7 top-3 left-3 m-3" />
                    <input type="text" class="border-0 focus-within:ring-0 focus:ring-0 px-0 py-0 text-lg w-full"
                        placeholder="Houston" />
                </div>

            </div>
        </div>

        <div class="flex flex-row gap-x-8 mx-8">
            <div class="w-80 h-screen shadow-lg rounded-3xl overflow-hidden bg-white ring-1 ring-zinc-200">

            </div>
            <div class="w-full">
                <div
                    class="shadow-lg rounded-3xl overflow-hidden ring-1 ring-zinc-200 p-6 w-full flex items-center justify-between bg-white">
                    <p>Don't see your coffee shop?</p>
                    <a href="{{ route('register') }}"
                        class="group flex h-10 items-center justify-center rounded-full border border-orange-600 bg-gradient-to-b from-orange-400 via-orange-500 to-orange-600 px-4 text-neutral-50 shadow-[inset_0_1px_0px_0px_#FDBA74] hover:from-orange-600 hover:via-orange-600 hover:to-orange-600 active:[box-shadow:none]"><span
                            class="block group-active:[transform:translate3d(0,1px,0)]">Post a coffee shop</span></a>
                </div>
            </div>
        </div>
    </div>
@endsection
