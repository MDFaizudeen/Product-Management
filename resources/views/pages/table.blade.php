@extends('layouts.default')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<main id="main" class="main">

  <div class="pagetitle">
    <h1>General Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">General</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" required>
    <button type="submit">Import Products</button>
</form>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <form action="{{route('product.export')}}" method="get">
          @csrf
          <input type="submit" class="btn btn-success buttons" value="Export">
        </form>
        <div class="d-flex justify-content-end">
          <a href="{{route('products.create')}}" class="btn btn-warning m-2 ">Create</a>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Product Table</h5>

            <!-- Table with stripped rows -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Price</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                
                @php
                {{$sn=1;}}
                @endphp

                @forelse ($product as $products )
                <tr>
                  <td>{{$sn++;}}</td>
                  <td>{{ $products->name }}</td>
                  <td>{{$products->category->name}}</td>
                  <td>{{$products->price}}</td>
                  <td>
                    <a href="{{route('product.edit',$products->id) }}" class="btn btn-primary">Edit </a>
                    <a href="{{route('productview',$products->id)}}" class="btn btn-success">View</a>
                    <a href="{{route('delete' ,$products->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                      Delete
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center">No Data Found</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {!! $product->links('pagination::bootstrap-5') !!}
            <!-- End Table with stripped rows -->