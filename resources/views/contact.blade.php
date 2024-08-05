@extends('layouts.app')

@section('content')
<section class="contact-us-page" style="background-image: url('{{ asset('images/contact.jpg') }}');">
    <div class="contact-us-background">
        <div class="container">
            <div class="contact-us-content">
                <h2>Contact Us</h2>
                <p>Have questions or feedback? Reach out to us using the form below or visit our location.</p>

                <div class="contact-form">
                    <form id="contactForm" method="POST" action="{{ route('submitContact') }}">
                        @csrf

                        <!-- Success message will be inserted here -->
                        <div id="flash-message" class="flash-message">
                            <!-- Success message will be inserted here -->
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                            <span class="error" id="name-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                            <span class="error" id="email-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                            <span class="error" id="message-error"></span>
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
                        <p>+254792803063</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .contact-form {
        position: relative;
    }

    .flash-message {
        color: #28a745; /* Green text color */
        font-size: 1em;
        margin-bottom: 15px; /* Space below the message */
        display: none; /* Initially hidden */
    }

    .form-group {
        margin-bottom: 15px; /* Space below form groups */
    }

    .error {
        color: red;
        font-size: 0.9em;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log("JavaScript loaded");

        const form = document.getElementById('contactForm');
        const flashMessage = document.getElementById('flash-message');
        const nameError = document.getElementById('name-error');
        const emailError = document.getElementById('email-error');
        const messageError = document.getElementById('message-error');

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission
            console.log("Form submitted");

            // Clear previous error messages
            nameError.textContent = '';
            emailError.textContent = '';
            messageError.textContent = '';

            // Prepare form data
            const formData = new FormData(form);

            // Submit form via AJAX
            fetch('{{ route('submitContact') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                console.log("Fetch response:", response);
                return response.json();
            })
            .then(data => {
                console.log("Response data:", data); // Log response data for debugging

                if (data.success) {
                    console.log("Success message received"); // Debugging
                    flashMessage.textContent = data.success;
                    flashMessage.style.display = 'block';
                    setTimeout(() => {
                        flashMessage.style.display = 'none';
                        flashMessage.textContent = ''; // Clear the message after hiding
                    }, 3000); // Display message for 3 seconds

                    // Clear the form fields
                    form.reset();
                } else if (data.errors) {
                    console.log("Validation errors:", data.errors); // Debugging
                    // Display validation errors
                    if (data.errors.name) {
                        nameError.textContent = data.errors.name[0];
                    }
                    if (data.errors.email) {
                        emailError.textContent = data.errors.email[0];
                    }
                    if (data.errors.message) {
                        messageError.textContent = data.errors.message[0];
                    }
                } else {
                    console.error('Unexpected response format:', data);
                }
            })
            .catch(error => {
                console.error('Fetch error:', error); // Log fetch errors
            });
        });
    });
</script>
@endsection
