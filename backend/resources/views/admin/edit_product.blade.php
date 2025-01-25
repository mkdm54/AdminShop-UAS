<x-admin-layout :username="$username" :lable="'Edit Product'" :title="'Edit Product Page'">
    <div class="flex flex-col items-center gap-4">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Edit
        </p>
        <x-alert-message></x-alert-message>
        <div class="login-container bg-white p-8 rounded-lg shadow-md text-center w-96">
            <form method="POST" action="{{ route('admin.update', ['admin' => $product->id]) }}">
                @csrf
                @method('PUT')
                <x-input-component id="product_name" name="product_name" label="Add Product" type="text"
                    placeholder="Enter your product" value="{{ $product->product_name }}"></x-input-component>
                <x-input-component id="price" name="price" label="Price" type="text"
                    placeholder="Enter your price" value="{{ $product->price }}"></x-input-component>
                <x-input-component id="description" name="description" label="Description" type="text"
                    placeholder="Description" value="{{ $product->description }}"></x-input-component>
                <x-input-component id="quantity" name="quantity" label="Quantity" type="text" placeholder="Quantity"
                    value="{{ $product->quantity }}"></x-input-component>
                <x-button title="Add Product" type="submit">Save</x-button>
            </form>
        </div>
    </div>
</x-admin-layout>