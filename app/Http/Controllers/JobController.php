<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(){
        $job=Job::paginate(10);
        // if( $user=auth()->user()->hasRole("admin")){
        //     $user=auth()->user();
        //     $user->givePermissionTo('manage');
        // }else{
        //     $user=auth()->user();
        //     $user->givePermissionTo('read');
        // }
        return view('admin.job.index',compact('job'));
    }
    
    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate([
            'job_name'=>'required|unique:jobs|max:255',
        ]);
        //บันทึกข้อมูล
        $job = new Job;
        $job->job_name = $request->job_name;
        $job->user_id = Auth::user()->id;
        $job->save();
        return redirect()->back()->with('success',"บันทึกข้อมูลสำเร็จ");
    }

    public function edit($id){
        $job = Job::find($id);
        return view('admin.job.edit',compact('job'));
        
    }

    public function update(Request $request,$id){
        //ตรวจสอบข้อมูล
        $request->validate([
            'job_name'=>'required|unique:jobs|max:255',
        ]);
        $update = Job::find($id)->update([ 
            'job_name'=>$request->job_name,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect()->route('job')->with('success',"อัพเดทข้อมูลสำเร็จ");
    }

    public function delete($id){
        $delete = Job::find($id)->forceDelete();
        return redirect()->route('job')->with('success',"ลบข้อมูลเรียบร้อย");
    }

}
