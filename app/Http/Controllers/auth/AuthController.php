<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
    //     $data = User::where('email',$request->email)->firstOrFail();
    //    if ($data){
    //        //jika password = data password sama maka session bernilai true
    //        if(Hash::check($request->password,$data->password)){
    //         session(['berhasil_login' => true]);
    //         return redirect('dashboard');
    //        }
    //    }
    //    //pesan password email salah
    //    return redirect('/')->with('message','Email atau Password salah!');

    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        return redirect('/dashboard')->with('message','Login Success');
    }
    return redirect('/')->with('message','Email Atau Password salah!!');
    }
    public function logout(Request $request){
        //session flush
        // $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
