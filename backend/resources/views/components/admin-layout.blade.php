@props(['username', 'javascript'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @if ($javascript)
        @vite('resources/js/admin/'.$javascript.'.js')
    @endif
    @vite('resources/css/admin.css')

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            --tw-bg-opacity: 1;
            background-color: rgb(234 88 12 / var(--tw-bg-opacity, 1))
                /* #ea580c */
            ;
        }

        .active-nav-link {
            background-color: rgb(255, 255, 255)
        }

        .nav-item:hover {
            background-color: white;
            color: #ea580c;
        }

        .account-link:hover {
            background-color: red;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    {{-- *Side Bar --}}
    <x-admin-side-bar :username="$username"></x-admin-side-bar>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        {{-- *Desktop Header --}}
        <x-dekstop-header :username="$username"></x-dekstop-header>

        {{-- *Mobile Header & Nav --}}
        <x-mobile-header-nav></x-mobile-header-nav>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">{{ $title }}</h1>
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>

</html>
