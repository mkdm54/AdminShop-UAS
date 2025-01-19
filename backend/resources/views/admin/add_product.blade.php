<x-admin-layout :username="$username" title="Add Product">
    <div class="flex flex-col items-center gap-4">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Add
        </p>
        <x-alert-message></x-alert-message>
        <div class="login-container bg-white p-8 rounded-lg shadow-md text-center w-96">
            <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <x-input-component id="product_name" name="product_name" label="Add Product" type="text"
                    placeholder="Enter your product"></x-input-component>
                <x-input-component id="price" name="price" label="Price" type="text"
                    placeholder="Enter your price"></x-input-component>
                <x-input-component id="description" name="description" label="Description" type="text"
                    placeholder="Description"></x-input-component>
                <x-input-component id="quantity" name="quantity" label="Quantity" type="text"
                    placeholder="Quantity"></x-input-component>
                <x-button title="Add Product" type="submit">Add</x-button>
            </form>
        </div>
    </div>
</x-admin-layout>
