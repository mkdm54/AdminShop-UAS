@props(['id', 'placeholder'])

<div class="relative w-80">
    <!-- Kotak untuk Ikon -->
    <div title="search"
        class="absolute top-0 left-0 flex items-center justify-center w-10 h-full bg-orange-600 text-white rounded-l-sm">
        <i class="fas fa-search text-lg"></i>
    </div>
    <!-- Input Field -->
    <input id="{{ $id }}" type="text" placeholder="{{ $placeholder }}"
        class="w-full pl-12 pr-4 py-3 text-sm border-2 border-gray-300 focus:outline-none focus:border-orange-600  transition duration-300">
</div>
