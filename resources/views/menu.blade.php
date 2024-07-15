@extends('layouts.app')

@section('content')
<section class="menu">
    <div class="container">
        <h2 class="menu-heading">Menu</h2>

        @if (session('success'))
        <div id="success-alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 0;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        <!-- Menu Categories -->
        <div class="menu-categories">
            <a href="#appetizers" class="menu-category button">Appetizers</a>
            <a href="#main-courses" class="menu-category button">Main Courses</a>
            <a href="#desserts" class="menu-category button">Desserts</a>
            <a href="#drinks" class="menu-category button">Drinks</a>
        </div>

        <!-- Appetizers Section -->
        <section id="appetizers" class="menu-section">
            <h3 class="menu-section-heading">Appetizers</h3>
            <div class="menu-items">
                @foreach ($appetizers as $appetizer)
                <div class="menu-item">
                    <img src="{{ asset($appetizer->image) }}" alt="{{ $appetizer->name }}">
                    <div class="menu-item-details">
                        <p class="menu-item-name">{{ $appetizer->name }}</p>
                        <p class="menu-item-price">ksh {{ $appetizer->price }}</p>
                        <form action="{{ route('placeOrder') }}" method="POST">
                            @csrf
                            <input type="hidden" name="item_name" value="{{ $appetizer->name }}">
                            <input type="hidden" name="item_price" value="{{ $appetizer->price }}">
                            <button type="submit" class="button">Order Now</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Main Courses Section -->
        <section id="main-courses" class="menu-section">
            <h3 class="menu-section-heading">Main Courses</h3>
            <div class="menu-items">
                @foreach ($mainCourses as $mainCourse)
                <div class="menu-item">
                    <img src="{{ asset($mainCourse->image) }}" alt="{{ $mainCourse->name }}">
                    <div class="menu-item-details">
                        <p class="menu-item-name">{{ $mainCourse->name }}</p>
                        <p class="menu-item-price">ksh {{ $mainCourse->price }}</p>
                        <form action="{{ route('placeOrder') }}" method="POST">
                            @csrf
                            <input type="hidden" name="item_name" value="{{ $mainCourse->name }}">
                            <input type="hidden" name="item_price" value="{{ $mainCourse->price }}">
                            <button type="submit" class="button">Order Now</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Desserts Section -->
        <section id="desserts" class="menu-section">
            <h3 class="menu-section-heading">Desserts</h3>
            <div class="menu-items">
                @foreach ($desserts as $dessert)
                <div class="menu-item">
                    <img src="{{ asset($dessert->image) }}" alt="{{ $dessert->name }}">
                    <div class="menu-item-details">
                        <p class="menu-item-name">{{ $dessert->name }}</p>
                        <p class="menu-item-price">ksh {{ $dessert->price }}</p>
                        <form action="{{ route('placeOrder') }}" method="POST">
                            @csrf
                            <input type="hidden" name="item_name" value="{{ $dessert->name }}">
                            <input type="hidden" name="item_price" value="{{ $dessert->price }}">
                            <button type="submit" class="button">Order Now</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Drinks Section -->
        <section id="drinks" class="menu-section">
            <h3 class="menu-section-heading">Drinks</h3>
            <div class="menu-items">
                @foreach ($drinks as $drink)
                <div class="menu-item">
                    <img src="{{ asset($drink->image) }}" alt="{{ $drink->name }}">
                    <div class="menu-item-details">
                        <p class="menu-item-name">{{ $drink->name }}</p>
                        <p class="menu-item-price">ksh {{ $drink->price }}</p>
                        <form action="{{ route('placeOrder') }}" method="POST">
                            @csrf
                            <input type="hidden" name="item_name" value="{{ $drink->name }}">
                            <input type="hidden" name="item_price" value="{{ $drink->price }}">
                            <button type="submit" class="button">Order Now</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(function () {
                alert.remove();
            }, 3000); // Dismiss after  seconds
        }
    });
</script>
@endsection
