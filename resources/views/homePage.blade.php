@extends('layouts.MainLayout')

@section('main-content')




{{-- This has to be in different PAge  --}}
        <h1>Schedule  Page </h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Center</th>
                    <th scope="col">Group Number</th>
                    <th scope="col">Group Day</th>
                    <th scope="col">Group Time</th>
                    

                </tr>
                @foreach ($centers as $center )
                    <tr>
                        <th scope="row">
                            {{$center->center_name}}
                        </th>

                        <th scope="row">
                            {{$center->group_number}}
                        </th>

                        
                        <th scope="row">
                            {{$center->group_day}}
                        </th>

                        <th scope="row">
                            {{$center->group_time}}
                        </th>
                    </tr>
                @endforeach


                
</tbody>
</table>













@endsection