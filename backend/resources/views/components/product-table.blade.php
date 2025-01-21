@props(['products'])

<div class="p-6 px-0">
    {{-- *search-bar --}}
    <x-search-bar :id="'search-product'" :name="'search'" :placeholder="'Search for products...'"></x-search-bar>

    {{-- *product-table --}}
    <table class="mt-4 w-full min-w-max table-auto text-left border">
        <thead class="bg-blue-500">
            <tr>
                <th class="cursor-pointer border border-gray-400 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        No
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4"></svg>
                    </p>
                </th>
                <th class="cursor-pointer border border-gray-400 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Product
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4"></svg>
                    </p>
                </th>
                <th class="cursor-pointer border border-gray-400 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Price
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4"></svg>
                    </p>
                </th>
                <th class="cursor-pointer border border-gray-400 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Description
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4"></svg>
                    </p>
                </th>
                <th class="cursor-pointer border border-gray-400 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Quantity
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4"></svg>
                    </p>
                </th>
                <th class="cursor-pointer border border-gray-400 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Date Created
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4"></svg>
                    </p>
                </th>
                <th class="cursor-pointer border border-gray-400 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Date Updated
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-4 w-4"></svg>
                    </p>
                </th>
                <th class="cursor-pointer border border-gray-400 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Actions
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="p-4 border border-gray-400">
                        <div class="flex items-center gap-3">
                            <div class="flex flex-col">
                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">{{ $loop->iteration }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 border border-gray-400">
                        <div class="flex items-center gap-3">
                            <div class="flex flex-col">
                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">{{ $product->product_name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 border border-gray-400">
                        <div class="flex items-center gap-3">
                            <div class="flex flex-col">
                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">{{ $product->price }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 border border-gray-400">
                        <div class="flex flex-col">
                            <p class="truncate block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">{{ $product->description }}</p>
                        </div>
                    </td>
                    <td class="p-4 border border-gray-400">
                        <div class="flex items-center gap-3">
                            <div class="flex flex-col">
                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">{{ $product->quantity }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 border border-gray-400">
                        <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">{{ \Carbon\Carbon::parse($product->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</p>
                    </td>

                    <td class="p-4 border border-gray-400">
                        <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">{{ \Carbon\Carbon::parse($product->updated_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</p>
                    </td>

                    <td class="p-4 border border-gray-400">
                        <div class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30">
                            <span class="relative top-2 -left-3 transform -translate-y-1/2 -translate-x-1/2" title="Edit">
                                <a href="{{ route('admin.edit', ['admin' => $product->id]) }}"><i class="fa-solid fa-pencil text-green-500 text-lg"></i></a>
                            </span>

                            <form action="{{ route('admin.destroy', ['admin' => $product]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="relative left-5 transform -translate-y-5 -translate-x-1/2" title="Delete" type="submit"><i class="fa-solid fa-trash text-red-500 text-lg"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
