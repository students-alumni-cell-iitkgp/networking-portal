<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->confirmation == 0)
            {
                return redirect('/logout')->with('message','Your account has not been activated by Admin ');
            }
        else
        {   
            if(Auth::user()->type == 'SM')
                return view('studentmember');
            elseif(Auth::user()->type == 'CO')
                return view('coordinator');
            else
                return view('auth.login');
         }
    }
    
}
