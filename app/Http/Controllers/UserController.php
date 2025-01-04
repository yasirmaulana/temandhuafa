<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\PermissionRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function list()
    {
        $PermissionRole = PermissionRole::getPermission('User', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['PermissionAdd'] = PermissionRole::getPermission('Add User', Auth::user()->role_id);
        $data['PermissionEdit'] = PermissionRole::getPermission('Edit User', Auth::user()->role_id);
        $data['PermissionDelete'] = PermissionRole::getPermission('Delete User', Auth::user()->role_id);

        $data['getRecord'] = User::getRecord();
        return view('panel.user.list', $data);
    }

    public function add()
    {
        $PermissionRole = PermissionRole::getPermission('Add User', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['getRole'] = Role::getRecord();
        return view('panel.user.add', $data);
    }

    public function insert(Request $request)
    {
        $PermissionRole = PermissionRole::getPermission('Add User', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role_id = trim($request->role_id);
        $user->save();

        return redirect('panel/user')->with('success', "User successfully created");
    }

    public function edit($id)
    {
        $PermissionRole = PermissionRole::getPermission('Edit User', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $data['getRecord'] = User::getSingle($id);
        $data['getRole'] = Role::getRecord();
        return view('panel.user.edit', $data);
    }

    public function update($id, Request $request)
    {
        $PermissionRole = PermissionRole::getPermission('Edit User', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $user = User::getSingle($id);
        $user->name = trim($request->name);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = trim($request->role_id);
        $user->save();

        return redirect('panel/user')->with('success', "User successfully created");
    }

    public function delete($id)
    {
        $PermissionRole = PermissionRole::getPermission('Delete User', Auth::user()->role_id);
        if (empty($PermissionRole)) {
            abort(404);
        }

        $user = User::getSingle($id);
        $user->delete();

        return redirect('panel/user')->with('success', "User successfully deleted");
    }
}
