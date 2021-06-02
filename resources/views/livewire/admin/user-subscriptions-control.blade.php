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
                <th>User ID</th>
                <th>Subscription ID</th>
                <th>Expiration date</th>
                <th>Created at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($usersSubscriptions as $usersSubscription)
                <tr>
                    <td>{{$usersSubscription->id}}</td>
                    <td>{{$usersSubscription->user_id}}</td>
                    <td>{{$usersSubscription->subscription_id}}</td>
                    <td>{{$usersSubscription->expiration_date}}</td>
                    <td>{{$usersSubscription->created_at}}</td>
                    <td>
                        <div>
                            <em wire:click.prevent="deleteObject({{$usersSubscription->id}})" class="fa fa-trash color-red"></em>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
