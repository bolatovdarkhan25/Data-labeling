<div class="d-flex justify-content-center">
    <div class="mt-5 text-center border pb-5" style="width: 650px; border-radius: 15px"
         x-data="{displayMode: @entangle('displayMode'), selectedSub: @entangle('selectedSub')}">
        <div class="d-flex justify-content-between mb-4" style="height: 40px;">
            <div class="w-50 text-center border-bottom border-right font-weight-bold subs-tab"
                 :class="{'subs-tab-active': displayMode === 'subscriptions'}"
                 style="border-top-left-radius: 14px"
                 wire:click.prevent="toSubs">
                Subscriptions
            </div>
            <div class="w-50 text-center border-bottom font-weight-bold subs-tab"
                 :class="{'subs-tab-active': displayMode === 'payment', 'disabled-sub': !selectedSub}"
                 style="border-top-right-radius: 14px"
                 wire:click.prevent="toPayment">
                Payment
            </div>
        </div>
        <div x-show="displayMode === 'subscriptions'">
            <h1 style="color: rgba(70,133,255,0.91)">
                Choose the subscription you need
            </h1>
            @foreach($subscriptions as $subscription)
                <div class="ml-auto mr-auto mt-4 sub-card {{$subscription->class}}
                    @if($selectedSub && $selectedSub['id'] === $subscription->id) sub-card-active @endif"
                     wire:click.prevent="selectSub({{$subscription}})">
                    <div class="d-flex justify-content-between sub-card-in">
                        <h3>{{$subscription->name}}</h3>
                        <h3 class="font-weight-bold">{{$subscription->price}} ₸</h3>
                    </div>
                </div>
            @endforeach

            <button class="mt-5 btn btn-success" style="height: 50px; width: 200px" wire:click.prevent="toPayment">
                Continue
            </button>
        </div>
        @if($selectedSub)
            <div x-show="displayMode === 'payment'">
                <h1 style="color: rgba(70,133,255,0.91)">
                    Selected subscription
                </h1>
                <div class="ml-auto mr-auto mt-4 sub-card {{$selectedSub['class']}} disabled-sub">
                    <div class="d-flex justify-content-between sub-card-in">
                        <h3>{{$selectedSub['name']}}</h3>
                        <h3 class="font-weight-bold">{{$selectedSub['price']}} ₸</h3>
                    </div>
                </div>
                <div class="mt-5 d-flex justify-content-between" style="padding-left: 15%; padding-right: 15%">
                    <button class="btn btn-secondary" style="height: 50px; width: 200px" wire:click.prevent="toSubs">
                        Back
                    </button>
                    <button class="btn btn-primary" style="height: 50px; width: 200px" wire:click.prevent="toPayment">
                        Continue
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
