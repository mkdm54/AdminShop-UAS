<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Product</title>
    @vite('resources/css/admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
            --tw-bg-opacity: 1;
            background-color: rgb(234 88 12 / var(--tw-bg-opacity, 1))
                /* #ea580c */
            ;
        }

        .nav-item:hover {
            background-color: white ;
        }

        .account-link:hover {
            background-color: red;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    {{-- *Side Bar --}}
    <x-admin-side-bar :username="$username"></x-admin-side-bar>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        {{-- *Desktop Header --}}
        <x-dekstop-header :username="$username"></x-dekstop-header>

        {{-- *Mobile Header & Nav --}}
        <x-mobile-header-nav></x-mobile-header-nav>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Products</h1>
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Products
                </p>
                <x-product-table :products="$products"></x-product-table>
            </main>
        </div>
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>
