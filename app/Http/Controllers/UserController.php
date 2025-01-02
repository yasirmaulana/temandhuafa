<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getRecord();
        return view('panel.user.list', $data);
    }

    public function add()
    {
        $data['getRole'] = Role::getRecord();
        return view('panel.user.add', $data);
    }

    public function insert(Request $request)
    {
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
        $data['getRecord'] = User::getSingle($id);
        $data['getRole'] = Role::getRecord();
        return view('panel.user.edit', $data);
    }

    public function update($id, Request $request)
    {
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
        $user = User::getSingle($id);
        $user->delete();

        return redirect('panel/user')->with('success', "User successfully deleted");
    }
}
