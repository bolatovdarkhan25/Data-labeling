<div>
    @if ($displayModal)
        <div class="modal" tabindex="-1" role="dialog" style="display: block; background-color: rgba(0,0,0,0.4);">
            <div class="modal-dialog" role="document" style="top: 50px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Subscription update</h5>
                        <button type="button" class="close" wire:click.prevent="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Name</label>
                                <input wire:model="name" class="form-control">
                                @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" wire:model="price" class="form-control">
                                @error('price') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <h5>Choose gradient</h5>
                            <div class="sub-card gradient1 @if ($class === 'gradient1') sub-card-active @endif"
                                 style="margin-top: 10px" wire:click.prevent="chooseClass('gradient1')"></div>
                            <div class="sub-card gradient2 @if ($class === 'gradient2') sub-card-active @endif"
                                 style="margin-top: 10px" wire:click.prevent="chooseClass('gradient2')"></div>
                            <div class="sub-card gradient3 @if ($class === 'gradient3') sub-card-active @endif"
                                 style="margin-top: 10px" wire:click.prevent="chooseClass('gradient3')"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click.prevent="update">Confirm</button>
                        <button type="button" class="btn btn-secondary" wire:click.prevent="close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
