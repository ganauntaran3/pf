<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Registration;

class UserController extends Controller
{
    public function index(){
        return view('user.form');
    }

    public function searchCountry(Request $request)
    {
        $co = Country::select('name')
                ->where('name','like', '%'.$request->country.'%')->get();

        return response()->json($co);
    }

    public function searchState(Request $request)
    {
        $st = State::select('name')
                ->where('name','like', '%'.$request->state.'%')->get();

        return response()->json($st);
    }

    public function searchCity(Request $request)
    {
        $ci = City::select('name')
                ->where('name','like', '%'.$request->city.'%')->get();

        return response()->json($ci);
    }

    public function postData(){
        request()->validate([
            'bsc_address' => 'unique:registrations,bsc_address'
        ]);

        $doc = request()->file('doc_name');
        $doc_name = time() . "-" . $doc->getClientOriginalName();
        $dir = 'storage';
        $doc->move($dir, $doc_name);

        Registration::create([
            'doc_type' => request()->doc_type,
            'doc_name' => $doc_name,
            'gender' => request()->gender,
            'fullname' => request()->fullname,
            'email' => request()->email,
            'address' => request()->address,
            'amount' => request()->amount,
            'country' => request()->country,
            'state' => request()->state,
            'city' => request()->city,
            'bsc_address' => request()->bsc_address,
            'status' => '0'
        ]);

        return redirect('/')->with('message', 'Your Data Successfully sended');
    }



}
