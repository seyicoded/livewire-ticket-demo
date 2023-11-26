@extends('app')

@section('content')

    @if ($type == 'dashboard')
        @livewire('home')
    @elseif($type == "register")
        <livewire:register />
    @endif
@endsection