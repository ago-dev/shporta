@extends('layouts.app', ['class' => 'bg-blue'])

@section('content')
    <div class="header bg-blue py-7 py-lg-5">
    </div>
    <div class="container-employee pb-5">
        <h1 class="text-white display-3 emp-heading">Our partnership</h1>
        <p class="text-light">List of Food Services in partnership with us</p>
        <br>

        @include('components.food-services.create')
        @include('components.food-services.list')
    </div>
@endsection
