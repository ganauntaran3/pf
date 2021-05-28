<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(){
        $data = Admin::where('username', request()->username)->first();
        if($data){
            if(Hash::check(request()->password, $data->password)){
                    session(['login_status' => 'admin']);
                    session(['key' => $data->id]);
                    session(['entity' => $data->username]);
                    return redirect()->route('dashboard');
            }else{
                return redirect()->back()->with('message', 'Wrong Password');
            }
        }else{
            return redirect()->back()->with('message', 'Username does not exist in our database');
        }

    }

    public function logout(){
        request()->session()->flush();
        return redirect('/');
    }
}
