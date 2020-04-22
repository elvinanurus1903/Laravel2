<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
      public function register(Request $request)
    {
        $data = [
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' =>\Hash::make($request->password),
    		'role' => $request->role,
    	];

    	\App\User::create($data);
        \Session::flash('msg', 'Berhasil Daftar');
    	return redirect('login');

    }

    function registerblade(){
        return view('auth.register');
    }
    function loginblade(){
        return view('auth.login');
    }
}
