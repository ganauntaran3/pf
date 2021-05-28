<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class AdminController extends Controller
{
    public function index(){
        $rgs = Registration::where('status', '0')->get();
        return view('admin.dashboard', [
            'rgs' => $rgs
        ]);
    }
}
