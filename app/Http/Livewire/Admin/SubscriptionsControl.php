<?php

namespace App\Http\Livewire\Admin;

use App\Models\Subscription;
use Livewire\Component;

class SubscriptionsControl extends Component
{
    public $name;
    public $price;
    public $class;

    protected $listeners = [
        'subscriptionUpdated' => '$refresh'
    ];

    protected $rules = [
        'name' => 'required|string',
        'price' => 'required|numeric',
        'class' => 'required|string'
    ];

    public function chooseClass($class)
    {
        $this->class = $class;
    }

    public function refresh()
    {
        $this->name = null;
        $this->price = null;
        $this->class = null;

        $this->render();
    }

    public function store()
    {
        $this->validate();

        Subscription::create([
            'name' => $this->name,
            'price' => $this->price,
            'class' => $this->class ?? 'gradient1'
        ]);

        $this->refresh();
    }

    public function updateSubscription($id)
    {
        $this->emit('openUpdateSubscriptionModal', $id);
    }

    public function deleteSubscription($id)
    {
        Subscription::destroy($id);

        $this->refresh();
    }

    public function render()
    {
        $subscriptions = Subscription::all();
        $pageName = 'Subscriptions';
        return view('livewire.admin.subscriptions-control', compact('subscriptions', 'pageName'));
    }
}
