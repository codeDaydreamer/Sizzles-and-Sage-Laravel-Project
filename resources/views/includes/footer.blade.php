<footer>
    <div class="container">
        <div class="footer-columns">
            <div class="footer-logo">
                <p class="logo">Sizzles & Sage</p>
                <p class="footer-contact">
                    1234, Flavor Town, NBO 56789<br>
                    Phone: +254 792803063<br>
                    Email: info@sizzleandsage.com
                </p>
            </div>
            <div class="footer-logo">


                <p class="footer-open-days">
                    <strong>Open Days</strong><br>
                    Monday - Friday: 11:00 AM - 10:00 PM<br>
                    Saturday - Sunday: 10:00 AM - 11:00 PM
                </p>
                <p class="footer-social">
                    <strong>Follow Us</strong><br>
                    <a href="https://www.facebook.com/" target="_blank">Facebook</a> |
                    <a href="https://x.com/" target="_blank">Twitter</a> |
                    <a href="https://www.instagram.com/" target="_blank">Instagram</a>
                </p>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('menu') }}">Menu</a></li>
                    <li><a href="{{ route('book') }}">Book a Table</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-subscribe">
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    <label for="email">Subscribe to our Newsletter</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Sizzles & Sage. All Rights Reserved. Designed and Developed by Kev Karanja</p>
    </div>
</footer>
