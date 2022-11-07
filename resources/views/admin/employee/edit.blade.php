<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>Welcome</b> : {{Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <div class="card">
                        <div class="card-header">แบบฟอร์มแก้ไขข้อมูล</div>
                        <div class="card-body">
                            <form action="{{url('/employee/update/'.$employee->id)}}" method="post">
                                @csrf
                                <div class="form-groub">
                                    <label for="employee_name">ชื่อ-นามสกุล</label>
                                    <input type="text"class="form-control" name=employee_name value="{{$employee->employee_name}}">
                                </div>
                                @error('employee_name')
                                    <div>
                                    <span class="text-danger my-2">{{$message}}</span>
                                    </div>
                                @enderror
                                <div class="form-groub">
                                    <label for="employee_job_name">ชื่อ-นามสกุล</label>
                                    <input type="text"class="form-control" name=employee_job_name value="{{$employee->employee_job_name}}">
                                </div>
                                @error('employee_job_name')
                                    <div>
                                    <span class="text-danger my-2">{{$message}}</span>
                                    </div>
                                @enderror
                                <br>
                                <input type="submit" value="อัพเดท" class="btn bg-success p-2 text-white bg-opacity-50">
                                <a href="{{ route('employee') }}" class="btn btn-danger"> ยกเลิก </a>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>
