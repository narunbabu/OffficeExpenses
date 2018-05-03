@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.addattendance.title')</h3>
        {{--<form class="m-t" method="post" action="{{ route('trytoaddattendance') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Date</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="date" name="date" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Username</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="username" name="username" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Attendance</label></div>
                    <div class="col-md-5">
                        <select class="form-control" id="attendance" name="attendance" >
                            <option value='0'>obsent</option>
                            <option value='1'>present</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>In Time</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="in" name="in" placeholder="In Time">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Out Time</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="out" name="out" placeholder="Out Time"></input>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left">
                        <input type="submit" value="Create" class="btn btn-primary block full-width m-b" />
                    </div>
                </div>
            </div>
        </form>--}}

        {!! Form::Open(array('route' => 'trytoaddattendance','method' => 'POST')) !!}
 
        <div class="panel-body table-responsive">
            {{--<div class="form-group" style="display:none">
                <div class="col-md-10" align="left"><label>Date</label></div>
                <div class="col-md-5">
                    <input class="form-control" type="text" id="date" value="{{date('Y-m-d')}}" name="date"  required="">
                </div>
            </div><br><hr>--}}
            <table class="table table-bordered table-striped">
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
                <tbody>
                <!-- <h4 style="color:#336699"><input type="checkbox" id="select_all"/> Check all</h4> -->
                    @foreach ($users as $user)
                        <tr>
                            <td><input class="" type="date" id="" value="{{date('Y-m-d')}}" name="date"  required=""></td>
                            <!-- <td><input class="checkbox" type="checkbox" id="" name="name[]" value="{{ $user }}"></td> -->
                            <td>{{ $user }}
                            </td>
                            <td>
                                {!! Form::text('in[]','9:00 AM',array('class' => '')) !!}
                            </td>
                            <td>
                                {!! Form::text('out[]','6:00 PM',array('class' => '')) !!}
                            </td>
                            <td><input class="checkbox" type="checkbox" id="" name="name[]" value="{{ $user }}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
     
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
 </div>
{!! form::close() !!}
@endsection