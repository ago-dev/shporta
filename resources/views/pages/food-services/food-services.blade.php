@extends('layouts.app', ['class' => 'bg-blue'])

@section('content')
    <div class="header bg-blue py-7 py-lg-5">
    </div>
    <div class="container-employee pb-5">
        <h1 class="text-white display-3 emp-heading">Our partnership</h1>
        <p class="text-light">List of Food Services in partnership with our company.<br>
        <small>Here you can add new food-services, update existing ones and delete/deactivate companies
        according our reports.</small></p>
        <br>

        @include('pages.food-services.create')
        @include('pages.food-services.list')
    </div>
@endsection
