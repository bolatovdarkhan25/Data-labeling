<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserUpdateModal extends Component
{
    protected $listeners = [
        'openUserUpdateModal' => 'open'
    ];

    public $displayModal;
    public $user;
    public $name;
    public $email;
    public $role;

    public function open(User $user)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->user = $user;
        $this->displayModal = true;
    }

    public function close()
    {
        $this->displayModal = false;
    }

    public function confirmForm()
    {
        $this->user->update(['name' => $this->name, 'email' => $this->email, 'role' => $this->role]);
        $this->emit('userUpdated');
        $this->close();
    }

    public function render()
    {
        return view('livewire.admin.user-update-modal');
    }
}
