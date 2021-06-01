<?php

namespace App\Http\Controllers;

use App\Exports\ExportRegistration;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AcceptNotification;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index(){
        $rgs = Registration::where('status', '0')->get();
        return view('admin.dashboard', [
            'rgs' => $rgs
        ]);
    }

    public function notification(){
        set_time_limit(1500);
        $rgs = Registration::where('notified', 'false')->get();
        $rgsCount = $rgs->count();
        $mailer = [
            'path' => 'storage/private-sale.docx'
        ];
        if($rgsCount > 0){
            // $rgs->notify(new EmailNotification($mailer));
            $insEmail = [
                'notified' => true
            ];
            Registration::where('notified', 'false')->update($insEmail);
            $sended = Notification::send($rgs, new EmailNotification($mailer));
            dd($sended);
            return redirect('admin/')->with('message', 'Verification is sended');
        }else{
            return redirect('admin/')->with('message', 'All user is already got notified');
        }
        // $sended = Notification::send($rgs, new EmailNotification($mailer));



    }

    public function accept($id){
        set_time_limit(1500);
        $rgs = Registration::where('id', $id)->first();

        $rgs->update([
            'status' => 'accepted'
        ]);

        Notification::send($rgs, new AcceptNotification());

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
