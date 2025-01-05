<div class="input-group">
    <label for="{{ $name }}">{{ $label }}<span class="required text-red-500 font-mono">*</span></label>
    <input class="username-input" type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        placeholder="{{ $placeholder }}" required>

    {{-- alert --}}
    <i class="text-xs text-red-700" hidden>{{ $error }}</i>
</div>
