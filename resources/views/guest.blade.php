@extends('app')

@section('content')

    @if ($type == 'login')
        @livewire('login')
    @elseif($type == "register")
        <livewire:register />
    @endif
@endsection