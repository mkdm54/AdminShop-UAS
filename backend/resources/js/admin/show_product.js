// *admin/show_produc.blade.php

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-product'); // Ambil elemen search bar
    const rows = document.querySelectorAll('.product-row'); // Ambil semua baris produk

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.toLowerCase(); // Ambil nilai input, ubah ke huruf kecil
        rows.forEach(row => {
            const productName = row.querySelector('td:nth-child(2) p').innerText.toLowerCase(); // Ambil nama produk
            if (productName.includes(query)) {
                row.style.display = ''; // Tampilkan baris jika cocok
            } else {
                row.style.display = 'none'; // Sembunyikan baris jika tidak cocok
            }
        });
    });
});
