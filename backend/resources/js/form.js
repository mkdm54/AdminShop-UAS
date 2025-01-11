// untuk view form.blade.php

function showAlert(type, message, label) {
    const alertIcon = document.getElementById('aler-icon');
    const alertLabel = document.getElementById('alert-label');
    const alertMessage = document.getElementById('aler-message');
    const alertContainer = document.getElementById('alert-container');

    alertContainer.className = `flex items-center gap-2 p-2 w-1/3 mb-2 rounded-lg shadow-md transition-transform duration-300 ease-in-out opacity-95 hover:scale-105 hover:opacity-100 ${type === 'success'
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
    setTimeout(() => {
        alertContainer.style.display = 'none';
    }, 4000);
};

document.getElementById('form-input').addEventListener('submit', function (event) {
    event.preventDefault();

    showAlert('info', 'Sedang memproses...', 'Proses Login');

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
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
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json(); 
        })
        .then(data => {
            //hapus pesan loading ketika selesai
            document.getElementById('alert-container').style.display = 'none';

            if (data.error) {
                showAlert('error', data.error, 'Error');
                window.location.href = data.redirect;
            } else {
                showAlert('success', 'Login berhasil!', 'Success');
                window.location.href = data.redirect;
            }
        }).catch(() => {
            showAlert('error', 'Terjadi kesalahan server.', 'Error');
        })
});