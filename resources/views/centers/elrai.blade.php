@extends('layouts.MainLayout')

@section('main-content')
<h1  style="color: rgb(6, 90, 146);font-weight:bold;">Hello</h1>
<div class="card">
    <div class="card-body">
        <a href="{{route('group.show',[$center->id,"1"])}}" class="btn btn-info" >Group 1</a>
        <a href="{{route('group.show',[$center->id,"2"])}}" class="btn btn-info" >Group 2</a>
        <a href="{{route('group.show',[$center->id,"3"])}}" class="btn btn-info" >Group 3</a>
        </div>
        </div>

@endsection