@extends('layouts.app')

@section('content')
    <div class="mt-0 my-8 rounded-3xl overflow-hidden h-fit relative shadow-lg bg-zinc-900">
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

    <div class="flex flex-row gap-x-8">
        <x-card class="w-80 h-screen">
        </x-card>
        <div class="w-full">
            <x-card class="p-6 w-full flex items-center justify-between bg-yellow-100 ring-yellow-300">
                <p>Don't see your coffee shop?</p>
                <a href="{{ route('listing.create') }}"
                    class="group flex h-10 items-center justify-center rounded-full border border-orange-600 bg-gradient-to-b from-orange-400 via-orange-500 to-orange-600 px-4 text-neutral-50 shadow-[inset_0_1px_0px_0px_#FDBA74] hover:from-orange-600 hover:via-orange-600 hover:to-orange-600 active:[box-shadow:none]"><span
                        class="block group-active:[transform:translate3d(0,1px,0)]">Post a coffee shop</span></a>
            </x-card>
        </div>
    </div>
@endsection
