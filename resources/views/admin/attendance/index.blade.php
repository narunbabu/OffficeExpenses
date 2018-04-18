@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.todayattendance.title')</h3>
        <!-- @can('expense_category_create')
        <p>
            <a href="{{ route('admin.expense_categories.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
            
            @if(!is_null(Auth::getUser()->role_id) && config('quickadmin.can_see_all_records_role_id') == Auth::getUser()->role_id)
                @if(Session::get('ExpenseCategory.filter', 'all') == 'my')
                    <a href="?filter=all" class="btn btn-default">Show all records</a>
                @else
                    <a href="?filter=my" class="btn btn-default">Filter my records</a>
                @endif
            @endif
        </p>
        @endcan -->
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
@endsection