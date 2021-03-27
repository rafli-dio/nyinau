<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('nis', 'password'))) {
            if ($request->nis == $request->password) {
                return redirect('/change_password');
            }
            if (auth()->user()->role == "admin") {
                return redirect('/admin');
            }
            if (auth()->user()->role == "siswa") {
                return redirect('/');
            }
            if (auth()->user()->role == "guru") {
                return redirect('/');
            }
        }

        return redirect('/login')->with('message', 'NIS atau Password salah');
    }

    public function changePassword(Request $request)
    {
        $old = $request->old_password;
        $new = $request->new_password;
        $conf = $request->conf_password;

        if (Hash::check($old, auth()->user()->password)) {
            if ($new == $conf) {
                $user = User::find(auth()->user()->id);
                $user->password = bcrypt($new);
                $user->save();

                Auth::logout();

                return redirect('/login');
            }
        }

        return redirect('/change_password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
