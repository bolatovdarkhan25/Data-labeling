<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <livewire:admin.user-update-modal></livewire:admin.user-update-modal>
    <livewire:admin.user-create-modal></livewire:admin.user-create-modal>
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
            <button class="btn btn-primary" wire:click.prevent="openCreateModal" style="width: 100px">Create</button>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="bg-blue">
                    <th>ID</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Audio files</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->audioFiles->count()}}</td>
                        <td>
                            <div>
                                <em class="fa fa-pencil color-blue"
                                    style="margin-right: 20%; margin-left: 20%;"
                                    wire:click.prevent="openUpdateModal({{$u->id}})">
                                </em>
                                <em wire:click.prevent="deleteUser({{$u->id}})" class="fa fa-trash color-red"></em>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
