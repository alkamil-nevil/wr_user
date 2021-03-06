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
                <div class="card-header">{{ __('Update User') }}</div>

                <div class="card-body">
                        <form method="POST" action="{{ route('userupdateaction') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$users->id}}" />
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$users->name}}" required autocomplete="name" autofocus>
                                 {{Session::get('message') ? (isset(json_decode(Session::get('message'),true)['name']) ?  json_decode(Session::get('message'),true)['name'][0]: '') : ''}}
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" disabled value="{{$users->email}}" required autocomplete="email">
                                {{Session::get('message') ? (isset(json_decode(Session::get('message'),true)['email']) ?  json_decode(Session::get('message'),true)['email'][0]: '') : ''}}
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Select Role') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="role_id">
                                     @foreach($user_roles as $role)
                                      @if($users->role_id == $role->id)
                                       <option selected value="{{$role->id}}">{{$role->name}}</option>
                                      @else
                                       <option  value="{{$role->id}}">{{$role->name}}</option>
                                      @endif 
                                     @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
