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
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                   <table class="table">
                       <tr>
                        <td>Name</td>
                        <td>{{$user->name}}</td>
                       </tr>
                       <tr>
                        <td>Email</td>
                        <td>{{$user->email}}</td>
                       </tr>
                       <tr>
                        <td>Role</td>
                        <td>{{$user->role}}</td>
                       </tr>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
