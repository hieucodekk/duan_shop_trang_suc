<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showFromLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $user =$request->only('email',"password"); //only lay du lieu minh can
        if(Auth::attempt($user)){
            return redirect()->intended('home');
        }
        return redirect()->back()->withErrors([
            'email'=> "thong tin khong dung"
        ]);
    }
    public function showFromregister(){
        return view('auth.register');
    }
    public function register(Request $request){
        $data = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=>'required|string|email|max:255',
            'password'=> 'required|string|min:6'
        ]);
        $user = User::query()->create($data);
        Auth::login($user);
        return redirect()->intended('home');
    }
     public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
