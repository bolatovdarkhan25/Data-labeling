<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <style>
        td > div > em {
            font-size: 1.5em !important;
        }
        td > div > em:hover {
            cursor: pointer;
        }
    </style>

    @include('layouts.breadcrumb')

    <div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Audio file id</th>
                <th>Start</th>
                <th>End</th>
                <th>Sound</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($sounds as $sound)
                <tr>
                    <td>{{$sound->id}}</td>
                    <td>{{$sound->audioFile->id}}</td>
                    <td>{{$sound->start}}</td>
                    <td>{{$sound->end}}</td>
                    <td>{{$sound->sound}}</td>
                    <td>
                        <div>
                            <em wire:click.prevent="deleteUser({{$sound->id}})" class="fa fa-trash color-red"></em>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
