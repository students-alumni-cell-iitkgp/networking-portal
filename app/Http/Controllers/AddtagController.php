<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addtag;
use App\Alumni;
use App\Tagslist;
use Auth;
class AddtagController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index($id)
  {
    //function adds a new tag to an alumnus and stores it in database
    $a = Addtag::where('alum_id',$id)->where('tags',request('tag'))->get();
    $b = $a->toArray();

    if($b != null)
    {
      if(Auth::user()->type == 'CO' )
      return redirect('/viewdata')->with('Error','Tag already exists for that alum');
      else
      return redirect('/viewdata_s')->with('Error','Tag already exists for that alum');

    }
    else{
      Addtag::create([
        'alum_id' => $id,

        'tags' => request('tag'),

      ]);
    }

    if(Auth::user()->type == 'CO' )
    return redirect('/viewdata')->with('message','Tag has been added sucessfully');
    else
    return redirect('/viewdata_s')->with('message','Tag has been added sucessfully');
  }
  public function delete($id)
  {
    //deletes existing tag assigned to an alumnus

    $alum=Addtag::find(request('tagd'));
    $alum->delete();
    if(Auth::user()->type == 'CO' )
    return redirect('/viewdata')->with('message','Tag has been deleted sucessfully');
    else
    return redirect('/viewdata_s')->with('message','Tag has been deleted sucessfully');

  }

  public function assign_multiple(Request $req){
    // echo $req->input('tags_multiple_id');
    $id_arr =  explode(',',$req->input('tags_multiple_id'));
    // print_r($id_arr);
    foreach ($id_arr as $id) {

      $a = Addtag::where('alum_id',$id)->where('tags',$req->input('multiple_tag_name'))->get();
      $b = $a->toArray();

      if($b != null)
      {
        continue;
      }
      else{
        Addtag::create([
          'alum_id' => $id,
          'tags' => $req->input('multiple_tag_name'),

        ]);
      }
    }
    if(Auth::user()->type == 'CO' )
    return redirect('/viewdata')->with('message','Multiple Tag has been added sucessfully');
    else
    return redirect('/viewdata_s')->with('message','Tag has been added sucessfully');
  }

}
