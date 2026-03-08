<?php

use App\Models\Listing;
use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Collection;

new class extends Component {
    public Collection $listings;

    public function mount(): void
    {
        $this->getListings();
    }

    public function delete(Listing $listing): void
    {
//        $listing = Listing::findBySlug($slug);
        $this->authorize('delete', $listing);

        $listing->delete();

        $this->getListings();
    }

    public function getListings(): void
    {
        $this->listings = auth()->user()->listings()->get();
    }

}; ?>

<div class="mt-10 space-y-4">
    @foreach ($listings as $listing)
        <div class="bg-gray-100 p-1.5 rounded-2xl ring-1 ring-black/5">
            <flux:card class="flex items-center gap-x-4 shadow-md">
                @if ($listing->image)
                    <div
                        class="flex flex-col justify-center items-center h-16 w-16 overflow-hidden rounded-lg border shadow-sm border-zinc-200 border-b-zinc-300/8 -m-4 mr-0">
                        <img src="{{ asset("storage/" . $listing->image) }}" alt="logo" class="h-16 w-auto" />
                    </div>
                @endif
                <p><a wire:navigate href="{{ route('listing.show', $listing->slug) }}">{{ $listing->name }}</a></p>
                <flux:button wire:click="delete('{{ $listing->slug }}')">Delete</flux:button>
                <a wire:navigate href="{{ route('listing.edit', $listing->slug) }}">Edit</a>
            </flux:card>
        </div>
    @endforeach
</div>
