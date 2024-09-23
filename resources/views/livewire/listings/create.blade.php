<?php

use App\Livewire\Forms\ListingForm;
use Livewire\Volt\Component;

new class extends Component {
    public ListingForm $form;

    public function save()
    {
        $this->validate();
        dump($this->form->all());
    }
}; ?>

<div>
    <form class="flex flex-col gap-y-12" wire:submit="save">
        <div class="border-b border-zinc-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-zinc-900">Coffee Shop Information</h2>
            <p class="mt-1 text-sm leading-6 text-zinc-600">Provide details about the coffee shop.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <x-input type="text" field="form.name" name="shop-name" label="Shop name" />
                </div>

                <div class="col-span-full">
                    <x-input type="text" field="form.description" name="description" label="Description"
                        textarea="true" />
                </div>

                <div class="col-span-full">
                    <x-input type="text" field="form.address" name="street-address" autocomplete="street-address"
                        label="Street address" />
                </div>

                <div class="sm:col-span-2 sm:col-start-1">
                    <x-input type="text" field="form.city" name="city" autocomplete="city" label="City" />
                </div>

                <div class="sm:col-span-2">
                    <x-input type="text" field="form.state" name="state" autocomplete="state" label="State" />
                </div>

                <div class="sm:col-span-2">
                    <x-input type="text" field="form.zipcode" name="postal-code" autocomplete="postal-code"
                        label="ZIP / Postal code" />
                </div>
            </div>
        </div>
        <div>
            <flux:button type="submit" variant="primary">Submit</flux:button>
        </div>
    </form>
</div>
