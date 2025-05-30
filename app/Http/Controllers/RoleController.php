<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }

    public function show(Role $role)
    {
        return $role;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:roles,name',
        ]);

        return Role::create($validated);
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => "required|string|max:50|unique:roles,name,{$role->id}",
        ]);

        $role->update($validated);
        return $role;
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(['message' => 'Role deleted']);
    }
};