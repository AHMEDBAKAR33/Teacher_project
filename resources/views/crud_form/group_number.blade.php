@extends('layouts.MainLayout')

@section('main-content')

{{-- <h1  style="color: rgb(6, 90, 146);font-weight:bold;"> سنتر {{$center->center_name}} </h1> --}}

<div class="card">
    <div class="card-body">
    
        <h1 style="color: skyblue"> Group {{$group_id}}
            <p style="color: skyblue">Time: {{$group_data->group_time}}  </p>
        </h1>
<hr>


        @foreach ($students_group as $students )
            @foreach ($students as $student )
                <p>{{$student->student_name}}</p>
                <hr>
            @endforeach
        @endforeach














    </div>
    </div>
    
    
    @endsection