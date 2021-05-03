<div>
    <div class="container d-flex justify-content-center">
        <div class="card w-50 h-50 mt-5" style="">
            <img src="{{asset('user.png')}}" class="card-img-top h-75" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <ul class="font-weight-bold" style="list-style: none">
                        <li>Full name :</li>
                        <li>e-mail :</li>
                    </ul>
                    <ul style="color: grey; list-style: none">
                        <li>{{$user->name}}</li>
                        <li>{{$user->email}}</li>
                    </ul>
                    <button class="btn btn-primary ml-4 h-50 w-25">Edit</button>
                </div>
                <div class="mt-4 text-center">
                    <h1>Your subscription</h1>
                    @if ($user->subscription)
                    @else
                        <div>
                            <h5>You don't have any subscriptions!</h5>
                            <a class="btn btn-success">Buy</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
