<?php

namespace App\Http\Controllers;

use App\Exports\ExportRegistration;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Notifications\EmailNotification;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index(){
        $rgs = Registration::where('status', '0')->get();
        return view('admin.dashboard', [
            'rgs' => $rgs
        ]);
    }

    public function accept($id){
        $rgs = Registration::where('id', $id)->first();

        $rgs->update([
            'status' => 'accepted'
        ]);

        $mailer = [
            'body' => 'You Received a new notification',
            'text' => 'Congratulations!, your application was approved',
            'url' => url('/'),
            'end' => 'Thankyou for submitting',
        ];

        $rgs->notify(new EmailNotification($mailer));

        return redirect('admin/accepted')->with('message', 'Data was Accepted');
    }

    public function decline($id){

        Registration::where('id', $id)->update([
            'status' => 'declined'
        ]);

        return redirect('admin/declined')->with('message', 'Data was Declined');
    }

    public function accepted(){
        $rgs = Registration::where('status', 'accepted')->get();
        return view('admin.accepted', [
            'rgs' => $rgs
        ]);
    }

    public function declined(){
        $rgs = Registration::where('status', 'declined')->get();
        return view('admin.accepted', [
            'rgs' => $rgs
        ]);
    }

    public function export(){
        return Excel::download(new ExportRegistration, 'whitelist.xlsx');
    }

}
