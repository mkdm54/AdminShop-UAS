<div
    class="flex items-center gap-2 p-2 w-1/3 mb-2 rounded-lg 
    {{ $type === 'success' ? 'text-green-800 bg-green-100 border border-green-300' : '' }}
    {{ $type === 'warning' ? 'text-yellow-800 bg-yellow-100 border border-yellow-300' : '' }}
    {{ $type === 'error' ? 'text-red-800 bg-red-100 border border-red-300' : '' }}
    {{ $type === 'info' ? 'text-blue-800 bg-blue-100 border border-blue-300' : '' }}
    shadow-md transition-transform duration-300 ease-in-out opacity-95 hover:scale-105 hover:opacity-100">

    <span class="text-xl w-6 text-center">
        @if ($type === 'success')
            <i class="bi bi-check-lg"></i>
        @elseif($type === 'warning')
            <i class="bi bi-exclamation-triangle"></i>
        @elseif($type === 'error')
            <i class="bi bi-x"></i>
        @elseif($type === 'info')
            <i class="bi bi-info-circle"></i>
        @endif
    </span>

    <span>
        <span class="font-bold mr-1">{{ ucfirst($type) }}!</span> {{ $message }}
    </span>
</div>
