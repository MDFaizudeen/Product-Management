@extends('layouts.default')

<h2>Customer Orders</h2>
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
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Orders</h5>

                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('admin.orders') }}" class="row g-3 mb-4">
                            <div class="col-md-2">
                                <input type="text" name="customer" class="form-control" placeholder="Customer Name" value="{{ request('customer') }}">
                            </div>

                            <div class="col-md-4 d-flex">
                                <button type="submit" class="btn btn-primary me-2">Filter</button>
                                <a href="{{ route('admin.orders') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>

                        @forelse($orders as $order)
                        <h3>Order #{{ $order->id }}
                            (Customer: {{ $order->user->name }} - Total: ${{ number_format($order->total_price, 2) }})
                        </h3>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price ($)</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total ($)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sn = 1;
                                $sum = 0;
                                @endphp

                                @forelse ($order->orderItems as $orderItem)
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
                                    <td colspan="5" class="text-center">No Items Found</td>
                                </tr>
                                @endforelse

                                @if ($order->orderItems->count())
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Total</strong></td>
                                    <td><strong>{{ number_format($sum, 2) }}</strong></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <br>
                        @empty
                        <p>No orders found.</p>
                        @endforelse
                        <div class="mt-4">
                            {{$orders->links('pagination::bootstrap-5')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>