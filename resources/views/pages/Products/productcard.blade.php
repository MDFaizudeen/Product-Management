@extends('layouts.default')
@section('card')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Product Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Product page</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      @foreach($products as $product)
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">               
            <h5 class="card-title">Product Card</h5>
            <img src="{{asset('/product/'.$product->main_image)}}" alt="" height="50" width="50">
            <h4>{{ $product->name }}</h4>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">Price</div>
              <div class="col-lg-9 col-md-8">₹{{$product->price}}</div>
            </div>

            <a href="{{ route('products.show', $product->id) }}">View Details</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </section>
</main><!-- End #main -->
