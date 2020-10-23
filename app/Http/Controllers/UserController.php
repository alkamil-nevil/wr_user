<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect;

use App\Models\User;
use App\Models\UserRole;
use Auth;

class UserController extends Controller
{
    function profile(){
    	$user = Auth::user();
    	$userRoleId = Auth::user()->role_id;
    	$userRoles  = DB::table('user_module_access')->join('user_modules', 'user_modules.id', 
            '=', 'user_module_access.user_module_id')->where('user_module_access.user_role_id', $userRoleId)->select('*')->get();
        $modules = $userRoles->toArray();
        foreach ($modules as $key => $value) {
            if($value->show == 0) {
                unset($modules[$key]);
            }
        }

        $users  = DB::table('users')->join('user_roles', 'users.role_id', 
            '=', 'user_roles.id')->where('users.id', $user->id)->select('users.id', 'users.name', 'users.email','user_roles.name as role')->get();
        $user = $users->toArray();
        $user = $user[0];
    	$menu_list = [];
    	foreach ($modules as $key => $value) {
    		$menu_list[] = array('name' => $value->name,'route' => $value->route);
    	}
    	return view('userprofile', compact('menu_list','user'));
    }

    function admin() {
    	$modules = \Request::get('modules');
    	$menu_list = [];
    	foreach ($modules as $key => $value) {
    		$menu_list[] = array('name' => $value->name,'route' => $value->route);
    	}
    	return view('userhome', compact('menu_list'));
    }

    function users() {
    	$modules = \Request::get('modules');
    	$menu_list = [];
    	$users  = DB::table('users')->join('user_roles', 'users.role_id', 
            '=', 'user_roles.id')->select('users.id', 'users.name', 'user_roles.name as role')->get();
    	$users = $users->toArray();
    	foreach ($modules as $key => $value) {
    		$menu_list[] = array('name' => $value->name,'route' => $value->route);
    	}
    	return view('userlist', compact('menu_list','users'));
    }

    function adduser() {
    	$modules = \Request::get('modules');
    	$menu_list = [];
    	$user_roles  = DB::table('user_roles')->select('*')->get();
    	$user_roles = $user_roles->toArray();
    	foreach ($modules as $key => $value) {
    		$menu_list[] = array('name' => $value->name,'route' => $value->route);
    	}
    	return view('createuser', compact('menu_list','user_roles'));    	
    }

    function createuser(Request $request) {
    	$data = $request->all();
    	$rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
		    return Redirect::route('adduser')->with( array('message' => $validator->messages()) );
		} else {		    
	        User::create([
	            'name' => $data['name'],
	            'email' => $data['email'],
	            'password' => Hash::make($data['password']),
	            'role_id' => $data['role_id']
	        ]);
            return Redirect::route('users');
		}
    }

    function createrole() {
    	$modules = \Request::get('modules');
    	$menu_list = [];
    	$user_roles  = DB::table('user_roles')->select('*')->get();
    	$userModules  = DB::table('user_modules')->select('*')->get();
    	$user_roles = $user_roles->toArray();$user_modules = $userModules->toArray();
    	foreach ($modules as $key => $value) {
    		$menu_list[] = array('name' => $value->name,'route' => $value->route);
    	}
    	return view('createrole', compact('menu_list','user_roles','user_modules'));  
    }

    function addrole(Request $request) {
  		$data = $request->all();
    	$rules = [
            'name' => ['required', 'string', 'max:255']
        ];

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
		    return Redirect::route('createrole')->with( array('message' => 'please check role name') );
		} else {	
			$modules = $data['modules'];
			$udata = UserRole::create([
	            'name' => $data['name']
	        ]);

	        $role_data = $udata->toArray();
	        $role_id = $role_data['id'];
			foreach ($modules as $value) {
				DB::table('user_module_access')->insert(['user_role_id' => $role_id, 'user_module_id' => $value]);
			}
			
	        return Redirect::route('createrole');
		}  	
    }

    function updaterole($id) {
    	$modules = \Request::get('modules');
    	$menu_list = [];
    	$user_roles  = DB::table('user_roles')->select('*')->get();
    	$userModules  = DB::table('user_modules')->select('*')->get();
    	$user_role_modules  = DB::table('user_roles')->join('user_module_access', 'user_module_access.user_role_id', 
            '=', 'user_roles.id')->where('user_module_access.user_role_id', $id)->select('user_module_access.*','user_roles.name as role')->get();
    	$user_role_modules= $user_role_modules->toArray();
    	$user_access = array();
    	$role_name = '';
    	foreach ($user_role_modules as $value) {
    		array_push($user_access, $value->user_module_id);
    		$role_name = $value->role;
    	}
    	$user_roles = $user_roles->toArray();$user_modules = $userModules->toArray();
    	foreach ($modules as $key => $value) {
    		$menu_list[] = array('name' => $value->name,'route' => $value->route);
    	}
    	return view('updaterole', compact('menu_list','user_roles','user_modules','user_access','role_name','id'));  
    }

    function updateroleaction(Request $request) {
    	$data = $request->all();
    	$rules = [
            'id' => ['required', 'int']
        ];

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
		    return Redirect::route('createrole')->with( array('message' => 'please check fields') );
		} else {	
			$modules = $data['modules'];
			$role_id = $data['id'];			
	        DB::table('user_module_access')->where('user_role_id', '=', $role_id)->delete();
			foreach ($modules as $value) {
				DB::table('user_module_access')->insert(['user_role_id' => $role_id, 'user_module_id' => $value]);
			}
			
	        return Redirect::route('createrole');
		}  	
    }

    function userdelete($id) {
        DB::table('users')->where('id', $id)->delete();
        return Redirect::route('users');
    }

    function useredit($id) {
        $modules = \Request::get('modules');
        $menu_list = [];
        $users  = DB::table('users')->join('user_roles', 'users.role_id', 
            '=', 'user_roles.id')->where('users.id', $id)->select('users.id', 'users.role_id','users.email' ,'users.name', 'user_roles.name as role')->get();
        $users = $users->toArray();
        if(isset($users[0])) {
            $users = $users[0];
        }

        $user_roles  = DB::table('user_roles')->select('*')->get();
        foreach ($modules as $key => $value) {
            $menu_list[] = array('name' => $value->name,'route' => $value->route);
        }
        return view('updateuser', compact('menu_list','users','user_roles'));
    }

    function userupdateaction(Request $request) {
        $data = $request->all();
        $rules = [
            'id' => ['required', 'int'],
            'name' => ['required', 'string'],
            'role_id' => ['required', 'int']
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::route('users')->with( array('message' => 'please check fields') );
        } else {   
            $role_id = $data['role_id'];   
            $id = $data['id']; 
            $name = $data['name'];
            DB::table('users')
                ->where('id', $id)
                ->update(['name' => $name,'role_id' => $role_id]);
            
            return Redirect::route('users');
        }          
    }

}
