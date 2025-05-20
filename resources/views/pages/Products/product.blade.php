@extends('layouts.default')
@section('product')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <a href="{{ route('table')}}" class="btn btn-secondary m-2">
    <i class="bi bi-arrow-left"></i> Back
</a>
    <section class="section">
        <div class="row">
            <div class="col-lg-10">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">General Form Elements</h5>

                        <!-- General Form Elements -->
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="productname" value="{{old('productname')}}"  >
                                    @error('productname')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="category_id">
                                        <option selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                         {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="price" value="{{old('price')}}">
                                    @error('price')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>

                                    @error('description')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label"> Main Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="main_image" value="">
                                    @error('main_image')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Sub Image</label>
                                <div class="col-sm-10">
                                    @for ($i = 0; $i < 5; $i++)
                                        <input class="form-control" type="file" id="formFile" name="sub_images[]">
                                        @endfor
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
    </section>
</main>