@extends('layouts.dashboard')

@section('content')
    <flux:heading size="xl" level="1">Edit {{ $listing->name }}</flux:heading>

    <flux:subheading>Add, update, or remove details.</flux:subheading>

    <livewire:listings.edit :listing="$listing" />
@endsection
