<div class="container my-4" x-data="{'selectedFile': @entangle('selectedFile')}">
    @if($audioFiles->count())
        <h2>Audio files that you uploaded</h2>
        <ul class="list-group">
            @foreach($audioFiles as $audioFile)
                <li class="list-group-item d-flex justify-content-between list-group-item-success">
                    <p class="m-0">{{$audioFile->name}}</p>
                    <em class="fa fa-lg fa-pencil text-primary" style="margin-top: 6px; cursor: pointer" title="Edit"></em>
                </li>
            @endforeach
        </ul>
    @endif
    <form class="mt-4">
        <div class="form-group text-center">
            <h1>Upload a file you want to label</h1>
            <input type="file" wire:model="selectedFile"
                   accept="audio/mp3,audio/wav,audio/m4a,audio/mpa">
            <br>
            @error('selectedFile') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="text-center">
            <button x-show="selectedFile" class="btn btn-primary mt-4 w-25" wire:click.prevent="upload">Save</button>
        </div>
    </form>
{{--    <div x-show="selectedFile" id="waveform"></div>--}}
    <script>
        // const waveform = WaveSurfer.create({
        //     container: '#waveform',
        //     waveColor: 'violet',
        //     progressColor: 'purple'
        // });
        // waveform.on('ready', function () {
        //     waveform.play();
        // });
        // waveform.load('example.mp3');
    </script>
</div>

