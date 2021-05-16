<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UpdateProfileModal extends Component
{
    protected $listeners = [
        'openUpdateProfileModal' => 'open'
    ];

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email'
    ];

    public $displayModal;
    public $name;
    public $email;
    public $user;

    public function open(User $user)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->displayModal = true;
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function close()
    {
        $this->displayModal = false;
    }

    public function update()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email
        ]);

        $this->emit('profileUpdated');

        $this->close();
    }

    public function render()
    {
        return view('livewire.update-profile-modal');
    }
}
