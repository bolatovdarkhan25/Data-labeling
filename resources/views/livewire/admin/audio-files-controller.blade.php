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
        <div style="
                display: flex;
                padding: 5px 10px;
                justify-content: space-between;
                background-color: rgba(193,203,221,0.53);
                border-radius: 7px;
                height: 50px;
                margin-bottom: 10px;">
            <input class="form-control" wire:model="search" style="width: 200px; height: 40px" placeholder="Search">
        </div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Name</th>
                <th>User name</th>
                <th>Path</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($audioFiles as $file)
                <tr>
                    <td>{{$file->id}}</td>
                    <td>{{$file->name}}</td>
                    <td>{{$file->user->name}}</td>
                    <td>{{$file->path}}</td>
                    <td>
                        <div>
                            <em wire:click.prevent="deleteUser({{$file->id}})" class="fa fa-trash color-red"></em>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
