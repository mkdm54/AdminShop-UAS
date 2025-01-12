<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('admin.index') }}"
            class="text-white text-3xl font-semibold uppercase hover:text-gray-300">{{ $username }}</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ route('admin.index') }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="{{ route('admin.create') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Add Product
        </a>
        <a href="{{ route('admin.products') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Show Product
        </a>
    </nav>
</aside>