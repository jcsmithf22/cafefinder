<?php

use App\Livewire\Forms\ListingForm;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

new class extends Component {
    use WithFileUploads;

    public ListingForm $form;

    public function save()
    {
        $validated = $this->validate();
        if ($this->form->photo) {
            $path = $this->form->photo->store('logos', 'public');
            $validated['image'] = $path;
        }
        auth()->user()->listings()->create($validated);
    }

    public function clearPhoto()
    {
        $this->form->photo = null;
    }
}; ?>

<div>
    <form class="flex flex-col gap-y-12" wire:submit="save">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <flux:input wire:model="form.name" label="Shop name" />
            </div>

            <div class="col-span-full">
                <flux:textarea wire:model="form.description" label="Description" id="description" />
            </div>

            <div class="col-span-full">
                <flux:input wire:model="form.address" label="Street" autocomplete="street-address" />
            </div>

            <div class="sm:col-span-2 sm:col-start-1">
                <flux:input wire:model="form.city" autocomplete="address-level2" label="City" />
            </div>

            <div class="sm:col-span-2">
                <flux:input wire:model="form.state" autocomplete="address-level1" label="State" />
            </div>

            <div class="sm:col-span-2">
                <flux:input wire:model="form.zipcode" autocomplete="postal-code" label="ZIP / Postal code" />
            </div>

            <div class="sm:col-span-3">
                <flux:field>
                    <label class="text-sm font-medium select-none text-zinc-800 dark:text-white">Logo
                        image</label>
                    <div
                        class="mt-3 flex justify-center rounded-lg border border-dashed px-6 py-10 bg-white {{ $errors->has('form.photo') ? 'border-red-600' : 'border-zinc-900/25' }}">
                        <div class="text-center">
                            @if ($form->photo)
                                <div
                                    class="mx-auto flex flex-col justify-center items-center h-16 w-16 overflow-hidden rounded-lg border shadow-sm border-zinc-200 border-b-zinc-300/8 -rotate-12 transition hover:scale-105 hover:rotate-0">
                                    <img src="{{ $form->photo->temporaryUrl() }}" class="h-16 w-auto" />
                                </div>
                                <div class="mt-4 flex gap-x-2 items-center">
                                    <p class="text-xs leading-5 text-zinc-600">
                                        {{ $form->photo->getClientOriginalName() }}</p>
                                    <flux:button type="button" icon="x-mark" size="sm" wire:click="clearPhoto" />
                                </div>
                            @else
                                <svg class="mx-auto h-12 w-12 text-zinc-300" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-zinc-600">
                                    <label for="logo-upload"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 hover:text-blue-500">
                                        <span>Upload a file</span>
                                        <input id="logo-upload" wire:model="form.photo" name="logo-upload"
                                            type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-zinc-600">PNG, JPG, WEBP up to 1MB</p>
                            @endif
                        </div>
                    </div>
                    <flux:error name="form.photo" />
                </flux:field>
            </div>

            <div class="flex justify-end col-span-full">
                <flux:button type="submit" variant="primary">Submit</flux:button>
            </div>

        </div>
    </form>
</div>
