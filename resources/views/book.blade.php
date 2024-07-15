@extends('layouts.app')

@section('content')
<section class="reservation-page">
    <div class="reservation-background" style="background-image: url('{{ asset('images/reservation.jpg') }}');">
        <div class="reservation-overlay"></div>
        @if (session('success'))
        <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="alert alert-success" style="margin-bottom: 0;">
                {{ session('success') }}
            </div>
        </div>
        @endif

        <div class="reservation-form-container">
            <div class="reservation-form-content">
                <h2 class="reservation-form-heading">Make a Reservation</h2>
                <form action="{{ route('submitReservation') }}" method="POST" id="reservationForm" class="reservation-form">
                    @csrf
                    <div class="reservation-form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required class="reservation-input" placeholder="Your Name">
                    </div>
                    <div class="reservation-form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required class="reservation-input" placeholder="Your Email">
                    </div>
                    <div class="reservation-form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" required class="reservation-input" placeholder="Your Phone Number">
                    </div>
                    <div class="reservation-form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required class="reservation-input" placeholder="Reservation date">
                    </div>
                    <div class="reservation-form-group">
                        <label for="time">Time</label>
                        <input type="time" id="time" name="time" required class="reservation-input" placeholder="Reservation time">
                    </div>
                    <div class="reservation-form-group">
                        <label for="people">Number of People</label>
                        <input type="number" id="people" name="people" min="1" required class="reservation-input" placeholder="Number of guests">
                    </div>
                    <button type="submit" class="reservation-button">Submit Reservation</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/index.js') }}"></script>
@endsection
