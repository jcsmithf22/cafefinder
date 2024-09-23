@props(['label', 'field', 'name', 'textarea' => false])

<label for="{{ $name }}"
    class="block text-sm font-medium leading-6 {{ $errors->has($field) ? 'text-red-600' : 'text-zinc-900' }}">{{ isset($label) ? $label : $field }}</label>
<div class="mt-2">
    @if ($textarea)
        <textarea name="{{ $name }}" id="{{ $name }}" wire:model="{{ $field }}" rows="3"
            class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset placeholder:text-zinc-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 {{ $errors->has($field) ? 'focus:ring-red-600 ring-red-300 text-red-900' : 'focus:ring-orange-600 ring-zinc-300 text-zinc-900' }}"></textarea>
    @else
        <input type="text" name="{{ $name }}" id="{{ $name }}" wire:model="{{ $field }}"
            class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset placeholder:text-zinc-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 {{ $errors->has($field) ? 'focus:ring-red-600 ring-red-300 text-red-900' : 'focus:ring-orange-600 ring-zinc-300 text-zinc-900' }}" />
    @endif
</div>
@error($field)
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
@enderror
