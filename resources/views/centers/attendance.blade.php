@extends('layouts.MainLayout')

@section('main-content')


<h1>Hello in Attendance Page</h1>


{{-- The student Data  --}}
<table class="table table-bordered">
        <thead>
    <tr>
        <th scope="col">رقم الطالب</th>
        <th scope="col">اسم الطالب</th>
        <th scope="col">رقم ولي الامر</th>
        <th scope="col">الحضور</th>
        <th scope="col"> درجة الامتحان </th>
        <th scope="col">درجة الطالب  </th>

</tr>
        </thead>
        <tbody>
        
@foreach ($students as $student )


<tr>
        <th scope="row">{{$student->id}}</th>
        <th scope="row">{{$student->student_name}}</th>
        <td scope="row">{{$student->father_PhoneNumber}}</td>
        <th scope="row"> 
                Date : [ {{ \Carbon\Carbon::parse($student->latestAttendance->attendance_time)->format('d-m') }} ]
                @if ($student->latestAttendance->attended == 1)
                        <p style="color: green">حاضر</p>
                @else
                        
                        <p style="color: red">غائب</p>
                @endif
        
        </th>
        <th>
                <b style="color:rgb(0, 0, 0)">{{ $student->latestAttendance->test_degree }} </b>
        </th>
        <th>
                <b style="color: rgb(211, 11, 11)">{{ $student->latestAttendance->student_degree }} </b>
        </th>
</tr>
@endforeach



        </tbody>
</table>

<hr>



<a href="{{route('center.form')}}" class="btn btn-dark">Center</a>

@endsection