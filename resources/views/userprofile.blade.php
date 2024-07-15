@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body user-info">
                        <h5>Name: {{ $user->name }}</h5>
                        <p>Email: {{ $user->email }}</p>
                        <p>Created At: {{ $user->created_at }}</p>
                    </div>

                    <div class="card-body orders">
                        <h5>Orders:</h5>
                        @foreach ($orders as $order)
                            <div class="order-item">
                                <p>Order ID: {{ $order->id }}</p>
                                <p>Total Amount: ${{ $order->total_amount }}</p>
                                <p>Order Date: {{ $order->created_at }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-body total-amount">
                        <h5>Total Amount of Orders: ${{ $totalAmount }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

