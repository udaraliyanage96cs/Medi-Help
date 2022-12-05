<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Patient;
use Auth;

class ReportController extends Controller
{
    public function reportsAddView(Request $req){
        return view("dashboard")->with("page","reportsAddView")->with("patientID",$req->id);
    }
    public function reportsAdd(Request $req){

        $patient = Patient::find($req->id);
        $fileName = '';
        if(isset($req->file)){
             if($req->file != "" && $req->file != null){
                 $fileName = time().'.'.$req->file->extension();  
                 $path = "uploads/reports/".$req->id;
                 $req->file->move(public_path($path), $fileName);
             }else{
                 $fileName = 'empty.png';
             }
        }else{
            $fileName = 'empty.png';
        }

        $report = new Report;
        $report->title = $req->title;
        $report->url = $fileName;
        $report->staff_note = $req->note;
        $report->price = $req->price;
        $report->patient_id = $req->id;
        $report->user_id = $patient->user_id;
        $report->save();
        return redirect(Auth::user()->role."/patient/view/".$req->id);
        //->back()->withErrors(["success"]);
    }
    
}
