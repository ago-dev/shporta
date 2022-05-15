@extends('layouts.customer')
@section('content')
    <div class="cust-wrapper">
        <br><br>
        <div class="container">
            <div class="flex-container">
                <div>
                    <h1 class="menu-heading menu-name">{{ $foodService->name }} Menu</h1>
                    <h6 class="menu-heading">Select items to add to cart <i class="ni ni-cart"></i></h6>
                </div>

                <a class="back-button" href="{{ route('welcome') }}">
                    <div class="arrow-wrap">
                        <span class="arrow-part-1"></span>
                        <span class="arrow-part-2"></span>
                        <span class="arrow-part-3"></span>
                    </div>
                </a>
            </div>

            <br>
            @foreach($foodCategories as $category)
                <h3 class="food-category-title">{{ $category->name }}</h3>

                <ul class="food-items">
                    @foreach($menu->foodItems as $foodItem)
                        @if($foodItem->food_category_id == $category->id)
                            <form class="cart-form" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <li class="food-item">
                                    <span class="food-item-name">{{ $foodItem->name }}</span>
                                    <span class="food-item-price">{{ $foodItem->price }}$</span>
                                </li>
                                <input type="hidden" value="{{ $foodItem->id }}" name="id">
                                <input type="hidden" value="{{ $foodItem->name }}" name="name">
                                <input type="hidden" value="{{ $foodItem->price }}" name="price">
                                <input type="hidden" value="1" name="quantity">
                                <button class="cart-btn">+</button>
                            </form>
                        @endif
                    @endforeach
                </ul>
                <br>
            @endforeach
        </div>
    </div>
    @include('layouts.footers.customer.footer')
@endsection
