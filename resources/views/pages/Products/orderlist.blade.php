@extends('layouts.default')



<main id="main" class="main">
    <div class="pagetitle">
        <h1>Order History</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif
    <div class="d-flex justify-content-end">
        <a href="{{ route('card') }}" class="btn btn-warning m-2">Home</a>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card position-relative">
                    <div class="card-body">
                        <h5 class="card-title">Your Cart</h5>

                        <table class="table table-bordered border-primary">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sn = 1;
                                $sum = 0;
                                @endphp

                                @forelse ($orders->orderItems as $orderItem)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $orderItem->product->name }}</td>
                                    <td>{{ number_format($orderItem->price, 2) }}</td>
                                    <td>{{ $orderItem->quantity }}</td>
                                    <td>{{ number_format($orderItem->price * $orderItem->quantity, 2) }}</td>
                                </tr>
                                @php
                                $sum += $orderItem->price * $orderItem->quantity;
                                @endphp
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Data Found</td>
                                </tr>
                                @endforelse

                                @if ($orders->orderItems->count())
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                                    <td><strong>{{ number_format($sum, 2) }}</strong></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>