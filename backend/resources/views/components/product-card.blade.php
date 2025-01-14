@props(['products'])

@foreach ($products as $product)
<div class="bg-white p-6 rounded-lg shadow-lg w-64 relative overflow-hidden group">
    <!-- Ikon hiasan di pojok -->
    <div class="absolute top-0 right-0 p-2">
        <span class="bg-orange-500 text-white px-2 py-1 text-xs font-bold rounded-lg">Promo</span>
    </div>

    <!-- Konten utama card -->
    <h3
        class="font-bold text-xl text-gray-800 mb-2 group-hover:text-orange-500 transition duration-300">
        {{ $product->product_name }}</h3>
    <p class="text-orange-500 text-lg font-semibold mb-4">{{ $product->price }}</p>
    <p class="text-gray-700 text-sm mb-4">{{ $product->description }}</p>

    <!-- Stok dan tombol -->
    <div class="flex justify-between items-center mb-4">
        <p class="text-gray-500 text-xs">Stok: {{ $product->quantity }}</p>
        <button
            class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 text-sm rounded-lg shadow-md transition duration-300">
            Beli
        </button>
    </div>

    <!-- Tanggal produk ditambahkan -->
    <p class="text-gray-400 text-xs text-right">Ditambahkan: {{ \Carbon\Carbon::parse($product->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</p>

    <!-- Hover animasi dekoratif -->
    <div
        class="absolute inset-0 bg-orange-300 scale-0 group-hover:scale-100 rounded-lg opacity-20 transition-transform duration-500">
    </div>
</div>
@endforeach