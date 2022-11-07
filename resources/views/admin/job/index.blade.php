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
                            <table class="table table-success ">
                                <div class="card mb-1">
                                    <div class="card-header">ตารางตำแหน่งงาน</div>
                                </div>
                            <thead>
                                </a>
                                <tr>
                                    <th scope="col">Number</th>
                                    <th scope="col">Job name</th>
                                    <th scope="col">User name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($job as $row)
                                <tr>
                                <th>{{$job->firstItem()+$loop->index}}</th>
                                <td>{{$row->job_name}}</td>
                                <td>{{$row->user->name}}</td>
                                <td>
                                    <a href="{{url('/job/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a>
                                </td>
                                <td>
                                    <a href="{{url('/job/delete/'.$row->id)}}" class="btn btn-danger">ลบข้อมูล</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            {{$job->links()}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{route('addJob')}}" method="post">
                                @csrf
                                <div class="form-groub">
                                    <label for="job_name">ชื่อตำแหน่ง</label>
                                    <input type="text"class="form-control" name=job_name >
                                </div>
                                @error('job_name')
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
</x-app-layout>
