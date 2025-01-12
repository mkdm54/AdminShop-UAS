<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="w-1/2"></div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <h1 class="relative right-2 top-3">{{ $username }}</h1>
        <button @click="isOpen = !isOpen"
            class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="https://media.tenor.com/bDgdFlOwH0AAAAAi/fire-emblem-maid-fire-emblem.gif">
        </button>
        <button x-show="isOpen" @click="isOpen = false"
            class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button title="Sign Out" type="submit" class="block px-8 py-2 account-link hover:text-white">Sign Out</button>
            </form>
        </div>
    </div>
</header>