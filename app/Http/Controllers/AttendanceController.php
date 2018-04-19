<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use DB;

class AttendanceController extends Controller
{
    public function index(Request $request){
        // if (! Gate::allows('today_attendance_access')) {
        //     return abort(401);
        // }
        date_default_timezone_set('Asia/Dhaka');
        $date = date('Y-m-d', time());

        $attendance = DB::table('attendances')->where('date', $date)->get();
            return view('admin.attendance.index', ['attendances' => $attendance]);
        // return $request;
        // date_default_timezone_set('Asia/Dhaka');
        // $date = date('Y-m-d', time());

        // if($request->session()->has('currentUser')){
        //     $attendance = DB::table('attendance')->where('date', $date)->get();
        //     return view('admin.attendance.index', ['attendances' => $attendance]);
        // }
        // else{
        //     return 'fail';
        // }
    }

    public function all(Request $request){
        
        $attendance = DB::table('attendances')->get();
            return view('admin.attendance.all', ['attendances' => $attendance]);
        
        // if($request->session()->has('currentUser')){
        //     $attendance = DB::table('attendances')->get();
        //     return view('admin.attendance.all', ['attendances' => $attendance]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function searchByDate(Request $request){
        
        $date = $request->input('date');
        $result = DB::table('attendances')->where('date', $date)->get();
            return view('admin.attendance.results', ['result' => $result]);
        
        // if($request->session()->has('currentUser')){
        //     $date = $request->input('date');
        //     $result = DB::table('attendances')->where('date', $date)->get();
        //     return view('admin.attendance.results', ['result' => $result]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function searchByMonth(Request $request){

        $month = $request->input('month');
        $m="%%%%-".$month."-%%";

        $result = DB::select('SELECT * FROM `attendance` WHERE `date` LIKE ?', [$m]);
            return view('admin.attendance.results', ['result' => $result]);
        

        // if($request->session()->has('currentUser')){
        //     $month = $request->input('month');
        //     $m="%%%%-".$month."-%%";

        //     $result = DB::select('SELECT * FROM `attendance` WHERE `date` LIKE ?', [$m]);
        //     return view('admin.attendance.results', ['result' => $result]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function searchByYear(Request $request){
        
        $year = $request->input('year');
        $y=$year."-%%-%%";
            
        $result = DB::select('SELECT * FROM `attendance` WHERE `date` LIKE ?', [$y]);
            return view('admin.attendance.results', ['result' => $result]);
        
        // if($request->session()->has('currentUser')){
        //     $year = $request->input('year');

        //     $y=$year."-%%-%%";
        //     $result = DB::select('SELECT * FROM `attendance` WHERE `date` LIKE ?', [$y]);
        //     return view('admin.attendance.results', ['result' => $result]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function searchByUsername(Request $request){
        
        $username = $request->input('username');
            $result = DB::table('attendance')->where('username', $username)->get();
            return view('admin.attendance.results', ['result' => $result]);
        
        // if($request->session()->has('currentUser')){
        //     $username = $request->input('username');
        //     $result = DB::table('attendance')->where('username', $username)->get();
        //     return view('admin.attendance.results', ['result' => $result]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function getAttendance(Request $request, $id){
        
        $data = DB::table('attendances')->where('id', $id)->first();
            return view('admin.attendance.detailsAttendance', ['data' => $data]);
        
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('attendance')->where('id', $id)->first();
        //     return view('admin.attendance.detailsAttendance', ['data' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function editAttendance(Request $request, $id){
        
        $data = DB::table('attendances')->where('id', $id)->first();
            return view('admin.attendance.editAttendance', ['data' => $data]);
        
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('attendance')->where('id', $id)->first();
        //     return view('admin.attendance.editAttendance', ['data' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function addAttendance(Request $request){
        
         return view('admin.attendance.addAttendance');

        // return $request;
        
        // if($request->session()->has('currentUser')){
        //     return view('admin.attendance.addAttendance');
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function deleteAttendance(Request $request, $id){
        
        $data = DB::table('attendances')->where('id', $id)->first();
            return view('admin.attendance.deleteAttendance', ['data' => $data]);
        
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('attendance')->where('id', $id)->first();
        //     return view('admin.attendance.deleteAttendance', ['data' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function create(Request $request){
        
        $date = $request->input('date');
        $username = $request->input('username');
        $attendance = (int)$request->input('attendance');
        $in = $request->input('in');
        $out = $request->input('out');

        date_default_timezone_set('Asia/Dhaka');
        $currentDate = date('Y-m-d H:i:s', time());

        $data = array('date' => $date, 
                    'username' => $username, 
                    'attendance' => $attendance, 
                    'in' => $in, 
                    'out' => $out, 
                    'created_at' => $currentDate, 
                    'updated_at' => $currentDate);
        
        if(DB::table('attendances')->insert($data)){
            return redirect('/admin/attendance');
        }
        else{
            var_dump(DB::table('attendances')->insert($data));
        }
        return redirect('/admin/attendance');

        // if($request->session()->has('currentUser')){
        //     $date = $request->input('date');
        //     $username = $request->input('username');
        //     $attendance = (int)$request->input('attendance');
        //     $in = $request->input('in');
        //     $out = $request->input('out');

        //     date_default_timezone_set('Asia/Dhaka');
        //     $currentDate = date('Y-m-d H:i:s', time());

        //     $data = array('date' => $date, 'username' => $username, 'attendance' => $attendance, 'in' => $in, 'out' => $out, 'created_at' => $currentDate, 'updated_at' => $currentDate);

        //     if(DB::table('attendance')->insert($data)){
        //         return redirect('/admin/attendance');
        //     }
        //     else{
        //         var_dump(DB::table('attendance')->insert($data));
        //     }

        //     return redirect('/admin/attendance');
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    // public function update(Request $request){

    //     $id = $request->input('id');
    //     $name = $request->input('name');
    //     $username = $request->input('username');
    //     $position = $request->input('position');
    //     $admin = $request->input('admin');
    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     date_default_timezone_set('Asia/Dhaka');
    //     $date = date('Y-m-d H:i:s', time());

    //     $data = array('name' => $name, 
    //                 'username' => $username, 
    //                 'position' => $position, 
    //                 'admin' => $admin, 
    //                 'email' => $email, 
    //                 'password' => $password, 
    //                 'updated_at' => $date);

    //     if(DB::table('attendances')->where('id', $id)->update($data)){
    //         return redirect('/admin/attendance');
    //     }
    //     else{
    //         var_dump(DB::table('attendances')->where('id', $id)->update($data));
    //     }
        
        // if($request->session()->has('currentUser')){
        //     $id = $request->input('id');
        //     $name = $request->input('name');
        //     $username = $request->input('username');
        //     $position = $request->input('position');
        //     $admin = $request->input('admin');
        //     $email = $request->input('email');
        //     $password = $request->input('password');

        //     date_default_timezone_set('Asia/Dhaka');
        //     $date = date('Y-m-d H:i:s', time());

        //     $data = array('name' => $name, 'username' => $username, 'position' => $position, 'admin' => $admin, 'email' => $email, 'password' => $password, 'updated_at' => $date);

        //     if(DB::table('attendance')->where('id', $id)->update($data)){
        //         return redirect('/admin/attendance');
        //     }
        //     else{
        //         var_dump(DB::table('attendance')->where('id', $id)->update($data));
        //     }
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    // }

    public function delete(Request $request){

        $id = $request->input('id');

        DB::table('attendances')->where('id', '=', $id)->delete();

        return redirect('/admin/attendance');
        
        // if($request->session()->has('currentUser')){
        //     $id = $request->input('id');

        //     DB::table('attendance')->where('id', '=', $id)->delete();

        //     return redirect('/admin/attendance');
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function update(Request $request){
        
        $date = $request->input('date');
        $username = $request->input('username');
        $attendance = (int)$request->input('attendance');
        $in = $request->input('in');
        $out = $request->input('out');

        date_default_timezone_set('Asia/Dhaka');
        $currentDate = date('Y-m-d H:i:s', time());

        $data = array('date' => $date, 
                    'username' => $username, 
                    'attendance' => $attendance, 
                    'in' => $in, 
                    'out' => $out, 
                    'created_at' => $currentDate, 
                    'updated_at' => $currentDate);
        
        if(DB::table('attendances')->insert($data)){
            return redirect('/admin/attendance');
        }
        else{
            var_dump(DB::table('attendances')->insert($data));
        }
        return redirect('/admin/attendance');
    }
}
