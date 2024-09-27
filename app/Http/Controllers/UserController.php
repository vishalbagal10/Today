<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function saveregister(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        if($user){
            
            return redirect('/')->with("success","Registration successfull!!!");
        }
        else{
            return redirect('/register')->with("error","Fail to create account...Please try Again!!!");
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticateLogin(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = DB::table('users')
            ->where('email', '=', $request->email)
            ->where('password', '!=', NULL)
            ->first();

        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                
                $request->session()->put('loggeduser',$user->id);
                $request->session()->put('LoggedUserName',$user->name);
                $request->session()->put('loggedUserType',$user->role_id);
                $request->session()->put('LoggedUserEmail',$user->email);

                $credentials = $request->only('email','password');
                if(Auth::attempt($credentials)){
                    return redirect('/index');
                }
                else{
                    return redirect('/');
                }
            }
            else{
                return redirect('/');
            }
        }
        else
        {
            return view('auth.register')->with('error','You are not a Valid User!!!');
        }
    }


    public function loginsave(Request $request)
    {
        return view('products.list');
    }

    public function userProfile(Request $request)
    {
        $userData = DB::table('users')->where('id','=',session('loggeduser'))->first();
        return view('auth.profile',['userData'=>$userData]);
    }

    public function logout(Request $request)
    {
        if(session()->has('loggeduser'))
        {
            session()->pull('loggeduser');
            return redirect('/');
        }
    }

}
