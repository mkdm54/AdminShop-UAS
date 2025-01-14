import showAlert from "./showAlert";

document.getElementById('form-reset').addEventListener('submit', function (event) {
    event.preventDefault();

    showAlert('info', 'Sedang memproses...', 'Reset');

    const email = document.querySelector('[name="email"]').value;
    const password = document.querySelector('[name="password"]').value;
    const passwordConfirmation = document.querySelector('[name="password_confirmation"]').value;
    const token = document.querySelector('[name="token"]').value;
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/password/reset', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': CSRF_TOKEN,
        },
        body: JSON.stringify({
            'token' : token,
            'email': email,
            'password': password,
            'password_confirmation': passwordConfirmation
        })
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
                console.log(error.message)
                showAlert('error', error.message, 'Error');
            }
            else {
                showAlert('error', 'Terjadi kesalahan server.', 'Error');
            }
        })
});