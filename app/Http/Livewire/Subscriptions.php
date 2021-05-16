<?php

namespace App\Http\Livewire;

use App\Models\Subscription;
use Livewire\Component;

class Subscriptions extends Component
{
    public $displayMode;
    public $selectedSub;

    public function toSubs()
    {
        $this->displayMode = 'subscriptions';
    }

    public function toPayment()
    {
        if ($this->selectedSub) {
            $this->displayMode = 'payment';
        }
    }

    public function selectSub($subscription)
    {
        $this->selectedSub = $subscription;
    }

    public function mount()
    {
        $this->displayMode = 'subscriptions';
    }

    public function render()
    {
        $subscriptions = Subscription::all();
        return view('livewire.subscriptions', compact('subscriptions'));
    }
}
