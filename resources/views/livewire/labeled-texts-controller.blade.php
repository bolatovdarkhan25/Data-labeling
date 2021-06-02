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
                <th>Author</th>
                <th>Text</th>
                <th>Created at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($texts as $text)
                <tr>
                    <td>{{$text->id}}</td>
                    <td>{{$text->audioFile->id}}</td>
                    <td>{{$text->start}}</td>
                    <td>{{$text->end}}</td>
                    <td>{{$text->author}}</td>
                    <td>{{$text->text}}</td>
                    <td>{{$text->created_at}}</td>
                    <td>
                        <div>
                            <em wire:click.prevent="deleteObject({{$text->id}})" class="fa fa-trash color-red"></em>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
