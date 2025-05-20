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
    <a href="{{ route('card')}}" class="btn btn-secondary m-2">
        <i class="bi bi-arrow-left"></i> Back
    </a>
    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">

                        <!-- this  -->
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Product Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label "> Name</div>
                                    <div class="col-lg-9 col-md-8">{{$product->name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Category</div>
                                    <div class="col-lg-9 col-md-8">{{$product->category->name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Price</div>
                                    <div class="col-lg-9 col-md-8">{{$product->price}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Description</div>
                                    <div class="col-lg-9 col-md-8">{{$product->description}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label"> Image</div>
                                    <div class="col-lg-12 col-md-8 "><img src="{{asset($product->main_image? 'product/' . $product->main_image: 'img/Emptyprofile.png')}}" alt="" width="200" height="200"></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1 col-md-8 m-1"><img src="{{asset($product->sub_image_1 ? 'product/' . $product->sub_image_1: 'img/Emptyprofile.png')}} " alt="" width="50" height="50"></div>
                                    <div class="col-lg-1 col-md-8 m-1"><img src="{{asset($product->sub_image_2 ? 'product/' . $product->sub_image_2: 'img/Emptyprofile.png')}}" alt="" width="50" height="50"></div>
                                    <div class="col-lg-1 col-md-8 m-1"><img src="{{asset($product->sub_image_3 ? 'product/' . $product->sub_image_3: 'img/Emptyprofile.png')}}" alt="" width="50" height="50"></div>
                                    <div class="col-lg-1 col-md-8 m-1"><img src="{{asset($product->sub_image_4 ? 'product/' . $product->sub_image_4: 'img/Emptyprofile.png')}}" alt="" width="50" height="50"></div>
                                    <div class="col-lg-1 col-md-8 m-1"><img src="{{asset($product->sub_image_5 ? 'product/' . $product->sub_image_5: 'img/Emptyprofile.png')}}" alt="" width="50" height="50"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <form action="{{route('cart.item')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="submit" class="btn btn-primary text-center" value="🛒Add to Cart">
                                </form>
                            </div>
                            <!-- end -->
                        </div>
                    </div>

                </div>

            </div>
    </section>

</main><!-- End #main -->