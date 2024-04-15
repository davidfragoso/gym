<?php

namespace App\Http\Controllers;

use App\Models\SysAdmin;
use Illuminate\Http\Request;

class SysAdminController extends Controller
{
    public function index()
    {
        $admins = SysAdmin::all();
        return response()->json($admins);
    }

    public function store(Request $request)
    {
        $admin = SysAdmin::create($request->all());
        return response()->json($admin, 201);
    }

    public function show($id)
    {
        $admin = SysAdmin::findOrFail($id);
        return response()->json($admin);
    }

    public function update(Request $request, $id)
    {
        $admin = SysAdmin::findOrFail($id);
        $admin->update($request->all());
        return response()->json($admin, 200);
    }

    public function destroy($id)
    {
        $admin = SysAdmin::findOrFail($id);
        $admin->delete();
        return response()->json(null, 204);
    }

    function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sys_admins',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $admin = SysAdmin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        return response()->json(['message' => 'Administrador registrado con éxito'], 201);
    }
}


