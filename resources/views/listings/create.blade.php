@extends('layouts.dashboard')

@section('content')
    <flux:heading size="xl" level="1">Coffee Shop Information</flux:heading>

    <flux:subheading>Provide details about the coffee shop.</flux:subheading>

    <livewire:listings.create />
@endsection
