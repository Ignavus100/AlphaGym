document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const messageDiv = document.getElementById('form-message');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch('process_contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageDiv.textContent = 'Your message has been sent successfully!';
                messageDiv.className = 'form-message success';
                form.reset();
            } else {
                messageDiv.textContent = data.error || 'An error occurred. Please try again.';
                messageDiv.className = 'form-message error';
            }
        })
        .catch(error => {
            messageDiv.textContent = 'An error occurred. Please try again.';
            messageDiv.className = 'form-message error';
        });
    });
});
