@extends('layouts.app')

@section('content')
    <div class="container user-profile-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card user-profile-card">
                    <div class="card-header user-profile-header">User Profile</div>

                    <div class="card-body user-profile-info">
                        <h5 class="user-profile-name">Name: {{ $user->name }}</h5>
                        <p class="user-profile-email">Email: {{ $user->email }}</p>
                        <p class="user-profile-created-at">Created At: {{ $user->created_at }}</p>
                    </div>

                    <div class="card-body user-profile-orders">
                        <h5 class="user-profile-orders-title">Orders:</h5>
                        <div class="row user-profile-orders-header">
                            <div class="col-md-4"><strong>Order Name</strong></div>
                            <div class="col-md-4"><strong>Order Price</strong></div>
                            <div class="col-md-4"><strong>Order Date</strong></div>
                        </div>
                        @foreach ($orders as $order)
                            <div class="row user-profile-order-item">
                                <div class="col-md-4">{{ $order->item_name }}</div>
                                <div class="col-md-4">${{ $order->item_price }}</div>
                                <div class="col-md-4">{{ $order->created_at }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-body user-profile-total-amount">
                        <h5 class="user-profile-total-title">Total Amount of Orders: ${{ $totalAmount }}</h5>
                        <button class="btn btn-primary user-profile-checkout-button" onclick="checkout()">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkout() {
            // Implement your checkout logic here
        }
    </script>
@endsection
