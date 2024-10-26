@extends('layouts.MainLayout')

@section('main-content')

<h1  style="color: rgb(6, 90, 146);font-weight:bold;">Student Form</h1>
<div class="card">
    <div class="card-body">
    
       
    


<form action="{{route('student.create')}}" method="post" >
            @csrf

            <div class="mb-3">
                <label  class="text"> اسم الطالب  </label>
                <input type="text"  name="student_name"  class="form-control"   placeholder="">
            </div>
            @error('student_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

            <div class="mb-3">
                <label  class="text"> 1رقم التليقون  </label>
                <input type="text"  name="father_phone"  class="form-control"   placeholder="">
            </div>
            @error('father_phone')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
            


            
            <div class="mb-3">
                <label  class="text"> السنتر </label>
                    <select  name="center_id" class="form-select" >
                        @foreach ($centers as $center )
                            <option value="{{$center->id}}">
                                {{$center->center_name}}
                                مجموعة :
                                {{$center->group_number}}
                            </option>
                            <hr>
                            @endforeach
                        </select>
                        @error('center_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        
            </div>

        
        
            
        <button type="submit" class="btn btn-primary" style="width: 200px;">Submit</button>

</form>


        @if (session('message'))
            <p class="alert alert-success" style="margin-top: 2%">{{session('message')}}</p>
        @endif


        
    </div>
</div>

<br>
<div class="card">
    <div class="card-body">

        <form action="{{route('student.search')}}" method="get">
            @csrf
            <label > <h1>Student name </h1></label>
            <br>
            <input style="width: 100%" type="search" name="student_name">
            <br>
            <button class="btn btn-info">search</button>


        </form>

        <br>

        @if (session('students'))
            @foreach (session('students') as $student )
                <p><h3 style="color: dodgerblue">student Name</h3> {{$student->student_name}}</p>
                {{-- @dd($student) --}}
                @foreach ($student->centers as $center )
                <p><h3 style="color: dodgerblue">Center Name</h3> {{$center->center_name}}</p>
                <p><h3 style="color: dodgerblue">Group Number</h3> {{$center->group_number}}</p>
                @endforeach
            @endforeach
            @elseif (session('failed'))
            <div class="alert alert-danger" role="alert">
                No student data available.

            </div>

        @endif
    


        
    </div>
</div>


@endsection