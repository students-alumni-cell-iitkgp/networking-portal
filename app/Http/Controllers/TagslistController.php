<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagslist;
use App\Addtag;

class TagslistController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {//opens window where we can create/delete tags

    	$alumni = Tagslist::get();
    	return view('addtag',compact('alumni'));
    }


    public function postdata()
    {//adds a new tag to database

    	
        $this->validate(request(),[
            'name' => 'required',
            
        ]);
        strtoupper(request('name'));
       // dd(Tagslist::where('tagname',request('name'))->get()->toArray());
        if(Tagslist::where('tagname',request('name'))->get()->toArray() == null){
            Tagslist::create([
                'tagname' => request('name'),
            ]);

            return redirect('/addtag')->with('message','Tag was created succesfully!');
        }
        else
        {
          return redirect('/addtag')->with('Error','Tag already exists');
        }
    }
    public function deletedata()
    {  //deletes an existin tag from database
        //dd(request('tag'));
        $name_tag = Tagslist::find(request('tag'))->tagname;
        $alum_id_list = Addtag::where('tags',$name_tag)->get()->pluck('id')->toArray();
        Addtag::destroy($alum_id_list);
        Tagslist::destroy(request('tag')); 
        $alumni = Tagslist::get();

        return redirect('/addtag')->with('message','Tag was deleted succesfully!');
    }
}



