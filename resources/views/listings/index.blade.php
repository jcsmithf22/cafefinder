@extends('layouts.dashboard')

@section('content')
    <flux:heading size="xl" level="1">Listings</flux:heading>

    <flux:subheading>Create, edit, and organize your listings.</flux:subheading>

    <livewire:listings.index />
@endsection
