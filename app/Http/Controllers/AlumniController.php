<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;
use App\Tagslist;
use App\User;
use Auth;
use App\access;
use App\smember;

session_start();
class AlumniController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function open()
  {
    $message = '';
    return view('addalumni',compact('message'));
  }
  public function index()
  {
    //this alumni adds data of a new alumnus to database
    $this->validate(request(),[
      'name' => 'required',
      'email' => 'required',
      'mobile' => 'required',
      'dob' => 'required',
      'company' => 'required',
      'yog' => 'required',
      'dept' => 'required'
    ]);
    Alumni::create([
      'name' => request('name'),
      'email' => request('email'),
      'address' => request('address'),
      'city' => request('city'),
      'country' => request('country'),
      'mobile' => request('mobile'),
      'dob' => request('dob'),
      'company' => request('company'),
      'designation' => request('designation'),
      'hall' => request('hall'),
      'dept' => request('dept'),
      'yog' => request('yog'),
      'notes' =>" "
    ]);
    $message = 'Alumni has been added to databse succesfully!';
    return view('addalumni',compact('message'));
  }
  public function get()
  {
    //this function gives alumni data to coordinators
    $alumni = Alumni::get();
    $message = '';
    $tags = Tagslist::get();


    return view('viewdata',compact('message','tags','alumni'));
  }
  public function getyear($year)
  {
    //this function sends the alumni data of a particular year.However,currently it has been removed but can be added if needed.
    $alumni = Alumni::where('year',$year)->get();
    $message = '';
    $tags = Tagslist::get();



    return view('viewdata',compact('message','tags','alumni'));
  }
  public function editt($id)
  {
    //opens window where we can update data

    $alumni = Alumni::where('id',$id)->get();
    $message = '';
    $tags = Tagslist::get();


    return view('editdata',compact('alumni','message','tags'));
  }
  public function profile($id)
  {//opens a new window to open profile of a particular alumnus

    $alumni = Alumni::where('id',$id)->get();


    return view('profile',compact('alumni'));
  }
  public function editdata()
  {//updates data of the aluumnus in database

    /*
    $alum=Alumni::find(request('id'));
    $alum->delete();


    $this->validate(request(),[
    'name' => 'required',
    'email' => 'required',
    'address' => 'required',
    'city' => 'required',
    'country' => 'required',
    'mobile' => 'required',

    'dob' => 'required',
    'industry' => 'required',
    'year' => 'required',
  ]);*/
  $tags = Tagslist::get();
  Alumni::where('id', request('id'))
  ->update([
    'id'=>request('id'),
    'name' => request('name'),
    'email' => request('email'),
    'address' => request('address'),
    'city' => request('city'),
    'country' => request('country'),
    'mobile' => request('mobile'),
    'dob' => request('dob'),
    'company' => request('company'),
    'designation' => request('designation'),
    'hall' => request('hall'),
    'dept' => request('dept'),
    'yog' => request('yog'),
  ]);
  $alumni = Alumni::get();
  $message = '';
  if(Auth::user()->type == 'CO' )
  return redirect('/viewdata')->with('message','Profile of alum updated!');
  else
  return redirect('/viewdata_s')->with('message','Profile of alum updated!');

}



public function get_s()
{
  //this function gives alumni data to student members
  $user_name = Auth::user()->name;

  $student_id = smember::where('name',$user_name)->first()->id;
  //dd($student_id);
  $arr = access::where('stud_id',$student_id)->pluck('access');


  $accesses = [];
  foreach ($arr as $access)
  {
    array_push($accesses,explode(',',$access));
  }
  // dd($accesses);

  $tags_list = [];

  foreach ($accesses as $access )
  {
    array_pop($access);
    $tags = [];

    foreach($access as $a )
    {
      if($a <= 1955)
      {
        if((Tagslist::find($a))!=null)
        {
          $tag = Tagslist::find($a)->tagname;
          array_push($tags, $tag);
        }
        else
        {
          $tags = [];
          break;
        }
      }
      else
      {
        array_push($tags, $a);
      }

    }
    if(!empty($tags))
    array_push($tags_list, $tags);

  }
  // dd($tags_list);

  return view('viewdata_s',compact('tags_list'));
}
public function editnotes($id)
{
  //each alumni has some notes attatched to it for reference which can be editted here
  Alumni::where('id', $id)
  ->update([

    'notes' => request('comment'),
  ]);
  $alumni = Alumni::where('id',$id)->get();
  $message = '';
  $tags = Tagslist::get();


  return redirect('/profile/'.$id)->with('message','Notes updated!!');
}
}
