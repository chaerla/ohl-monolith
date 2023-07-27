<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">
        {{ $label }}
    </label>
    <input
        class="shadow-sm appearance-none border-gray-300 rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error($name) is-invalid @enderror"
        type="{{ $type }}" name="{{ $name }}">
    <div class="hidden text-sm text-red-600" id="error-message-{{ $name }}"></div>
</div>
