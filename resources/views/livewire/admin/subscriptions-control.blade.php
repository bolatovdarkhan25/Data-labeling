<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <livewire:admin.subscription-update-modal></livewire:admin.subscription-update-modal>
    @include('layouts.breadcrumb')

    @foreach($subscriptions as $subscription)
        <div style="display: flex">
            <div class="sub-card {{$subscription->class}}" wire:click.prevent="updateSubscription('{{$subscription->id}}')"
                 style="margin-bottom: 10px">
                <div class="sub-card-in" style="display: flex; justify-content: space-between">
                    <h3 style="color: white">{{$subscription->name}}</h3>
                    <h3 style="color: white" class="font-weight-bold">{{$subscription->price}} ₸</h3>
                </div>
            </div>
            <button wire:click.prevent="deleteSubscription('{{$subscription->id}}')"
                    class="btn btn-danger" style="height: 40px; margin-top: 30px; margin-left: 20px">
                <em class="fa fa-trash"></em>
            </button>
        </div>
    @endforeach

    <h3 style="margin-top: 40px">Add subscription</h3>
    <form style="width: 25%; margin-top: 20px">
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" wire:model="name" style="height: 30px">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" type="number" wire:model="price" style="height: 30px">
        </div>
        <h5>Choose gradient</h5>
        <div class="sub-card gradient1 @if ($class === 'gradient1') sub-card-active @endif"
             style="margin-top: 10px" wire:click.prevent="chooseClass('gradient1')"></div>
        <div class="sub-card gradient2 @if ($class === 'gradient2') sub-card-active @endif"
             style="margin-top: 10px" wire:click.prevent="chooseClass('gradient2')"></div>
        <div class="sub-card gradient3 @if ($class === 'gradient3') sub-card-active @endif"
             style="margin-top: 10px" wire:click.prevent="chooseClass('gradient3')"></div>
    </form>

    <button class="btn btn-primary" style="margin-top: 20px" wire:click.prevent="store">Create</button>
</div>
