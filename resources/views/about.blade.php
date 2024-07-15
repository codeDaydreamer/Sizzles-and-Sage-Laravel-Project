@extends('layouts.app')

@section('content')
<section class="aboutus-hero" style="background-image: url('{{ asset('images/aboutus.jpg') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>About Us</h1>
    </div>
</section>

<section class="about-section">

    <div class="container">
    <h2>Welcome to Sizzles & Sage</h2>
        <div class="about-columns">
            <div class="about-text">

                <p style="padding:10px;font: size 2em;line: height 2em;">Welcome to Sizzles & Sage, your premier dining destination located in the heart of Flavour Town. For
                    over 20 years, we have been delighting our guests with exquisite culinary experiences, blending
                    traditional recipes with modern flavors. Our commitment to using the finest ingredients, paired with
                    our exceptional service, makes us a standout choice for food lovers. Whether you're here for a
                    special occasion or a casual meal, we aim to make every visit memorable. Join us and savor the taste
                    of excellence that has made Sizzles & Sage a beloved spot in our community.</p>
                <div class="cta-buttons">
                    <a href="{{ route('menu') }}" class="button">Visit Menu</a>
                    <a href="{{ route('book') }}" class="button">Make a Reservation</a>
                </div>
            </div>
            <div class="about-images">
                <div class="about-image" style="background-image: url('{{ asset('images/about-left.jpeg') }}');"></div>
                <div class="about-image" style="background-image: url('{{ asset('images/about-right.jpeg') }}');"></div>
            </div>
        </div>
    </div>
</section>

<section class="featured-events" style="height: 90vh;">
    <div class="container">
    <h2 style="font-family: 'Oleo Script Swash Caps', cursive; font-size: 2em;">Featured Events</h2>

        <div class="events-columns">
            <div class="event">
                <div class="event-image" style="background-image: url('{{ asset('images/event1.jpeg') }}');">
                    <div class="event-overlay"></div>
                    <div class="event-text">
                        <h3>Special Wine Tasting</h3>
                        <p>Join us for an exquisite evening of wine tasting and food pairing. Discover new flavors and
                            enjoy the ambiance of Sizzles & Sage.</p>
                        <p>Date: July 25th, 2024</p>
                    </div>
                </div>
            </div>
            <div class="event">
                <div class="event-image" style="background-image: url('{{ asset('images/music.jpg') }}');">
                    <div class="event-overlay"></div>
                    <div class="event-text">
                        <h3>Live Music Nights</h3>
                        <p>Experience live music performances every weekend at Sizzles & Sage. Enjoy great food, drinks,
                            and entertainment.</p>
                        <p>Date: Every Saturday and Sunday</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="counter-section" style="background-image: url('{{ asset('images/aboutus.jpg') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h3>600+ dishes served</h3>
        <h3>40+ A league chefs</h3>
        <h3>10,000+ satisfied customers</h3>
    </div>
</section>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    .counter-section {
        position: relative;
        background-size: cover;
        background-position: center;
        color: white;
        padding: 60px 20px;
        text-align: center;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5); /* Adjust the overlay color and opacity */
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-around;
        align-items: center;
        font-family: 'Oleo Script Swash Caps', cursive;
        font-size: 1.5rem; /* Adjust the font size as needed */
    }

    .hero-content h3 {
        margin: 0 10px; /* Adjust margin as needed */
    }
</style>

@endsection
