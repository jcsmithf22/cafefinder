<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ListingForm extends Form
{
    use WithFileUploads;

    #[Validate('required')]
    public string $name = '';

    #[Validate('nullable')]
    public string $description = '';

    #[Validate('required')]
    public string $address = '';

    #[Validate('required')]
    public string $city = '';

    #[Validate('required')]
    public string $state = '';

    #[Validate('required')]
    public string $zipcode = '';

    #[Validate('nullable')]
    public string $phone = '';

    #[Validate('nullable')]
    public string $website = '';

    #[Validate('nullable')]
    public string $email = '';

    #[Validate('image|max:1024')]
    public $photo;
}
