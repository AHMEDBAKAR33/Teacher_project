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
            <th scope="col">التاريخ</th>
            <th scope="col">الحضور</th>

    </tr>
        </thead>
        <tbody>
            @foreach ($students as $student )
            @foreach ($attendances  as $attendance  )

            <tr>
                <th scope="row">{{$student->id}}</th>
                <th scope="row">{{$student->student_name}}</th>
                <td scope="row">{{$student->father_PhoneNumber}}</td>
                <th scope="row">{{ \Carbon\Carbon::parse($attendance->attendance_time)->format('d-m') }}
                </th>
                <th scope="row">{{$attendance->attended}}</th>
            </tr>
            @endforeach
            @endforeach
        </tbody>
</table>

<hr>


{{-- Student Attendance --}}




@endsection