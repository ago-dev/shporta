@extends('layouts.app', ['class' => 'bg-blue'])

@section('content')
    <div class="header bg-blue py-7 py-lg-5">
    </div>
    <div class="container-employee pb-5">
        <h1 class="text-white display-3 emp-heading">Employee Management Tool</h1>
        <p class="text-light">Get the best out of your data in simple clicks</p>
        <br>

        @include('pages.employees.create')
        @include('pages.employees.list')

    </div>
@endsection
