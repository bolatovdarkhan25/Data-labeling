<div class="container my-4" x-data="{'selectedFiles': @entangle('selectedFiles'), 'labelingFile': @entangle('labelingFile')}">
    <livewire:choose-label-type-modal></livewire:choose-label-type-modal>
    @if($audioFiles->count())
        <h2>Audio files that you uploaded</h2>
        <ul class="list-group">
            @foreach($audioFiles as $audioFile)
                <li class="list-group-item d-flex justify-content-between @if ($labelingFile && $labelingFile['id'] === $audioFile->id) list-group-item-primary @else list-group-item-success @endif">
                    <p class="m-0">{{$audioFile->name}}</p>
                    @if (!$labelingFile)
                        <em class="fa fa-lg fa-pencil text-primary"
                            style="margin-top: 6px; cursor: pointer"
                            wire:click.prevent="label({{$audioFile->id}})"
                            title="Edit">
                        </em>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
    <form x-show="!labelingFile" class="mt-4">
        <div class="form-group text-center">
            <h1>Upload a file you want to label</h1>
            <input type="file"
                   wire:model="selectedFiles"
                   multiple
                   accept="audio/mp3,audio/wav,audio/m4a,audio/mpa">
            <br>
            @error('selectedFiles') <span class="error text-danger">{{ $message }}</span> @enderror
            @error('selectedFiles.*') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        @if ($selectedFiles)
            <div class="text-center">
                <button class="btn btn-primary mt-4 w-25" wire:click.prevent="upload">Save</button>
            </div>
        @endif
    </form>
        <div class="mt-4" id="waveform"></div>
        <div id="waveform-timeline"></div>
        @if ($labelingFile)
            <div class="mt-5 text-center d-flex justify-content-center" x-data="{'play': play}">
                <button class="btn btn-primary player-button">
                    <em class="fa fa-pause" id="pause"></em>
                    <em class="fa fa-play" id="play"></em>
                    Play\Pause
                </button>
                <button class="btn btn-danger ml-3" wire:click.prevent="cancelLabeling">Cancel</button>
            </div>

            @if($labelingType === 'sound')

            @elseif($labelingType === 'author')
            @elseif($labelingType === 'text')
            @endif
        @endif
    <script>
        let fileIsLabeling = !!'{!! $labelingFile !!}';

        let play = false;

        if (fileIsLabeling) {
            let lw = new Livewire();

            let waveform = WaveSurfer.create({
                container: '#waveform',
                waveColor: 'violet',
                progressColor: 'purple',
                backend: 'MediaElement',
                plugins: [
                    WaveSurfer.timeline.create({
                        container: "#waveform-timeline",
                        timeInterval: 0.2
                    }),
                    WaveSurfer.regions.create({
                        regionsMinLength: 0.5,
                        dragSelection: {
                            slop: 5
                        }
                    })
                ]
            });

            let file = Object({!! $labelingFile !!});
            let path = file.path;

            document.getElementById('play').style.display = 'inline-block';
            document.getElementById('pause').style.display = 'none';

            waveform.load(path);

            waveform.on('ready', function () {
                // waveform.enableDragSelection({});
                // waveform.addRegion({
                //     start: 5, // time in seconds
                //     end: 8, // time in seconds
                //     color: 'hsla(100, 100%, 30%, 0.1)'
                // });
                $('.player-button').on('click', function () {
                    play = !play;
                    waveform.playPause();

                    if (play === true) {
                        document.getElementById('play').style.display = 'none';
                        document.getElementById('pause').style.display = 'inline-block';
                    } else {
                        document.getElementById('pause').style.display = 'none';
                        document.getElementById('play').style.display = 'inline-block';
                    }
                });
            });

            waveform.on('region-created', function (region) {
                let newRegion = {};
                newRegion.start = region.start;

                console.log(region.start);
                // console.log(newRegion);
                // lw.emit('addRegion', newRegion);
            });
        }
    </script>
</div>

