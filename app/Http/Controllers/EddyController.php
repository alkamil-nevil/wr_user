<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect;

use App\Models\Eddy;
use Auth;

class EddyController extends Controller
{

    public function index()
    {
        $eddy = Eddy::all();
        return response()->json($eddy, 201);
    }

    public function show(Eddy $eddy)
    {
        return $eddy;
    }

    public function store(Request $request)
    {
        $eddy = Eddy::create($request->all());

        return response()->json($eddy, 201);
    }

    public function update(Request $request, $id)
    {
        $eddys = Eddy::find($id);
        $eddys->name = $request['name'];
        $eddys->age  = $request['age'];
        $eddys->sex  = $request['sex'];
        $eddys->save();   
        return response()->json($eddys, 200);
    }

    public function delete($id)
    {
        $eddys = Eddy::find($id);
        $eddys->delete();
        return response()->json(null, 204);
    }


}
