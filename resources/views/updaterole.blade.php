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
                <div class="card-header">{{ __('Update Role') }}</div>

                <div class="card-body">
                        <form method="POST" action="{{ route('updateroleaction') }}">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$id}}" />
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$role_name }}" required autocomplete="name" autofocus>
                                 {{Session::get('message') ? (isset(json_decode(Session::get('message'),true)['name']) ?  json_decode(Session::get('message'),true)['name'][0]: '') : ''}}                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Select Modules') }}</label>

                            <div class="col-md-6">
                                 @foreach($user_modules as $module)
                                   @if(in_array($module->id, $user_access))
                                    <input id="modules" type="checkbox" checked  name="modules[]" value="{{$module->id}}"> {{$module->name}} <br>
                                  @else
                                    <input id="modules" type="checkbox"  name="modules[]" value="{{$module->id}}"> {{$module->name}} <br>       
                                  @endif                                  
                                 @endforeach
                                
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Role') }}
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
