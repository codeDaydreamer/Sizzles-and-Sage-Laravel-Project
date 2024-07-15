@extends('layouts.app')

@section('content')
<section class="hero" style="background-image: url('{{ asset('images/hero.jpeg') }}');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1><span class="logo-design">S</span>izzles & Sag<span class="logo-design">e</span></h1>
        <p>Create Unforgettable Moments at Sizzle & Sage – The Perfect Setting for Romantic Dinners and Special
            Celebrations. Taste the Magic of Every Meal.</p>
        <a href="{{ route('menu') }}" class="button">Explore Menu</a>
    </div>
</section>
<section class="about-section">
    <div class="container">
        <h2>Welcome to Sizzles & Sage</h2>
        <div class="about-columns">
            <div class="about-text">

                <p style="padding:10px;font: size 2em;line: height 2em;">Welcome to Sizzles & Sage, your premier dining
                    destination located in the heart of Flavour Town. For
                    over 20 years, we have been delighting our guests with exquisite culinary experiences, blending
                    traditional recipes with modern flavors. Our commitment to using the finest ingredients, paired with
                    our exceptional service, makes us a standout choice for food lovers. Whether you're here for a
                    special occasion or a casual meal, we aim to make every visit memorable. Join us and savor the taste
                    of excellence that has made Sizzles & Sage a beloved spot in our community.</p>
                <div class="cta-buttons">
                    <a href="{{ route('menu') }}" class="button">Visit Menu</a>
                    <a href="{{ route('about') }}" class="button">Learn More ...</a>
                </div>
            </div>
            <div class="about-images">
                <div class="about-image" style="background-image: url('{{ asset('images/about-left.jpeg') }}');"></div>
                <div class="about-image" style="background-image: url('{{ asset('images/about-right.jpeg') }}');"></div>
            </div>
        </div>
    </div>
</section>
<section>

    <div class="container">
        <h2>Explore our Menu</h2>

        <div class="menu-items">
            <div class="menu-item">
                <img src="{{ asset('images/main1.jpg') }}" alt="Appetizer 1">
                <div class="menu-item-details">
                    <p class="menu-item-name">Grilled Beef</p>
                    <p class="menu-item-price">Ksh 1100</p>
                    <a href="{{ route('menu') }}" class="button">Visit Menu</a>
                </div>
            </div>
            <div class="menu-item">
                <img src="{{ asset('images/main2.jpg') }}" alt="Appetizer 2">
                <div class="menu-item-details">
                    <p class="menu-item-name">Tiramisu</p>
                    <p class="menu-item-price">Ksh 1300</p>
                    <a href="{{ route('menu') }}" class="button">Visit Menu</a>
                </div>
            </div>
            <div class="menu-item">
                <img src="{{ asset('images/main3.jpg') }}" alt="Appetizer 3">
                <div class="menu-item-details">
                    <p class="menu-item-name">Vegetable Stir Fry</p>
                    <p class="menu-item-price">Ksh 900</p>
                    <a href="{{ route('menu') }}" class="button">Visit Menu</a>
                </div>
            </div>
            <div class="menu-item">
                <img src="{{ asset('images/main4.jpg') }}" alt="Appetizer 4">
                <div class="menu-item-details">
                    <p class="menu-item-name">Seafood Paella</p>
                    <p class="menu-item-price">Ksh 1600</p>
                    <a href="{{ route('menu') }}" class="button">Visit Menu</a>
                </div>
            </div>

        </div>
    </div>

    </div>

</section>

<section class="contact-us-page" style="background-image: url('{{ asset('images/contact.jpg') }}');">
    <div class="contact-us-background">
        <div class="container">
            <div class="contact-us-content">
                <h2>Contact Us</h2>
                <p>Have questions or feedback? Reach out to us using the form below or visit our location.</p>
                <div class="contact-form">
                    <form action="{{ route('submitContact') }}" method="POST" id="contactForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="button">Submit</button>
                    </form>
                </div>
                <div class="contact-details">
                    <div class="contact-column">
                        <h3>Our Location</h3>
                        <p>123 Main Street, Flavour Town</p>
                    </div>
                    <div class="contact-column">
                        <h3>Email Us</h3>
                        <p>info@sizzlesnsage.com</p>
                    </div>
                    <div class="contact-column">
                        <h3>Call Us</h3>
                        <p>+1 (123) 456-7890</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Other sections can be added as per your design -->
@endsection
