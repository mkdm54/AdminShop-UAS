<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    @vite('resources/css/admin.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
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
                <h1 class="w-full text-3xl text-black pb-6">Add Product</h1>
                <div class="flex flex-col items-center gap-4">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Product
                    </p>
                    <x-alert-message></x-alert-message>
                    <div class="login-container bg-white p-8 rounded-lg shadow-md text-center w-96">
                        <form method="POST" action="{{ route('admin.store') }}">
                            @csrf
                            <x-input-component id="product_name" name="product_name" label="Add Product" type="text" placeholder="Enter your product"></x-input-component>
                            <x-input-component id="price" name="price" label="Price" type="text" placeholder="Enter your price"></x-input-component>
                            <x-input-component id="description" name="description" label="Description" type="text" placeholder="Description"></x-input-component>
                            <x-input-component id="quantity" name="quantity" label="Quantity" type="text" placeholder="Quantity"></x-input-component>
                            <x-button type="submit">Add</x-button>
                        </form>
                    </div>
                </div>
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
