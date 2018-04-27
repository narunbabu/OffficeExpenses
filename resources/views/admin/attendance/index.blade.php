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
 
        
        <div class="panel-body table-responsive">
            <div class="form-group">
                <div class="col-md-10" align="left"><label>Date</label></div>
                <div class="col-md-5">
                    <input class="form-control" type="text" id="date" name="date" required="">
                </div>
            </div><br><hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>@lang('quickadmin.addattendance.fields.present')</th>
                        <th>@lang('quickadmin.addattendance.fields.username')</th>
                        <th>@lang('quickadmin.addattendance.fields.intime')</th>
                        <th>@lang('quickadmin.addattendance.fields.outtime')</th>
                        <!-- <th>@lang('quickadmin.addattendance.fields.present')</th> -->
                    </tr>
                </thead>
                <tbody>
                <!-- <h4 style="color:#336699"><input type="checkbox" id="select_all"/> Check all</h4> -->
                    @foreach ($users as $user)
                        <tr>
                            <td><input class="checkbox" type="checkbox" id="" name="name[]" value="{{ $user }}"></td>
                            <td>{{ $user }}
                            </td>
                            <td>9:00</td>
                            <td>6:00</td>
                            <!-- <td><input type="checkbox" id="select-all" name="name" value="{{ $user }}"></td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="col-xs-12 col-sm-12 col-md-12" style="display:none">
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
            </div>

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










        {{--<form class="m-t" method="post" action="{{ route('trytoaddattendance') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-vertical">
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

        {{-- <div class="panel-body table-responsive">
           <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('user_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <th>@lang('quickadmin.users.fields.role')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr data-entry-id="{{ $user->id }}">
                                @can('user_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $user->name }}</td>
                                <td field-key='email'>{{ $user->email }}</td>
                                <td field-key='role'>{{ $user->role->title or '' }}</td>
                                                                <td>
                                    @can('user_view')
                                    <a href="{{ route('admin.users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('user_edit')
                                    <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('user_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div> --}}
@endsection