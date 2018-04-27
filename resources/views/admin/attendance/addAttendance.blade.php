@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.addattendance.title')</h3>
        <form class="m-t" method="post" action="{{ route('trytoaddattendance') }}" enctype="multipart/form-data">
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
        </form>
@endsection