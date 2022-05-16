@extends('layouts.app', ['class' => 'bg-blue'])

@section('content')
    <div class="header bg-blue py-7 py-lg-5">
    </div>

    <div class="container-employee pb-5">
        <h1 class="text-white display-3 emp-heading">Customer Orders</h1>
        <p class="text-light">Manage all orders purchased by your customers<br>
        <br>
        @include('pages.dashboard.orders.list')
    </div>
@endsection
