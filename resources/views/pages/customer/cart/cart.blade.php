@extends('layouts.customer')
@section('content')
    <br><br>
    <div class="cart-container container px-6 mx-auto">
        <div class="flex justify-center my-6">
            <div class="flex flex-col w-full p-8 text-gray-800 pin-r pin-y md:w-4/5 lg:w-4/5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ $message }}
                    </div>
                @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                <h1 class="text-3xl text-bold text-light your-cart">Your Cart
                    <p>Before ordering, please make sure you've selected the right amount of products.<br>
                        You can increase/ decrease the quantity or even remove an item from the cart</p>
                </h1>
                <br>
                <div class="flex-1">
                    <table class="cart-table table table-borderless table-hover table-light rounded">
                        <thead class="table-dark">
                        <tr class="h-12 uppercase">
                            <th class="text-left">Food Item</th>
                            <th colspan="2" class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity"></span>
                                <span class="hidden lg:inline">Quantity</span>
                            </th>
                            <th class="hidden text-right md:table-cell"> Price</th>
                            <th class="hidden text-right md:table-cell"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($cartItems as $item)
                            <tr>
                                <td>
                                    <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                </td>
                                <td colspan="2" class="justify-center mt-6 md:justify-end md:flex">
                                    <div class="h-10 w-28">
                                        <div class="relative flex flex-row w-full h-8">

                                            <form class="cart-update-form" action="{{ route('cart.update') }}"
                                                  method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id}}">
                                                <input class="quantity-input" type="number" name="quantity"
                                                       value="{{ $item->quantity }}"/>
                                                <button class="update-btn" type="submit">
                                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    ${{ $item->price }}
                                </span>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <button class="round-btn-2 bg-danger">x</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Cart is empty!</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    <div class="total-price-div">
                        Your total: $<span>{{ Cart::getTotal() }}</span>
                    </div>
                    <br>
                    <div class="cart-buttons">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger m-1"><i class="fas fa-undo"></i></button>
                        </form>

                        <button class="btn btn-success m-1"
                                data-toggle="modal"
                                data-target="#purchase-confirmation-modal"><i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                    @include('pages.customer.cart.modals.PurchaseConfirmationModal',
                            ['totalPrice' => Cart::getTotal()]);
                </div>
            </div>
        </div>
    </div>

@endsection
