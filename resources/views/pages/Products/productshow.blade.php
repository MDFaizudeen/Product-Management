@extends('layouts.default')
@section('show')
<main id="main" class="main">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <div class="pagetitle">
        <h1>View Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active">Product Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <a href="{{ route('card') }}" class="btn btn-secondary m-2">
        <i class="bi bi-arrow-left"></i> Back
    </a>

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Product Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Name</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Category</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->category->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Price</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->price }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Description</div>
                                    <div class="col-lg-9 col-md-8">{{ $product->description }}</div>
                                </div>

                                <!-- Main Image -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Image</div>
                                    <div class="col-lg-12 col-md-8">
                                        <img id="mainProductImage" 
                                        data-main="{{ asset($product->main_image ? 'product/' . $product->main_image : 'img/Emptyprofile.png') }}"
                                        src="{{ asset($product->main_image ? 'product/' . $product->main_image : 'img/Emptyprofile.png') }}" alt="" width="200" height="200">
                                    </div>
                                </div>

                                <!-- Sub Images -->
                                <div class="row">
                                    @php
                                        $subImages = [
                                            $product->sub_image_1,
                                            $product->sub_image_2,
                                            $product->sub_image_3,
                                            $product->sub_image_4,
                                            $product->sub_image_5,
                                        ];
                                    @endphp

                                    @foreach($subImages as $subImage)
                                        <div class="col-lg-1 col-md-8 m-1">
                                            <img class="sub-image"
                                                src="{{ asset($subImage ? 'product/' . $subImage : 'img/Emptyprofile.png') }}"
                                                data-image="{{ asset($subImage ? 'product/' . $subImage : 'img/Emptyprofile.png') }}"
                                                alt="" width="50" height="50">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Add to Cart Button -->
                            <div class="d-flex justify-content-center mt-4">
                                <form action="{{ route('cart.item') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="submit" class="btn btn-primary text-center" value="🛒 Add to Cart">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection


