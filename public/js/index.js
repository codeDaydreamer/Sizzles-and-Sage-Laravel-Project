document.addEventListener('DOMContentLoaded', function () {
    // Function to show alert message
    function showAlert(message, type) {
        const notificationCard = document.createElement('div');
        notificationCard.classList.add('notification-card');
        notificationCard.textContent = message;

        // Add specific class based on alert type
        if (type === 'success') {
            notificationCard.classList.add('success');
        } else if (type === 'error') {
            notificationCard.classList.add('error');
        }

        // Append notification card to form container
        const formContainer = document.querySelector('.reservation-form-container');
        if (formContainer) {
            formContainer.appendChild(notificationCard);

            // Remove notification card after 3 seconds
            setTimeout(() => {
                notificationCard.remove();
            }, 3000);
        } else {
            console.error('Form container not found.');
        }
    }

    // Reservation form submission handler
    const reservationForm = document.getElementById('reservationForm');
    if (reservationForm) {
        reservationForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Simulate success for demonstration
            showAlert('Reservation successful!', 'success');
        });
    } else {
        console.error('Reservation form not found.');
    }

    // Contact form submission handler
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Simulate success for demonstration
            showAlert('Message sent!', 'success');

            // Clear form fields after successful submission
            contactForm.reset();
        });
    } else {
        console.error('Contact form not found.');
    }

    // Header dropdown logic (assuming this logic is shared and does not need adjustment)
    const userDropdown = document.getElementById('userDropdown');
    const dropdownMenu = document.querySelector('.dropdown-menu');
    if (userDropdown && dropdownMenu) {
        userDropdown.addEventListener('click', function (event) {
            event.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        // Close the dropdown if the user clicks outside of it
        document.addEventListener('click', function (event) {
            if (!userDropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    } else {
        console.error('Dropdown elements not found.');
    }
});
