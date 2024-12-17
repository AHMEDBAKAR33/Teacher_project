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

</tr>
        </thead>
        <tbody>
        
{{-- the Gemini method to show the student attendance records  --}}
        @foreach ($students as $student )
<tr>
        <th scope="row">{{$student->id}}</th>
        <th scope="row">{{$student->student_name}}</th>
        <td scope="row">{{$student->father_PhoneNumber}}</td>
        <th scope="row"> 
                Date : [ {{ \Carbon\Carbon::parse($student->LatestAttendance->attendance_time)->format('d-m') }} ]
                @if ($student->LatestAttendance->attended == 1)
                        <p style="color: green">حاضر</p>
                @else
                        
                        <p style="color: red">غائب</p>
                @endif
        
        </th>
</tr>
@endforeach



        </tbody>
</table>

<hr>



<a href="{{route('center.form')}}" class="btn btn-dark">Center</a>

@endsection