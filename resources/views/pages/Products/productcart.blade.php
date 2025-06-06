@extends('layouts.default')

<h2>Your Cart</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($items->isEmpty())
<div class="d-flex justify-content-center align-items-center" style="height: 20vh;">
    <p class="text-center">Your cart is empty.</p>
</div>
@else

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Your Cart</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Cart page</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <a href="{{ route('card')}}" class="btn btn-secondary m-2">
        <i class="bi bi-arrow-left"></i> Back
    </a>
    <section class="section">
        <div class="row">
            @php $grandTotal = 0; @endphp
            @foreach($items as $item)
            @php
            $itemTotal = $item->quantity * $item->product->price;
            $grandTotal += $itemTotal;
            @endphp

            <div class="col-lg-4">
                <div class="card position-relative">
                <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="position: absolute; top: 10px; right: 10px;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" title="Remove Item">
                &times;
            </button>
        </form>
       
                    <div class="card-body">
                        <img src="{{asset('/product/'.$item->product->main_image)}}" alt="" height="50" width="50">
                        <h5 class="card-title">{{ $item->product->name }}</h5>

                        <div class="mb-2">
                            <strong>Quantity:</strong>
                            <form class="quantity-form d-inline" data-id="{{ $item->id }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <button type="button" data-action="decrease" class="btn btn-sm btn-outline-secondary update-qty">−</button>
                                <span class="mx-2 quantity-display">{{ $item->quantity }}</span>
                                <button type="button" data-action="increase" class="btn btn-sm btn-outline-secondary update-qty">+</button>
                            </form>
                        </div>


                        <div class="mb-2">
                            <strong>Price per unit:</strong> ₹{{ $item->product->price }}
                        </div>
                        <div class="mb-2">
                            <strong>Total:</strong> ₹<span class="item-total" data-id="{{ $item->id }}">{{ $itemTotal }}</span>
                        </div>


                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <form action="{{ url('/order/place') }}" method="POST">
            @csrf
            <input type="submit" class="btn btn-primary" value="Place Order">
            
        </form>

        <!-- Grand Total Display -->
        <div class="row mt-4">
            <div class="col-12 text-end">
                <h4><strong>Grand Total: ₹<span id="grand-total">{{ $grandTotal }}</span></strong></h4>
            </div>
        </div>
    </section>

</main>

@endif