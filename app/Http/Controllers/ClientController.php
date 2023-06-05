<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function index(){
        return view('Client.login');
    }

    public function login(Request $request){
        $emp=DB::table('employees')->where(['username'=>$request->username,'password'=>$request->pswd])->first();
        if($emp){
            Session::put('emp',$emp);
            return redirect('/clienthome');
        }
        else{
            echo "login fail";
        }

    }
    public function home(Request $request){
        $emp=$request->session()->get('emp');
        $emp=DB::table('employees')->where(['empId'=>$emp->empId])->first();
        $img= DB::table('empimg')->where(["empid"=>$emp->empId])->first();
        return view("Client.home",['emp'=>$emp,'image'=>$img]);
    }

    function accountInfo(Request $request){
        $insertArray=[
            "empid"=>$request->empid,
            "accno"=>$request->accno,
            "ifsccode"=>$request->ifsccode,
            "branchname"=>$request->branchname,
            "aname"=>$request->aname,
            "atype"=>$request->atype
        ];
        DB::table('account')->insert($insertArray);
        return redirect('/clienthome');
    }
}
