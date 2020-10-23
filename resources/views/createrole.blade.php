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
                <div class="card-header">{{ __('Create Role') }}</div>

                <div class="card-body">
                    <h5>Roles List</h5>
                    <table class="table">
                        <thead><th>ID</th><th>Name</th><th></th></thead><tbody>
                        @foreach($user_roles as $role)
                           <tr><td>{{$role->id}}</td><td>{{$role->name}}</td><td>
                            <a href="updaterole/{{$role->id}}" >Edit</a></td></tr>     
                        @endforeach
                         </tbody>
                    </table>
                    <h5>Add new Role</h5>
                        <form method="POST" action="{{ route('addrole') }}">
                        @csrf
                        <input type="hidden" name="id" id="id" value="0" />
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                 {{Session::get('message') ? (isset(json_decode(Session::get('message'),true)['name']) ?  json_decode(Session::get('message'),true)['name'][0]: '') : ''}}                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Select Modules') }}</label>

                            <div class="col-md-6">
                                 @foreach($user_modules as $module)
                                  <input id="modules" type="checkbox"  name="modules[]" value="{{$module->id}}"> {{$module->name}} <br>
                                 @endforeach
                                
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Role') }}
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
