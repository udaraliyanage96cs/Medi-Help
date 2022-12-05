<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Patient;
use Auth;
use Cookie;

class UserController extends Controller
{
    public function setCookie(Request $req){
        Cookie::queue('darkmode', $req->id, 2628000);
        return response()->json(['values'=>Cookie::get('darkmode')]);
    }

    public function getDarkValue(Request $request){
        return Cookie::get('darkmode');
    }
    
    public function home(Request $req){
        return view("dashboard")->with("page","Home");
    }
    public function signup(Request $req){
        $userdata = array(
            'email'     => $req->email,
            'password'  => $req->pwd
        );
        if (Auth::attempt($userdata)) {
            return redirect("/home");
        } else {        
            return redirect()->back();
        }
    }
    public function patient(Request $req){
        return view("dashboard")->with("page","Patient");
    }
    public function accessdenide(Request $req){
        return view("dashboard")->with("page","Accessdenide");
    }
    public function staff(Request $req){
        return view("dashboard")->with("page","Staff");
    }
    public function staffAddView(Request $req){
        return view("dashboard")->with("page","staffAddView")->with("type","add")->with("userId",-1);
    }
    public function staffAdd(Request $req){
        $user = new User;
        $user->name = $req->mname;
        $user->email  = $req->email;
        $user->password = Hash::make($req->pwd);
        $user->role	 = $req->rtype;
        $user->save();
        return redirect()->back()->withErrors(["success"]);
    }
    public function staffEditView(Request $req){
        return view("dashboard")->with("page","staffEditView")->with("type","edit")->with("userId",$req->id);
    }
    public function staffEdit(Request $req){
        $user = User::find($req->id);
        $user->update([
            "name"=>$req->mname,
            "email"=>$req->email,
            "role"=>$req->rtype,
        ]);
        return redirect()->back()->withErrors("updated");
    }
    public function staffDelete(Request $req){
        $user = User::find($req->id);
        $user->delete();
        return redirect()->back();
    }
    public function patientAddView(Request $req){
        return view("dashboard")->with("page","patientAddView")->with("type","add")->with("patientId",-1);
    }
    public function patientAdd(Request $req){

      

        $user = new User;
        $user->name = $req->pname;
        $user->email  = $req->email;
        $user->password = Hash::make($req->pwd);
        $user->role	 = 'patient';
        $user->save();

        $user_id = $user->id;

        $fileName = '';
        if(isset($req->file)){
             if($req->file != "" && $req->file != null){
                 $fileName = time().'.'.$req->file->extension();  
                 $path = "uploads/profile/".$user_id;
                 $req->file->move(public_path($path), $fileName);
             }else{
                 $fileName = 'empty.png';
             }
        }else{
            $fileName = 'empty.png';
        }

        $patient = new Patient;
        $patient->puid = $req->puid;
        $patient->dob = $req->dob;
        $patient->phone = $req->phone;
        $patient->nic = $req->nic;
        $patient->address = $req->address;
        $patient->barcode = $req->puid;
        $patient->bloodgroup = $req->bgroup;
        $patient->propic = $fileName;
        $patient->user_id = $user_id;
        $patient->save();
        return redirect()->back()->withErrors(["success"]);
    }
    public function patientProfileView(Request $req){
        return view("dashboard")->with("page","patientProfileView")->with("patient_id",$req->id);
    }
    public function patientEditView(Request $req){
        return view("dashboard")->with("page","patientEditView")->with("type","edit")->with("patientId",$req->id);
    }
    public function patientEdit(Request $req){

        $patient = Patient::find($req->id);

        $fileName = '';
        if(isset($req->file)){
             if($req->file != "" && $req->file != null){
                 $fileName = time().'.'.$req->file->extension();  
                 $path = "uploads/profile/".$patient->user_id;
                 $req->file->move(public_path($path), $fileName);
             }else{
                 $fileName = 'empty.png';
             }
        }else{
            $fileName = 'empty.png';
        }

        $patient->update([
            'dob'=> $req->dob,
            'phone' => $req->phone,
            'nic' => $req->nic,
            'address'=> $req->address,
            'bloodgroup'=> $req->bgroup,
            'puid'=> $req->puid,
        ]);

        if($fileName != ''){
            $patient->update([
                'propic'=> $fileName,
            ]);
        }
        return redirect()->back()->withErrors(["updated"]);
    }

    public function patientPuid(Request $req){
        $patient = Patient::join('users','users.id','=','patients.user_id')->where('patients.puid',$req->id)
        ->get(['patients.id','patients.user_id','patients.puid','patients.propic','users.name','users.email','patients.dob','patients.phone','patients.bloodgroup','patients.address',]);
        return response()->json(['item'=>$patient]);
    }
    
    
}
