<?php

namespace App\Http\Livewire;

use App\Models\AudioFile;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Models\UserSubscription;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Subscriptions extends Component
{
    public $clientIp;
    public $displayMode;
    public $selectedSub;
    protected $listeners = [
        'bankCardFormFilled' => 'pay'
    ];

    public function mount(Request $request)
    {
        $this->displayMode = 'subscriptions';
        $this->clientIp = $request->ip();
    }

    public function pay($data)
    {
        $name = $data['name'];
        $cryptogram = $data['cryptogram'];
        $price = (double) $this->selectedSub['price'];

        $client = new Client([
            'timeout' => '3.0'
        ]);

        $response = $client->post('https://api.cloudpayments.ru/payments/cards/charge', [
            'auth' => [
                env('CLOUDPAYMENTS_PUBLIC'),
                env('CLOUDPAYMENTS_API_KEY')
            ],
            'form_params' => [
                'Amount' => $price,
                'Currency' => 'KZT',
                'IpAddress' => $this->clientIp,
                'Name' => $name,
                'CardCryptogramPacket' => $cryptogram,
            ]
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        Transaction::create([
            'user_id' => Auth::id(),
            'type' => 'buy-subscription',
            'amount' => $price,
            'status' => $response['Success'],
            'transaction_id' => $response['Model']['TransactionId']
        ]);

        $subscriptionDuration = 0;

        if ($this->selectedSub['name'] === 'For one month') {
            $subscriptionDuration = 30;
        } elseif ($this->selectedSub['name'] === 'For three months') {
            $subscriptionDuration = 90;
        } elseif ($this->selectedSub['name'] === 'For six months') {
            $subscriptionDuration = 180;
        }

        $userSubscription = UserSubscription::where('user_id', Auth::id())->first();

        if ($userSubscription) {
            $userSubscription->update([
                'subscription_id' => $this->selectedSub['id'],
                'expiration_date' => Carbon::make($userSubscription->expiration_date)->addDays($subscriptionDuration)
            ]);
        } else {
            UserSubscription::create([
                'user_id' => Auth::id(),
                'subscription_id' => $this->selectedSub['id'],
                'expiration_date' => Carbon::now()->addDays($subscriptionDuration)
            ]);
        }

        $this->emit('subscribed');
    }

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

    public function toCardForm()
    {
        $this->emit('openBankCardFormModal');
    }

    public function selectSub($subscription)
    {
        $this->selectedSub = $subscription;
    }

    public function render()
    {
        $subscriptions = Subscription::all();
        return view('livewire.subscriptions', compact('subscriptions'));
    }
}
