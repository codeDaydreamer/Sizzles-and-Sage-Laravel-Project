@extends('layouts.app')

@section('content')
<section class="reservation-page">
    <div class="reservation-background" style="background-image: url('{{ asset('images/reservation.jpg') }}');">
        <div class="reservation-overlay"></div>

        <div class="reservation-form-container">
            <div class="reservation-form-content">
                <h2 class="reservation-form-heading">Make a Reservation</h2>
                <form action="{{ route('submitReservation') }}" method="POST" id="reservationForm" class="reservation-form">
                    @csrf

                    <!-- Success message inside the form -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                            <button class="close-btn">&times;</button>
                        </div>
                    @endif

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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Automatically hide the alert after 2 seconds
        const alert = document.querySelector('.alert');
        if (alert) {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 600); // 600ms to match the fade-out duration
            }, 1000); // 3 seconds
        }
    });
</script>
@endsection

@endsection

@section('styles')
<style>
    .alert {
        background-color: #28a745; /* Green background */
        color: white; /* White text */
        border: 1px solid #218838; /* Darker green border */
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 15px; /* Space below the message */
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        transition: opacity 0.6s ease-in-out;
        opacity: 1;
    }

    .close-btn {
        display: none;
        background: none;
        border: none;
        font-size: 1.5rem;
        color: white;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close-btn:hover {
        color: #fff; /* White color on hover */
    }
</style>
@endsection
