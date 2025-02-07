<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/user.css')
    <title>Document</title>
</head>

<body>
    <div class="h-screen w-full bg-white relative flex overflow-hidden">

        <!-- Sidebar -->
        <aside
            class="h-full w-16 flex flex-col space-y-10 items-center justify-center relative bg-orange-600 text-white">
            <!-- Profile -->
            <div
                class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer bg-orange-600 hover:bg-orange-400  hover:duration-300 hover:ease-linear focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd" />
                </svg>
            </div>

            <!-- Courses -->
            <div
                class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer bg-orange-600 hover:bg-orange-400  hover:duration-300 hover:ease-linear focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>

            <!-- Theme -->
            <div
                class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer bg-orange-600 hover:bg-orange-400  hover:duration-300 hover:ease-linear focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
            </div>

            <!-- Configuration -->
            <div
                class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer bg-orange-600 hover:bg-orange-400  hover:duration-300 hover:ease-linear focus:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </aside>



        <div class="w-full h-full flex flex-col justify-between">
            <!-- Header -->
            <header class="h-16 w-full flex items-center relative justify-between px-5 bg-orange-600">
                <!-- Logo atau Navigasi (Opsional) -->
                <div class="text-white font-bold text-lg">
                    <a href="#" class="hover:text-orange-300">Beranda</a>
                </div>

                <!-- Informasi User -->
                <div class="flex flex-shrink-0 items-center space-x-4 text-white">
                    <!-- Informasi Nama -->
                    <div class="flex flex-col items-end">
                        <div class="text-md font-medium">{{ $username }}</div>
                    </div>

                    <!-- Foto Profil -->
                    <img src="https://media.tenor.com/bDgdFlOwH0AAAAAi/fire-emblem-maid-fire-emblem.gif"
                        class="h-10 w-10 rounded-full cursor-pointer bg-gray-200 border-2 border-blue-400"></img>

                    <!-- Tombol Logout -->
                    <form id="logout-user" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button title="Sign Out" type="submit"
                            class="bg-white hover:bg-orange-400 text-orange-600 hover:text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md transition duration-300">
                            Sign Out
                        </button>
                    </form>
                    <!-- Tombol Delete Account -->
                    <form id="delete-account" action="{{ route('user.destroy', ['user' => Auth::user()->id]) }}"
                        method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" title="Delete Account"
                            class="bg-white hover:bg-orange-400 text-orange-600 hover:text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md transition duration-300">
                            Delete Account
                        </button>
                    </form>
                </div>
            </header>


            <!-- Main -->
            <main class="max-w-full h-full flex relative overflow-y-hidden">
                <!-- Container -->
                <div
                    class="h-full w-full m-4 flex flex-wrap items-start justify-start rounded-tl grid-flow-col auto-cols-max gap-4 overflow-y-scroll">
                    {{-- *Product Card --}}
                    <x-product-card :products="$products"></x-product-card>
                </div>
            </main>
        </div>

    </div>
</body>

</html>
