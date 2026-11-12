@props(['field'])

@error($field)
    <p class="text-red-600 text-md text-center">{{ $message }}</p>
@enderror
