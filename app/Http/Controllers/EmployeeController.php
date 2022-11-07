<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Job;

class EmployeeController extends Controller
{
    public function index(){
        $employee=Employee::paginate(10);
        return view('admin.employee.index',compact('employee'));
    }
    
    // public function show($id){
    //     $job=Job::find($id);
    //     return view('admin.employee.index',['job'=>$job->toarray()]);
    // }

    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate([
            'employee_name'=>'required|max:255',
            'employee_job_name'=>'required|max:255'
        ]);

        //บันทึกข้อมูล
        $employee = new Employee;
        $employee->employee_name = $request->employee_name;
        $employee->employee_job_name = $request->employee_job_name;
        $employee->save();
        return redirect()->back()->with('success',"บันทึกข้อมูลสำเร็จ");
    }

    public function edit($id){
        $employee = Employee::find($id);
        return view('admin.employee.edit',compact('employee'));
        
    }

    public function update(Request $request,$id){
        //ตรวจสอบข้อมูล
        $request->validate([
            'employee_name'=>'required|max:255',
            'employee_job_name'=>'required|max:255'
        ]);
        $update = Employee::find($id)->update([ 
            'employee_name'=>$request->employee_name,
            'employee_job_name'=>$request->employee_job_name
        ]);
        return redirect()->route('employee')->with('success',"อัพเดทข้อมูลสำเร็จ");
    }

    public function delete($id){
        $delete = Employee::find($id)->forceDelete();
        return redirect()->route('employee')->with('success',"ลบข้อมูลเรียบร้อย");
    }

}
