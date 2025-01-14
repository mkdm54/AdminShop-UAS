import showAlert from "./showAlert";

document.getElementById('form-input').addEventListener('submit', function (event) {
    event.preventDefault();


    showAlert('info', 'Sedang memproses...', 'Proses Login');

    const username = document.getElementById('username-input').value;
    const password = document.getElementById('password-input').value;
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': CSRF_TOKEN,
        },
        body: JSON.stringify({ username, password })
    })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    throw new Error(data.error || 'Network response was not ok');
                });
            }
            return response.json();
        })
        .then(data => {
            //hapus pesan loading ketika selesai
            document.getElementById('alert-container').style.display = 'none';

            if (data.error) {
                showAlert('error', data.error, 'Error');
                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 4000); // Tunda redirect

            } else {
                showAlert('success', data.success, 'Success');
                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 4000); // Tunda redirect

            }
        }).catch((error) => {
            if (error.message) {
                showAlert('error', error.message, 'Error');
            }
            else {
                showAlert('error', 'Terjadi kesalahan server.', 'Error');
            }
        })
});