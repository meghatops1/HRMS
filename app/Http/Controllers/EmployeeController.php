<?php

namespace App\Http\Controllers;

use App\Mail\LoginMail;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=DB::table('employees')->get();
        return view('Emp.index',['empData'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Emp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('employees')->insert([
            'empName'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'username'=>Str::random(10),
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "<pre>";
        $employee=DB::table('employees')->where(['empId'=>$id])->first();
        if($employee->isEmail == 0){
            \Mail::to($employee->email)->send(new LoginMail($employee));
            echo "mail send";
            DB::table('employees')->where(['empId'=>$employee->empId])->update(['isEmail'=>1]);
        }
        else{
            echo "mail already sent";
        }
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
       
        if($request->file('img')){
            $file= $request->file('img');
            $filename=$file->getClientOriginalName();
            $file->move(public_path('empimages'),$filename);
        
            $imagesdata=DB::table('empimg')->where(['empid'=>$request->empid])->first();
            print_r($imagesdata);
            if($imagesdata){
                DB::table('empimg')->where([ 'empid'=>$request->empid])->update([
                    "imgname"=>$filename,
                ]);
            }
            else{
                echo "here";
            DB::table('empimg')->insert([
                'empid'=>$request->empid,
                "imgname"=>$filename,
            ]);
            }
        }
        
        $array=[
            'empName'=>$request->empname,
            'email'=>$request->empemail,
            'password'=>$request->pass,
            'username'=>$request->username,
        ];
        
        DB::table('employees')->where(["empId"=>$request->empid])->update($array);
        return redirect('/clienthome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function salaryAssign(Request $request){
        $id=$request->id;
        $employee=DB::table('employees')->where(['empId'=>$id])->first();
        return view('Emp.salary',['emp'=>$employee]);
    }

    public function salaryStore(Request $request){
      DB::table('salary')->insert([
        'empid'=>$request->empid,
        "salary"=>$request->salary,
        "description"=>$request->description
      ]);
      return redirect('/Emp');

    }
    public function getSalarayByempid(Request $request){
        
        $arr=explode("_",$request->id);
       
       $salary=DB::table('salary')
       ->join('account','salary.empid',"=","account.empid")
       ->where(['salary.empid'=>$arr[1]])->first();
       echo  json_encode($salary);
        
    }
}
