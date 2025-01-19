import showAlert from "./showAlert";


document.getElementById('register-account').addEventListener('submit', function (event) {
    event.preventDefault();

    showAlert('info', 'Sedang memproses...', 'Create');

    const username = document.getElementById('create-username-input').value;
    const password = document.getElementById('create-password-input').value;
    const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Validasi input sisi klien
    if (!username || username.length < 4 || username.length > 50) {
        showAlert('error', 'Username harus memiliki panjang antara 4-50 karakter.', 'Validasi Gagal');
        return;
    }
    if (!password || password.length < 6) {
        showAlert('error', 'Password harus memiliki minimal 6 karakter.', 'Validasi Gagal');
        return;
    }

    fetch('/register', {
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
                console.log(error.message)
                showAlert('error', error.message, 'Error');
            }
            else {
                showAlert('error', 'Terjadi kesalahan server.', 'Error');
            }
        })
});