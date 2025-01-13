<button {{ $attributes->merge(['class' => 'login-btn bg-orange-600 text-white border-none px-4 py-2 text-base rounded cursor-pointer w-full']) }} 
    type="submit">{{ $slot }}
</button>
