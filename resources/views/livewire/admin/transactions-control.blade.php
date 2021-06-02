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
                <th>Transaction ID</th>
                <th>User ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Status</th>
                <th>Created at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->transaction_id}}</td>
                    <td>{{$transaction->user_id}}</td>
                    <td>{{$transaction->type}}</td>
                    <td>{{$transaction->amount}}</td>
                    <td>KZT</td>
                    <td>Success</td>
                    <td>{{$transaction->created_at}}</td>
                    <td>
                        <div>
                            <em wire:click.prevent="deleteObject({{$transaction->id}})" class="fa fa-trash color-red"></em>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
