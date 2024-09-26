@extends('layouts.app')

@section('content')
    <div class="mt-0 my-8 rounded-3xl overflow-hidden aspect-square sm:aspect-[2/1] md:aspect-[3/1] relative shadow-lg bg-zinc-900">
        <img src="{{ Vite::asset('resources/images/hero.webp') }}" alt="" class="brightness-50 absolute inset-x w-full h-full object-cover object-center">
        <div class="absolute inset-x-4 sm:inset-x-0 bottom-8 flex-col items-center justify-center">
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

    <div class="flex flex-col sm:flex-row gap-8">
        <x-card class="w-80 sm:h-screen h-8">
        </x-card>
        <div class="w-full flex gap-4 flex-wrap h-fit">
            <x-card class="p-6 w-full flex flex-wrap gap-3 items-center justify-between bg-yellow-100 ring-yellow-300">
                <p>Don't see your coffee shop?</p>
                <a href="{{ route('listing.create') }}"
                   class="group flex h-10 items-center justify-center rounded-full border border-orange-600 bg-gradient-to-b from-orange-400 via-orange-500 to-orange-600 px-4 text-neutral-50 shadow-[inset_0_1px_0px_0px_#FDBA74] hover:from-orange-600 hover:via-orange-600 hover:to-orange-600 active:[box-shadow:none]"><span
                        class="block group-active:[transform:translate3d(0,1px,0)]">Post a coffee shop</span></a>
            </x-card>
            @foreach($listings as $listing)
                <x-card class="p-6 flex flex-col sm:flex-row gap-6 w-full sm:items-center">
                    <div class="flex flex-col h-full">
                        <div
                            class="flex flex-col justify-center items-center h-16 w-16 overflow-hidden rounded-xl border shadow-sm border-zinc-200 border-b-zinc-300/8">
                            <img src="{{ asset("storage/" . $listing->image) }}" alt="logo" class="h-16 w-auto" />
                        </div>
                    </div>
                    <div class="">
                        <flux:heading size="lg"><a href="{{ route('listing.show', $listing->slug) }}">{{ $listing->name }}</a></flux:heading>
                        @if ($listing->description)
                            <flux:subheading><p class="whitespace-pre-wrap">{{ trim($listing->description) }}</p></flux:subheading>
                        @endif
                        <div class="mt-4">
                            <flux:badge>New</flux:badge>
                            <flux:badge>Fancy</flux:badge>
                            <flux:badge>Wifi</flux:badge>
                            <flux:badge>Affordable</flux:badge>
                        </div>
                        <div class="flex flex-col gap-2 text-sm mt-4">
                            <div class="flex flex-row">
                                <flux:icon.map class="w-5 h-5 mr-2 flex-shrink-0 text-zinc-600" />
                                <span class="truncate">{{ $listing->getFullAddress() }}</span>
                            </div>
                            @if ($listing->email)
                                <div class="flex items-center">
                                    <flux:icon.envelope class="w-5 h-5 mr-2 flex-shrink-0 text-zinc-600" />
                                    <a href="mailto:{{ $listing->email }}" class="hover:underline truncate">
                                        {{ $listing->email }}
                                    </a>
                                </div>
                            @endif
                            @if ($listing->phone)
                                <div class="flex items-center">
                                    <flux:icon.phone class="w-5 h-5 mr-2 flex-shrink-0 text-zinc-600" />
                                    <a href="tel:{{ $listing->phone }}" class="hover:underline truncate">
                                        {{ $listing->phone }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </x-card>
            @endforeach
        </div>
    </div>
@endsection
