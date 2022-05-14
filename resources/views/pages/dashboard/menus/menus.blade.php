@extends('layouts.app', ['class' => 'bg-blue'])

@section('content')
    <div class="header bg-blue py-7 py-lg-5">
    </div>
    <div class="container-employee pb-5">
        <h1 class="text-white display-3 emp-heading">Menus</h1>
        <p class="text-light">Add, update or remove menus in a matter of seconds</p>
        <br>

        @include('pages.dashboard.menus.create')
        @include('pages.dashboard.menus.list')
    </div>
@endsection
