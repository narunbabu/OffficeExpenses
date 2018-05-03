@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.todayattendance.title')</h3>
    <center>
        <table class="table table-hover table-bordered">
            <tr>
                <th>Date</th>
                <th>Username</th>
                <th>In</th>
                <th>Out</th>
                <th>Operations</th>
            </tr>
            <tbody id="myTable">
                @foreach ($attendances as $attendance)
                    <tr>
                        <td>
                            {{ $attendance->date }}
                        </td>
                        <td>
                            {{ $attendance->username }}
                        </td>
                        <td>
                            {{ $attendance->in }}
                        </td>
                        <td>
                            {{ $attendance->out }}
                        </td>
                        <td>
                            <a href="/admin/attendance/details/{{ $attendance->id }}">Details</a> |
                            
                            <a href="/admin/attendance/edit/{{ $attendance->id }}">Edit</a> | 
                        
                            <a href="/admin/attendance/delete/{{ $attendance->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
		</table>
        <br>
        <button class="btn btn-info block m-b" onclick="exportTableToCSV('attendance.csv')">Export To CSV File</button>
    </center>
    <!-- for add attendance -->
    <h3 class="page-title">@lang('quickadmin.addattendance.title')</h3>
    <!-- <form class="m-t" method="post" action="{{ route('trytoaddattendance') }}" enctype="multipart/form-data"> -->
    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

        {!! Form::Open(array('route' => 'trytoaddattendance','method' => 'POST')) !!}
 
        
        <!-- <div class="panel-body table-responsive"> -->
            {{--<div class="form-group" style="display:none">
                <div class="col-md-10" align="left"><label>Date</label></div>
                <div class="col-md-5">
                    <input class="form-control" type="text" id="date" value="{{date('Y-m-d')}}" name="date"  required="">
                </div>
            </div><br><hr>--}}
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>@lang('quickadmin.addattendance.fields.date')</th>
                        <!-- <th>@lang('quickadmin.addattendance.fields.present')</th> -->
                        <th>@lang('quickadmin.addattendance.fields.username')</th>
                        <th>@lang('quickadmin.addattendance.fields.intime')</th>
                        <th>@lang('quickadmin.addattendance.fields.outtime')</th>
                        <th>@lang('quickadmin.addattendance.fields.present')</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                <!-- <h4 style="color:#336699"><input type="checkbox" id="select_all"/> Check all</h4> -->
                    @foreach ($users as $user)
                        <tr>
                            <td>
                            <input class="form-control " id="date[]" type="text" name="date[]" value="{{date('Y-m-d')}}"   required=""></td>
                            <!-- <td><input class="checkbox" type="checkbox" id="" name="name[]" value="{{ $user }}"></td> -->
                            {{--  {{\Carbon\Carbon::createFromFormat('m/d/Y', '12/04/2018')}}  --}}
                            <td>{{ $user }}
                            </td>
                            <td>
                            <input class="" type="text" id="in" value="9:00 AM" name="in[]"  required="">
                             {{--  {!! Form::text('in','9:00',array('class' => 'form-control')) !!}  --}}
                             </td>
                            <td><input class="" type="text" id="out" value="6:00 PM" name="out[]"  required=""></td>
                            <td><input class="checkbox" type="checkbox" id="" name="name[]" value="{{ $user }}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{--  <script>
    jQuery(document).ready(function($) {
        $('.datepicker').datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>  --}}
            {{--  <div class="col-xs-12 col-sm-12 col-md-12" style="display:none">
                <div class="form-group">
                    <strong>Intime</strong>
                        {!! Form::text('in','9:00',array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" style="display:none">
                <div class="form-group">
                    <strong>Outtime</strong>
                        {!! Form::text('out','6:00',array('class' => 'form-control')) !!}
                </div>
            </div>  --}}

            <div class="col-xs-12 col-sm-12 col-md-12" style="display:none">
                <div class="form-group">
                    <strong>attendance</strong>
                        {!! Form::text('attendance','1',array('class' => 'form-control')) !!}
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-md-10" align="left">
                    <input type="submit" value="Create" class="btn btn-primary block full-width m-b" />
                </div>
            </div>
        <!-- </div> -->
    {!! form::close() !!}
@endsection