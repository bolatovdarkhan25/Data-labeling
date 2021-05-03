<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreateModal extends Component
{
    protected $listeners = [
        'openUserCreateModal' => 'open'
    ];

    public $displayModal;
    public $name;
    public $email;
    public $role;

    public function open()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->displayModal = true;
    }

    public function close()
    {
        $this->displayModal = false;
    }

    public function confirmForm()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make('11111111')
        ]);

        $this->emit('userCreated');
        $this->close();
    }

    public function render()
    {
        return view('livewire.admin.user-create-modal');
    }
}
