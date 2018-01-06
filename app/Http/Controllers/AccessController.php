<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\smember ;
use App\Tagslist;
use App\access;


class AccessController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

  public function index()
  {
    //opens a window where we can manage accesses to a student member by a coordinator
   $smembers  = smember::get();
   $tags = Tagslist::get();
   return view('access',compact('smembers','tags')) ;  
 }



 public function post()
 {//creates a new access to a Student Member in database by creating a code which contains id of all the access given to them

  if(request('tag')=="0")
  {


    return redirect('/access')->with('Error','Select student member');
  }

  else
  {
    $flag=0;
    $access='';
    $tags = Tagslist::get();
    $smembers  = smember::get();
    foreach($tags as $tag)
    {

     if(request($tag['id']) != 0)
     {
      $access=$access . request($tag['id']) . ',';
      $flag=1;
    }


  }
  if(($flag==0) && request('year')==0)
  {

    return redirect('/access')->with('Error','Select atleast one access');
  }
  if(request('year')!=0)
    $access = $access . request('year'). ',';

  foreach($smembers as $sm)
  {
    if($sm['name']==request('tag'))
      $id=$sm['id'];
  }

  $a = access::where('stud_id',$id)->where('access',$access)->get();
  $b = $a->toArray();
  if($b == null){
    access::create([

      'stud_id' =>$id,
      'name' => request('tag'),
      'access' => $access,

    ]);

    return redirect('/access')->with('message','Access was given succesfully!');
  }
  else
  {
   return redirect('/access')->with('Error','Access already exist.');
 }
}
} 
public function deleteAccess()
{
  //deletes an existing access to a Student Member
  $access = request('access_del');
  $arr = explode(' ', $access);
  $access_id = '';
  foreach ($arr as $a) {
    if(is_numeric($a)==true)
    {
      $access_id = $access_id.$a.',';
    }
    else
    {
      $id= Tagslist::where('tagname',$a)->pluck('id')->toArray();
      if(!empty($a))
      {
        $access_id = $access_id.$id[0].',';
      }

    }
  }
  $access_get = access::where('access',$access_id)->get()->toArray();
  $access_get = $access_get[0];
  if(access::destroy($access_get['id']))
    return redirect('/access')->with('message','Access was deleted succesfully!');
    else
      return redirect('/access')->with('Error','Access couldnot be deleted');
  }

}

