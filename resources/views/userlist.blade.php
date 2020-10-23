@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                   <ul>
                        @foreach($menu_list as $menu)
                            <li draggable='true'>
                                <a href="{{URL::to($menu['route'])}}">{{$menu['name']}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users List') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead><th>ID</th><th>Name</th><th>Role</th><th></th><th></th></thead><tbody>
                    @foreach($users as $user)
                       <tr><td>{{$user->id}}</td><td>{{$user->name}}</td><td>{{$user->role}}</td><td><a href="{{URL::to('/useredit/')}}/{{$user->id}}">Edit</a></td><td><a href="{{URL::to('/userdelete/')}}/{{$user->id}}">Delete</a></td></tr>     
                    @endforeach
                     </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
