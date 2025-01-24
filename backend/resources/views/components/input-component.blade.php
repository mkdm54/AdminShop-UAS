
<div class="input-group text-left mb-4">
    <label for="{{ $name }}">{{ $label }}<span class="required text-red-500 font-mono">*</span></label>
    <input class="w-full p-2 text-sm border border-gray-200 rounded-md shadow-sm focus:outline-none" type="{{ $type }}" id="{{ $id}}" name="{{ $name }}"
        placeholder="{{ $placeholder }}" value="{{ $value }}" required>
</div>
