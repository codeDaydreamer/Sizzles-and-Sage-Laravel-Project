<header>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="{{ route('home') }}" class="logo brand" style="color: white; font-size:2em">Siz<span class="logo-design">zle</span>s</a>
            </div>
            <!-- Hamburger menu for mobile -->
            <div class="hamburger-menu">
                <i class='bx bx-menu' id="hamburger-icon"></i>
            </div>
            <!-- Full menu for desktop -->
            <ul class="navbar-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('menu') }}">Menu</a></li>
                <li><a href="{{ route('book') }}">Book a Table</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
            <ul class="navbar-user">
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bxs-user'></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('userprofile') }}">My Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <!-- Sidebar for mobile -->
    <div id="mobile-sidebar" class="sidebar">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('menu') }}">Menu</a></li>
            <li><a href="{{ route('book') }}">Book a Table</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li><a href="{{ route('userprofile') }}">My Profile</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            @endguest
        </ul>
    </div>
</header>
