@extends('layouts.app')

@section('content')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<div class="container">
  <h2>TAGS LIST</h2>    
   @if (session('message'))
  <div class="alert alert-success">
    <strong>Message : {{ session('message') }}</strong>
  </div>
  @endif
  @if (session('Error'))
  <div class="alert alert-danger">
    <strong>Error : {{ session('Error') }}</strong>
  </div>
  @endif
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>TAGNAME</th>


      </tr>
    </thead>
    <tbody>

      @foreach($alumni as $alum)
      <tr>
        <td>{{$alum['id']}}</td>        
        <td>{{$alum['tagname']}}</td>
        
        
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
<br /><br />




<div class="container">
  <h2>CREATE NEW TAG</h2> 

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Create</div>
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="\addtag">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">Tag Name</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Create
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <h2>DELETE TAG</h2>  
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Create
        </div>

        <div class="panel-body">

          <form class="form-horizontal" method="POST" action="/deletetag">
            {{ csrf_field() }}  
            <div class="form-group">        
              <label for="name" class="col-md-4 control-label">Tag List</label>
              <div class="col-md-6">
                <select name="tag" id="tag" class="form-control">
                 @foreach($alumni as $tag)
                 <option value="{{$tag['id']}}">{{$tag['tagname']}}</option>
                 @endforeach
               </select>
             </div>
           </div>

           <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
              <button type="submit" class="btn btn-primary">
                Delete
              </button>               
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>


@endsection