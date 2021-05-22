<div>
    @if($displayModal)
        <div class="modal" tabindex="-1" role="dialog" style="display: block; background-color: rgba(0,0,0,0.4);">
            <div class="modal-dialog" role="document" style="top: 100px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Choose type of labeling</h5>
                        <button type="button" class="close" wire:click.prevent="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div wire:click="choose('sound')"
                             style="border: 1px solid whitesmoke; border-radius: 10px;
                             background-color: rgba(173,178,214,0.26);
                             cursor: pointer;
                             @if ($chosenType === 'sound') border-color: dodgerblue @endif"
                             class="text-center py-3">
                            <h3 style="color: deepskyblue">Sound labeling</h3>
                            <p class="m-0">Labeling only sounds, like knocking, sound of wind etc.</p>
                        </div>
                        <div wire:click="choose('author')"
                             style="border: 1px solid whitesmoke; border-radius: 10px;
                                 background-color: rgba(173,178,214,0.26);
                                 cursor: pointer;
                             @if ($chosenType === 'author') border-color: dodgerblue @endif"
                             class="text-center py-3 mt-2">
                            <h3 style="color: deepskyblue">Author labeling</h3>
                            <p class="m-0">Labeling only names of authors, who talked</p>
                        </div>
                        <div wire:click="choose('text')"
                             style="border: 1px solid whitesmoke; border-radius: 10px;
                                 background-color: rgba(173,178,214,0.26);
                                 cursor: pointer;
                             @if ($chosenType === 'text') border-color: dodgerblue @endif"
                             class="text-center py-3 mt-2">
                            <h3 style="color: deepskyblue">Text labeling</h3>
                            <p class="m-0">Labeling names of authors and their speech</p>
                        </div>
                        <div class="mt-3 text-center">
                            @error('chosenType') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click.prevent="save">Confirm</button>
                        <button type="button" class="btn btn-secondary" wire:click.prevent="close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
