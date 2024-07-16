@extends('layouts.app')

@section('content')
    <div class="container user-profile-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card user-profile-card">
                    <div class="user-profile-header">User Profile</div>

                    <div class="card-body user-profile-info">
                        <h5 class="user-profile-name">Name: {{ $user->name }}</h5>
                        <h5 class="user-profile-email">Email: {{ $user->email }}</h5>
                        <h5 class="user-profile-created-at">Created At: {{ $user->created_at }}</h5>
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
                                <div class="col-md-4">ksh {{ $order->item_price }}</div>
                                <div class="col-md-4">{{ $order->created_at }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-body user-profile-total-amount">
                        <h5 class="user-profile-total-title">Total Amount of Orders: ksh {{ $totalAmount }}</h5>
                        <div class="d-flex justify-content-center">
                            <button class=" user-profile-checkout-button" onclick="checkout()">Checkout</button>
                        </div>  </div>
                </div>
            </div>
        </div>
    </div>
<style>

.userprofile .container {
    margin-top: 20px;
    background-color: lightsalmon;
}
.user-profile-container {
    margin-top: 20px;
    background-color: darkred;
    margin-bottom: 20px;
    border-radius: 10px;
}

.user-profile-card {
    margin-bottom: 20px;
    background-color: brown;
    color: white;
    padding: 20px;
    margin-top: 20px;
}

.user-profile-header {
    background-color: brown;
    font-weight: bold;
    font-family: 'Oleo Script Swash Caps', cursive;
    text-align: center;
    font-size: 2em;
    padding: 20px;
    border-radius: 10px;
}

.user-profile-info,
.user-profile-orders,
.user-profile-total-amount {
    margin-bottom: 20px;
}

.user-profile-order-item {
    margin-bottom: 10px;
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
}

.user-profile-orders-header {
    margin-bottom: 10px;
}

.user-profile-total-title, .user-profile-orders-title  {
    font-size: 1.25rem;
    margin-bottom: 10px;
    text-align: center;
    font-family: 'Oleo Script Swash Caps', cursive;
    font-weight: 50;
}

.user-profile-checkout-button {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    text-align: center;
    padding: 10px;
    color: whitesmoke;
    border-radius: 5px;
    transition: 0.5s ease-in-out;
}
.user-profile-checkout-button:hover{
    background-color: green;
}
button{
    text-align: center;
}
h5{
    font-family: 'Times New Roman', Times, serif;
    font-weight: bolder;
}

</style>

<script>
    function checkout() {
        const phoneNumber = prompt("Enter your phone number:");
        const amount = {{ $totalAmount }};

        if (phoneNumber) {
            fetch("{{ route('checkout') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    phone_number: phoneNumber,
                    amount: amount
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Checkout response:", data);
                alert("Checkout initiated. Please complete the payment on your phone.");
            })
            .catch(error => {
                console.error("Checkout error:", error);
                alert("An error occurred during checkout. Please try again.");
            });
        }
    }
</script>
@endsection
