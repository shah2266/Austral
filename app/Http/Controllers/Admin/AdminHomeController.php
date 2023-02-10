<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users      = DB::table('users')->count();
        $projects   = DB::table('projects')->count();
        $events     = DB::table('events')->count();
        $employees  = DB::table('employees')->count();
        $services   = DB::table('services')->count();
        $pages      = DB::table('pages')->count();
        return view('admin.home', compact('projects','users','events','employees','services','pages'));
    }

    public function users() {
        $users = User::all();
        return view('admin.auth.users',compact('users'));
    }

    public function delete($id) {

        $deleteRow = User::where('id','=', $id)->where('email','!=','shaha2266@gmail.com')->delete();
        if(!empty($deleteRow)) {
            return redirect('/controlpanel/admin/register/manage')->with('success','User delete successfully');
        } else {
            return redirect('/controlpanel/admin/register/manage')->with('danger','You can\'t delete this user. This user is locked'); 
        }
        
    }
}
