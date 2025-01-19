
<x-admin-layout :username="$username" title="Products Page">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Products
    </p>
    <x-product-table :products="$products"></x-product-table>
</x-admin-layout>