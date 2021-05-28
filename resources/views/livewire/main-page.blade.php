<div class="container my-4" x-data="{'selectedFiles': @entangle('selectedFiles'), 'labelingFile': @entangle('labelingFile')}">
    <livewire:choose-label-type-modal></livewire:choose-label-type-modal>
    @if($audioFiles->count())
        <h2>Audio files that you uploaded</h2>
        <ul class="list-group">
            @foreach($audioFiles as $audioFile)
                <li class="list-group-item d-flex justify-content-between @if ($labelingFile && $labelingFile['id'] === $audioFile->id) list-group-item-primary @else list-group-item-success @endif">
                    <p class="m-0">{{$audioFile->name}}</p>
                    <div class="d-flex justify-content-end">
                        @if (!$labelingFile)
                            <em class="fa fa-lg fa-pencil text-primary"
                                style="margin-top: 6px; cursor: pointer"
                                wire:click.prevent="label({{$audioFile->id}})"
                                title="Edit">
                            </em>
                        @endif
                        @if (count($audioFile->sounds))
                            <button class="fa fa-lg fa-music text-primary ml-1 cursor-pointer border-0"
                                style="margin-top: 2px;"
                                wire:click.prevent="downloadSounds({{$audioFile->id}})"
                                wire:loading.class="cursor-disabled"
                                wire:loading.class.remove="cursor-pointer"
                                wire:loading.attr="disabled"
                                title="Download sound">
                            </button>
                        @endif
                        @if (count($audioFile->authors))
                            <button class="fa fa-lg fa-user text-primary ml-2 cursor-pointer border-0"
                                    style="margin-top: 2px;"
                                    wire:click.prevent="downloadAuthors({{$audioFile->id}})"
                                    wire:loading.class="cursor-disabled"
                                    wire:loading.class.remove="cursor-pointer"
                                    wire:loading.attr="disabled"
                                    title="Download sound">
                            </button>
                        @endif
                        @if (count($audioFile->texts))
                            <button class="fa fa-lg fa-comment text-primary ml-2 cursor-pointer border-0"
                                    style="margin-top: -1px;"
                                    wire:click.prevent="downloadTexts({{$audioFile->id}})"
                                    wire:loading.class="cursor-disabled"
                                    wire:loading.class.remove="cursor-pointer"
                                    wire:loading.attr="disabled"
                                    title="Download sound">
                            </button>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
    <div wire:loading>
        Loading...
    </div>
    <form x-show="!labelingFile" class="mt-4">
        <div class="form-group text-center">
            <h1>Upload a file you want to label</h1>
            <input type="file"
                   wire:model="selectedFiles"
                   multiple
                   accept="audio/mp3,audio/wav">
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

            <div id="status"></div>
            @if($labelingType === 'sound')
                <div id="sound"></div>
            @elseif($labelingType === 'author')
                <div id="author"></div>
            @elseif($labelingType === 'text')
                <div id="text"></div>
            @endif
        @endif
    <script type="text/javascript">
        let fileIsLabeling = !!'{!! $labelingFile !!}';

        let play = false;

        let regions = [];

        if (fileIsLabeling) {

            let waveform = WaveSurfer.create({
                container: '#waveform',
                waveColor: 'violet',
                progressColor: 'purple',
                backend: 'MediaElement',
                plugins: [
                    WaveSurfer.regions.create({
                        regionsMinLength: 0.5,
                        dragSelection: {
                            slop: 5
                        }
                    }),
                    WaveSurfer.timeline.create({
                        container: '#waveform-timeline',
                        timeInterval: 0.2
                    })
                ],
            });

            let file = Object({!! $labelingFile !!});
            let path = file.path;
            let labelingType = '{!! $labelingType !!}';

            document.getElementById('play').style.display = 'inline-block';
            document.getElementById('pause').style.display = 'none';

            waveform.load(path);

            waveform.on('ready', function () {
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

            waveform.on('region-update-end', function (region) {
                let exists = regions.find(v => v.id === region.id);

                if (!exists) {
                    if (labelingType === 'sound') {
                        region.sound = '';

                        regions.push(region);

                        let div = document.getElementById('sound');

                        let html = '';

                        regions.forEach(function (reg, index) {
                            html +=
                                '<h3 class="mt-5">Sound #' + (index + 1) + '</h3>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>Start</label>' +
                                    '<input disabled id="start-' + reg.id + '" class="form-control" value="' + reg.start + '"' +
                                '</div>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>End</label>' +
                                    '<input disabled id="end-' + reg.id + '" class="form-control" value="' + reg.end + '"' +
                                '</div>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>Sound</label>' +
                                    '<input id="sound-' + reg.id + '" class="form-control" value="' + reg.sound + '"' +
                                '</div>';
                        });

                        html += '<button id="save-sound" class="mt-3 btn btn-success">Save</button>';

                        div.innerHTML = html;

                        regions.forEach(function (reg, index) {
                            document.querySelector('#sound-' + reg.id).addEventListener('input', function (e) {
                                regions[index].sound = e.target.value;
                            });
                        });

                        document.querySelector('#save-sound').addEventListener('click', function (e) {
                            $('#save-sound').prop('disabled', true);


                            let data = {audio_file_id: file.id};
                            let sendRegions = [];

                            regions.forEach(function (region) {
                                sendRegions.push({
                                    start: region.start,
                                    end: region.end,
                                    sound: region.sound
                                });
                            });

                            data.regions = sendRegions;
                            data._token = "{{ csrf_token() }}";

                            $.ajax('/save-sounds', {
                                type: 'POST',
                                data: data,
                                success: function (data) {
                                    let statusBlock = $('#status');
                                    statusBlock.removeClass('alert alert-danger');
                                    statusBlock.addClass('mt-3 alert alert-success');
                                    statusBlock.text(data.message);

                                    setTimeout(function () {
                                        let lw = new Livewire();
                                        lw.emit('refresh');
                                    }, 500);
                                },
                                error: function (jqXhr) {
                                    let errors = jqXhr.responseJSON.errors;
                                    let keys = Object.keys(errors);

                                    keys.forEach(function (key) {
                                        errors[key].forEach(function (error) {
                                            let statusBlock = $('#status');
                                            statusBlock.removeClass('alert alert-success');
                                            statusBlock.addClass('mt-3 alert alert-danger');
                                            statusBlock.text(error);
                                        });
                                    });

                                    $('#save-sound').prop('disabled', false);
                                }
                            });
                        });

                    } else if (labelingType === 'author') {
                        region.author = '';

                        regions.push(region);

                        let div = document.getElementById('author');

                        let html = '';

                        regions.forEach(function (reg, index) {
                            html +=
                                '<h3 class="mt-5">Author #' + (index + 1) + '</h3>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>Start</label>' +
                                    '<input disabled id="start-' + reg.id + '" class="form-control" value="' + reg.start + '"' +
                                '</div>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>End</label>' +
                                    '<input disabled id="end-' + reg.id + '" class="form-control" value="' + reg.end + '"' +
                                '</div>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>Author</label>' +
                                    '<input id="author-' + reg.id + '" class="form-control" value="' + reg.author + '"' +
                                '</div>';
                        });

                        html += '<button id="save-author" class="mt-3 btn btn-success">Save</button>';

                        div.innerHTML = html;

                        regions.forEach(function (reg, index) {
                            document.querySelector('#author-' + reg.id).addEventListener('input', function (e) {
                                regions[index].author = e.target.value;
                            });
                        });

                        document.querySelector('#save-author').addEventListener('click', function (e) {
                            $('#save-author').prop('disabled', true);


                            let data = {audio_file_id: file.id};
                            let sendRegions = [];

                            regions.forEach(function (region) {
                                sendRegions.push({
                                    start: region.start,
                                    end: region.end,
                                    author: region.author
                                });
                            });

                            data.regions = sendRegions;
                            data._token = "{{ csrf_token() }}";

                            $.ajax('/save-authors', {
                                type: 'POST',
                                data: data,
                                success: function (data) {
                                    let statusBlock = $('#status');
                                    statusBlock.removeClass('alert alert-danger');
                                    statusBlock.addClass('mt-3 alert alert-success');
                                    statusBlock.text(data.message);

                                    setTimeout(function () {
                                        let lw = new Livewire();
                                        lw.emit('refresh');
                                    }, 500);
                                },
                                error: function (jqXhr) {
                                    $('#save-author').prop('disabled', false);

                                    let errors = jqXhr.responseJSON.errors;
                                    let keys = Object.keys(errors);

                                    keys.forEach(function (key) {
                                        errors[key].forEach(function (error) {
                                            let statusBlock = $('#status');
                                            statusBlock.removeClass('alert alert-success');
                                            statusBlock.addClass('mt-3 alert alert-danger');
                                            statusBlock.text(error);
                                        });
                                    });
                                }
                            });
                        });
                    } else if (labelingType === 'text') {
                        region.author = '';
                        region.text = '';

                        regions.push(region);

                        let div = document.getElementById('text');

                        let html = '';

                        regions.forEach(function (reg, index) {
                            html +=
                                '<h3 class="mt-5">Text #' + (index + 1) + '</h3>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>Start</label>' +
                                    '<input disabled id="start-' + reg.id + '" class="form-control" value="' + reg.start + '"' +
                                '</div>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>End</label>' +
                                    '<input disabled id="end-' + reg.id + '" class="form-control" value="' + reg.end + '"' +
                                '</div>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>Author</label>' +
                                    '<input id="author-' + reg.id + '" class="form-control" value="' + reg.author + '"' +
                                '</div>' +
                                '<div class="mt-3 form-group">' +
                                    '<label>Text</label>' +
                                    '<input id="text-' + reg.id + '" class="form-control" value="' + reg.text + '"' +
                                '</div>';
                        });

                        html += '<button id="save-text" class="mt-3 btn btn-success">Save</button>'

                        div.innerHTML = html;

                        regions.forEach(function (reg, index) {
                            document.querySelector('#author-' + reg.id).addEventListener('input', function (e) {
                                regions[index].author = e.target.value;
                            });

                            document.querySelector('#text-' + reg.id).addEventListener('input', function (e) {
                                regions[index].text = e.target.value;
                            });
                        });

                        document.querySelector('#save-text').addEventListener('click', function (e) {
                            $('#save-text').prop('disabled', true);


                            let data = {audio_file_id: file.id};
                            let sendRegions = [];

                            regions.forEach(function (region) {
                                sendRegions.push({
                                    start: region.start,
                                    end: region.end,
                                    author: region.author,
                                    text: region.text
                                });
                            });

                            data.regions = sendRegions;
                            data._token = "{{ csrf_token() }}";

                            $.ajax('/save-texts', {
                                type: 'POST',
                                data: data,
                                success: function (data) {
                                    let statusBlock = $('#status');
                                    statusBlock.removeClass('alert alert-danger');
                                    statusBlock.addClass('mt-3 alert alert-success');
                                    statusBlock.text(data.message);

                                    setTimeout(function () {
                                        let lw = new Livewire();
                                        lw.emit('refresh');
                                    }, 500);
                                },
                                error: function (jqXhr) {
                                    $('#save-text').prop('disabled', false);

                                    let errors = jqXhr.responseJSON.errors;
                                    let keys = Object.keys(errors);

                                    keys.forEach(function (key) {
                                        errors[key].forEach(function (error) {
                                            let statusBlock = $('#status');
                                            statusBlock.removeClass('alert alert-success');
                                            statusBlock.addClass('mt-3 alert alert-danger');
                                            statusBlock.text(error);
                                        });
                                    });
                                }
                            });
                        });
                    }
                } else {
                    let start = $('#start-' + region.id);
                    start.val(region.start);
                    let end = $('#end-' + region.id);
                    end.val(region.end)
                }
            });
        }
    </script>
</div>

