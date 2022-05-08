<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Session extends Component
{
    public $createPart = true;

    public function render()
    {
        return view('livewire.client.session');
    }
}
