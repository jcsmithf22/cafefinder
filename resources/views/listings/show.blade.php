@extends('layouts.dashboard')

@section('content')
    <flux:heading size="xl" level="1">{{ $listing->name }}</flux:heading>

    <flux:subheading>Provide details about the coffee shop.</flux:subheading>
@endsection
