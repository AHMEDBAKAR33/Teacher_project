{{-- GRoup Page  --}}
@extends('layouts.MainLayout')

@section('main-content')
    <h1 style="color: rgb(6, 90, 146);font-weight:bold;">Hello In {{ $center->center_name }} Group:
        {{ $center->group_number }} </h1>
    <div class="card">
        <div class="card-body">
            @foreach ($students as $student)
                <form action="{{ route('attendance.create') }}" method="post">
                    @csrf
                    <p style="font-weight: bold">{{ $student->student_name }}</p>
                    <b style="color: red">غائب </b><input type="checkbox" name="is_completed[{{ $student->id }}]"
                        value="0">
                    <br>
                    <b style="color: green">حاضر </b><input type="checkbox" name="is_completed[{{ $student->id }}]"
                        value="1">


                    <br>
                    <label for="student_degree"> درجة الطالب </label>
                    <input type="text" name="student_degree[{{ $student->id }}]" style="margin-left: 24px;width:40px">
                    <hr>
            @endforeach
            <label for="test_degree">درجة الامتحان</label>
            <input type="text" name="test_degree" style="margin-left: 20px;width:40px">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>




        </div>
    </div>

    @if (session('success_message'))
        <p style="color: green">{{ session('success_message') }}</p>
    @endif

    <br>
    {{-- <a href="{{route('GroupAttendance.index',$center->id)}}" class="btn btn-success">حضور المجموعة</a> --}}
    <h1 style="color: rgb(6, 90, 146);font-weight:bold;">Attendance Day</h1>
    <form action="{{ route('GroupAttendance.index', [$center->id]) }}" method="GET">
        @csrf
        <input type="date" name="attendance_time">
        <button class="btn btn-outline-info">Search</button>
    </form>

    @if (session('warning_message'))
        <p style="color: red">{{ session('warning_message') }} , {{ session('date') }} </p>
    @endif
@endsection
