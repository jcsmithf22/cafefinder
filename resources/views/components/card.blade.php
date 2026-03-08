<div class="rounded-2xl w-fit flex flex-grow {{ $border ?? 'bg-gray-100 ring-1 ring-black/5'}} {{ $padding ?? 'p-1.5' }}">
  <div {{ $attributes->twMerge('shadow-md rounded-xl overflow-hidden ring-1 ring-zinc-200 bg-white') }}>
    {{ $slot }}
  </div>
</div>
