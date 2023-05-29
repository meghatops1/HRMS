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
        return view("Client.home",['emp'=>$emp]);
    }
}
