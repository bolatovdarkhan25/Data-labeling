<div>
    @if($displayModal)
        <div class="modal" tabindex="-1" role="dialog" style="display: block; background-color: rgba(0,0,0,0.4);">
            <div class="modal-dialog" role="document" style="top: 100px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile update</h5>
                        <button type="button" class="close" wire:click.prevent="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Full name</label>
                                <input wire:model="name" class="form-control" placeholder="Ivanov Ivan">
                                @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input wire:model="email" class="form-control" placeholder="emaiL@example.com">
                                @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
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
