<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BankCardFormModal extends Component
{
    protected $listeners = [
        'openBankCardFormModal' => 'open',
        'cryptogramCreated' => 'cryptogramCreated'
    ];

    public $displayModal = false;
    public $disable = false;

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

    public function cryptogramCreated($data)
    {
        $this->disable = true;
        $this->emit('bankCardFormFilled', $data);
    }

    public function render()
    {
        return view('livewire.bank-card-form-modal');
    }
}
