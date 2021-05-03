<div>
    @if($displayModal)
        <!-- Modal -->
        <div class="modal fade in" style="display: block; background-color: rgba(0,0,0,0.4);" role="dialog">
            <div class="modal-dialog" style="top: 100px">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" wire:click.prevent="close">&times;</button>
                        <h4 class="modal-title">Update user #{{$user->id}}</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Name</label>
                                <input wire:model="name" type="text" class="form-control" placeholder="Darkhan Bolatov">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input wire:model="email" type="email" class="form-control" placeholder="23769@iitu.edu.kz">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" wire:model="role">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button wire:click.prevent="confirmForm" type="button" class="btn btn-primary">Confirm</button>
                    </div>
                </div>

            </div>
        </div>
    @endif
</div>
