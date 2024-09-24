<?php

use Livewire\Volt\Component;
use Illuminate\Database\Eloquent\Collection;

new class extends Component {
    public Collection $listings;

    public function mount()
    {
        $this->listings = auth()->user()->listings()->get();
    }
}; ?>

<div class="mt-10">
    @foreach ($listings as $listing)
        <div>
            <p>{{ $listing->name }}</p>
            <p>{{ $listing->slug }}</p>
            @if ($listing->image)
                <img src="{{ asset("storage/" . $listing->image) }}" />
            @endif
        </div>
    @endforeach
</div>
