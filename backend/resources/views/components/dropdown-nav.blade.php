<nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
    <a href="{{ route('admin.index') }}" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
        <i class="fa-solid fa-house mr-3"></i>
        Dashboard
    </a>
    <a href="{{ route('admin.products') }}"
        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-table mr-3"></i>
        Show Product
    </a>
    <a href="{{ route('admin.create') }}"
        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-align-left mr-3"></i>
        Add Product
    </a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button title="Sign Out" type="submit"
            class="flex items-center text-white opacity-75 hover:opacity-100 pr-10 pl-4 nav-item">
            <i class="fa-solid fa-right-to-bracket mr-3"></i>
            Sign Out
        </button>
    </form>
</nav>