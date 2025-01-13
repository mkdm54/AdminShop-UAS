// untuk view form.blade.php
function showAlert(type, message, label) {
    const alertIcon = document.getElementById('aler-icon');
    const alertLabel = document.getElementById('alert-label');
    const alertMessage = document.getElementById('aler-message');
    const alertContainer = document.getElementById('alert-container');

    alertContainer.className = `flex items-center gap-2 p-1 w-auto mb-2 rounded-lg shadow-md transition-transform duration-300 ease-in-out opacity-95 hover:scale-105 hover:opacity-100 ${type === 'success'
        ? 'text-green-800 bg-green-100 border border-green-300'
        : type === 'warning'
            ? 'text-yellow-800 bg-yellow-100 border border-yellow-300'
            : type === 'error'
                ? 'text-red-800 bg-red-100 border border-red-300'
                : 'text-blue-800 bg-blue-100 border border-blue-300'
        }`;

    alertIcon.innerHTML =
        type === 'success'
            ? '<i class="bi bi-check-lg"></i>'
            : type === 'warning'
                ? '<i class="bi bi-exclamation-triangle"></i>'
                : type === 'error'
                    ? '<i class="bi bi-x"></i>'
                    : '<i class="bi bi-info-circle"></i>';

    alertLabel.innerHTML = label;
    alertMessage.innerHTML = message;
    alertContainer.style.display = 'flex'; // Menampilkan container

    setTimeout(() => {
        alertContainer.style.display = 'none';
    }, 4000);
};

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