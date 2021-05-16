<?php

namespace App\Http\Livewire\Admin;

use App\Models\Subscription;
use Livewire\Component;

class SubscriptionUpdateModal extends Component
{
    protected $listeners = [
        'openUpdateSubscriptionModal' => 'open'
    ];

    public $displayModal;
    public $subscription;
    public $name;
    public $price;
    public $class;

    protected $rules = [
        'name' => 'required|string',
        'price' => 'required|numeric',
        'class' => 'required|string'
    ];


    public function open(Subscription $subscription)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->displayModal = true;
        $this->subscription = $subscription;
        $this->name = $subscription->name;
        $this->price = $subscription->price;
        $this->class = $subscription->class;
    }

    public function close()
    {
        $this->displayModal = false;
    }

    public function update()
    {
        $this->validate();

        $this->subscription->update([
            'name' => $this->name,
            'price' => $this->price,
            'class' => $this->class ?? 'gradient1',
        ]);

        $this->emit('subscriptionUpdated');

        $this->close();
    }

    public function chooseClass($class)
    {
        $this->class = $class;
    }

    public function render()
    {
        return view('livewire.admin.subscription-update-modal');
    }
}
