export default function showAlert(type, message, label) {
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