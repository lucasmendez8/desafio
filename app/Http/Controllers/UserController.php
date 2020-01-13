<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('auth.edit', compact('user'));
        } else {
            return redirect('login');
        }
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $path = $request->file('avatar')->store('public/avatars');
        $imageName = explode('/', $path);

        //Se borra imagen antigua y se actualiza a la nueva
        Storage::delete('/public/avatars/'.$user->avatar);
        $user->avatar = $imageName[2];

        $user->update($request->only('name'));

        return  redirect()->route('clientes.index');
    }
}
