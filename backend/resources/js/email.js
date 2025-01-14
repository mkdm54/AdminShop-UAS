import showAlert from "./showAlert";

document.getElementById('reset-password-form').addEventListener('submit', function (event) {
    event.preventDefault();

    showAlert('info', 'Sedang memproses...', 'Waiting...');

    const email = document.getElementById('email-input').value;
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/forgot-password', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': CSRF_TOKEN,
        },
        body: JSON.stringify({ email })
    })
        .then(response => response.json().then(data => {
            if (!response.ok) {
                throw new Error(data.error || 'Network response was not ok');
            }
            return data;
        }))
        .then(data => {
            // Hapus pesan loading ketika selesai
            document.getElementById('alert-container').style.display = 'none';

            if (data.success) {
                showAlert('success', data.success, 'Success');
                if (data.redirect) {
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 3000);
                }
            } else {
                showAlert('error', data.error, 'Error');
            }
        })
        .catch((error) => {
            document.getElementById('alert-container').style.display = 'none'; // Pastikan pesan loading dihapus saat terjadi error
            showAlert('error', error.message, 'Error');
        });
});