<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TasksController extends Controller
{
    public function index(){
        $tasks = DB::table('tasks')->get();
        return view('admin.tasks.index', ['tasks' => $tasks]);
    }

    public function addTask(Request $request){

        return view('admin.tasks.addTask');

        // if($request->session()->has('currentUser')){
        //     return view('admin.tasks.addTask');
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function adminTasks(Request $request){

        $data = DB::table('tasks')->where('to', session('currentUser'))->get();
            return view('admin.tasks.myTasks', ['tasks' => $data]);
        
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('tasks')->where('to', session('currentUser'))->get();
        //     return view('admin.tasks.myTasks', ['tasks' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }
}
