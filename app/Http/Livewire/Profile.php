<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    protected $listeners = [
        'profileUpdated' => 'render'
    ];

    public function updateProfile()
    {
        $this->emit('openUpdateProfileModal', Auth::id());
    }

    public function render()
    {
        return view('livewire.profile', ['user' => Auth::user()]);
    }
}
