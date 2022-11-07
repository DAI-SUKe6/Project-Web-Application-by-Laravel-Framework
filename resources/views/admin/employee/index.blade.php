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
                
                        @if(session("success"))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                        
                            <div class="row">
                                    <table class="table table-success">
                                        <div class="card text-bg-success mb-1">
                                            <div class="card-header">ตารางข้อมูลพนักงาน</div>
                                        </div>
                                    <thead>
                                        </a>
                                        <tr>
                                            <th scope="col">Number</th>
                                            <th scope="col">Employee Name</th>
                                            <th scope="col">Job Name</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employee as $row)
                                        <tr>
                                        <th>{{$employee->firstItem()+$loop->index}}</th>
                                        <td>{{$row->employee_name}}</td>
                                        <td>{{$row->employee_job_name}}</td>
                                        <td>
                                            <a href="{{url('/employee/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a>
                                        </td>
                                        <td>
                                            <a href="{{url('/employee/delete/'.$row->id)}}" class="btn btn-danger">ลบข้อมูล</a>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    {{$employee->links()}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header">แบบฟอร์มพนักงาน</div>
                                <div class="card-body">
                                    <form action="{{route('addEmployee')}}" method="post">
                                        @csrf
                                        <div class="form-groub">
                                            <label for="employee_name">ชื่อ-นามสกุล</label>
                                            <input type="text"class="form-control" name=employee_name >
                                        </div>
                                        @error('employee_name')
                                            <div>
                                            <span class="text-danger my-2">{{$message}}</span>
                                            </div>
                                        @enderror

                                        @csrf
                                        <div class="form-groub">
                                            <label for="employee_job_name">ตำแหน่ง</label>
                                            <input type="text"class="form-control" name=employee_job_name >
                                        </div>
                                        @error('employee_job_name')
                                            <div>
                                            <span class="text-danger my-2">{{$message}}</span>
                                            </div>
                                        @enderror
                                        
                                        <br>
                                        @error('job_id')
                                            <div>
                                            <span class="text-danger my-2">{{$message}}</span>
                                            </div>
                                        @enderror
                                        <br>
                                        <input type="submit" value="บันทึก" class="btn bg-success p-2 text-white bg-opacity-50">
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">รายวิชาทั้งหมด</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="employee_name">ชื่อวิชา</label>
                            @foreach($employee as $row)
                            <label class="text"></label>
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</x-app-layout>
