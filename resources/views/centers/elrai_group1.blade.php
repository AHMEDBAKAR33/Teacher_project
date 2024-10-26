{{-- GRoup Page  --}}
@extends('layouts.MainLayout')

@section('main-content')
<h1  style="color: rgb(6, 90, 146);font-weight:bold;">Hello In {{$center->center_name}} Group: {{$center->group_number}} </h1>
<div class="card">
    <div class="card-body">
        @foreach ($students as $student ) 

        <form action="{{route('attendance.create')}}" method="post">
            @csrf
                <p>{{$student->student_name}}</p>
                غائب <input type="checkbox" name="is_completed[{{ $student->id }}]" value="0"> 
                <br>
                حاضر <input type="checkbox" name="is_completed[{{ $student->id }}]" value="1"> 
                
                <hr>
                
                @endforeach 
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>




    </div>
</div>

@if (session('success_message'))
    <p style="color: green">{{session('success_message')}}</p>
@endif

<br>
<a href="{{route('GroupAttendance.index',$center->id)}}" class="btn btn-success">حضور المجموعة</a>

@endsection