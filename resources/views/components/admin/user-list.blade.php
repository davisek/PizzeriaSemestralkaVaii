@props(['user'])
<div class="row pizzaRow p-1">
    <div class="col-lg-3">
        <p>{{$user->name}}</p>
    </div>
    <div class="col-lg-3">
        <p>{{$user->surname}}</p>
    </div>
    <div class="col-lg-2">
        <p>{{$user->email}}</p>
    </div>
    <div class="col-lg-2">
        <p>{{$user->role->name}}</p>
    </div>
    <div class="col-xl col-6 text-center mt-2">
        @if((auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'manager') && $user->role->name != 'admin'))
            @if(auth()->user()->role->name == 'admin' || (auth()->user()->role->name == 'manager' && $user->role->name != 'manager'))
            <button class="btn btn-danger p-1" data-toggle="modal" data-target="#deleteUser"
                    data-user-delete-id="{{$user->id}}"
                    data-user-delete-name="{{$user->name. ' ' . $user->surname}}">
                Odstrániť
            </button>
            @endif
        @endif
    </div>
</div>
