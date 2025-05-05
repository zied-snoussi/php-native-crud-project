// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 500);
        }, 5000);
    });

    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            const requiredInputs = form.querySelectorAll('[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                event.preventDefault();
            }
        });
    });

    // Real-time input validation
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.hasAttribute('required') && !this.value.trim()) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    });

    // Add smooth hover effect to table rows
    const tableRows = document.querySelectorAll('table tbody tr');
    tableRows.forEach(row => {
        row.style.transition = 'background-color 0.2s';
    });

    // Add email validation
    const emailInputs = document.querySelectorAll('input[type="email"]');
    emailInputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value && !isValidEmail(this.value)) {
                this.classList.add('is-invalid');
                let feedback = this.nextElementSibling;
                if (!feedback || !feedback.classList.contains('invalid-feedback')) {
                    feedback = document.createElement('div');
                    feedback.classList.add('invalid-feedback');
                    this.parentNode.insertBefore(feedback, this.nextSibling);
                }
                feedback.textContent = 'Please enter a valid email address';
            }
        });
    });

    // Email validation helper function
    function isValidEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Add phone validation
    const phoneInputs = document.querySelectorAll('input[type="tel"]');
    phoneInputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value && !isValidPhone(this.value)) {
                this.classList.add('is-invalid');
                let feedback = this.nextElementSibling;
                if (!feedback || !feedback.classList.contains('invalid-feedback')) {
                    feedback = document.createElement('div');
                    feedback.classList.add('invalid-feedback');
                    this.parentNode.insertBefore(feedback, this.nextSibling);
                }
                feedback.textContent = 'Please enter a valid phone number';
            }
        });
    });

    // Phone validation helper function
    function isValidPhone(phone) {
        const regex = /^[0-9+\-\s()]{7,20}$/;
        return regex.test(phone);
    }

    // Add button click animations
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mousedown', function() {
            this.style.transform = 'scale(0.98)';
        });
        
        button.addEventListener('mouseup', function() {
            this.style.transform = 'scale(1)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});