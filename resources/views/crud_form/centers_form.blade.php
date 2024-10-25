
@extends('layouts.MainLayout')

@section('main-content')
<h1  style="color: rgb(6, 90, 146);font-weight:bold;">اضافة سنتر </h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('center.create')}}" method="post">
                @csrf
                        <div class="mb-3">
                            <label  class="text"> Ceneter Name </label>
                            <input type="text"  name="center_name"  class="form-control" placeholder="center name">
                        </div>
                            @error('center_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <div class="mb-3">
                            <label  class="text"> Group Number </label>
                            <input type="text"  name="group_number"  class="form-control" placeholder="center name">
                        </div>
                        @error('group_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    {{-- Message --}}
        @if (session('successMessage'))
            <p class="alert alert-success" style="margin-top: 2%">{{session('successMessage')}}</p>
        @endif
@endsection

    
    
    <hr>
@section('content-x')

<div style="margin-top: 5%">
    <h1  style="color: rgb(6, 90, 146);font-weight:bold;" > قائمة السناتر  </h1>
        <div class="card">
            <div class="card-body">
    

{{-- Make loop to loop for speicic number then print in new line  --}}

                <div class="container">
                    <div class="row">
                        @foreach ($centers as $index => $center)
{{-- Print the group name once every 3 group --}}
                        @if ($index % 3 == 0)
                        <div class="w-100"></div>
                        <h3>{{ $center->center_name }}</h3>
                    @endif
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('group.show', [$center->id, $center->group_number]) }}" class="btn btn-info">
                                                Group: {{ $center->group_number }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (($index + 1) % 3 == 0)
                                <div class="w-100"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
            @if (session('deleteMessage'))
                <p class="alert alert-danger" style="margin-top: 1%">{{session('deleteMessage')}}</p>
            @endif
    </div>


@endsection


