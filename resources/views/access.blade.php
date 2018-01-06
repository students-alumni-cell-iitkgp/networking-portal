<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
    $('#smtable').DataTable();
  });
</script>

</head>
<body>




 @include('layouts.navbar')

 <div class="container">
  <h2>STUDENT MEMBERS DETAILS</h2> 
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

  <table id="smtable" class="table table-striped">
    <thead>
      <tr>

        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>ACESS GIVEN</th>
        <th>DELETE ACCESS</th>

      </tr>
    </thead>
    <tbody>

      @foreach($smembers as $member)
      <tr>
        <td>{{$member['id']}}</td>     
        <td>{{$member['name']}}</td>        
        <td>{{$member['email']}}</td>
        <td><?php
        $arr = App\access::where('stud_id',$member['id'])->pluck('access');
          //        print_r($arr);

        $accesses = [];
        foreach ($arr as $access)
        {
         array_push($accesses,explode(',',$access));            
       }
         //dd($accesses);

       $tags_list = [];

       foreach ($accesses as $access )
       {
        array_pop($access);
        $tags_a = [];

        foreach($access as $a )
        {
          if($a <= 1955)
          {
           if((App\Tagslist::find($a))!=null)
             {
               $tag_a = App\Tagslist::find($a)->tagname;
               array_push($tags_a, $tag_a);
             }
             else
             {
              $tags_a = [];
              break;
            }
          }
          else
          {
            array_push($tags_a, $a);
          }
          //dd($tags_a);
        }

        if(!empty($tags))
          array_push($tags_list, $tags_a);

      }
      //dd($tags_list);
      echo '<ul>';
      foreach ($tags_list as $t ) {
        if(!empty($t)){
          echo '<li>';
          foreach($t as $a){
            echo $a.'  ';
          }
          echo '</li>';
        }
      }
      echo '<ul>';

      ?></td>
      <td>
        <form action="/accessdelete" method="POST">
          {{csrf_field()}}
          
          <select name="access_del"  class="form-control">
            @foreach($tags_list as $t)
              @php
              $acces_name = '';
              foreach($t as $a)
              {
                $acces_name = $acces_name.$a.' ';
              }
              if(!empty($acces_name))
                echo '<option value="'.$acces_name.'">'.$acces_name.'</option>';

              @endphp

            @endforeach
          </select>

          @if(sizeof($tags_list)>1)
          <button type="submit" style="background:none; border:none;">
            <span class="glyphicon glyphicon-trash"></span>
          </button>
          @endif
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

<br>
<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-heading">Give Access</div>

        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="/access">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="tag" class="col-md-4 control-label">Student Member</label>

              <div class="col-md-6">

                <select name="tag" class="form-control">
                  <option value="0">Select the name of students</option>
                  @foreach($smembers as $tag)
                  <option value="{{$tag['name']}}">{{$tag['name']}}</option>
                  @endforeach
                </select>

              </div>
            </div>

            <div class="form-group">
              <label for="Tags" class="col-md-4 control-label">Tags</label>

              <div class="col-md-6">
                @foreach($tags as $tag)
                <div>
                  <label>{{$tag['tagname']}}</label>
                  <div class="checkbox">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="{{$tag['id']}}" id="tagid_{{$tag['id']}}" value="{{$tag['id']}}"> Yes
                    </label>
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="{{$tag['id']}}" id="tagid_{{$tag['id']}}" checked="checked" value="0"> No
                    </label>

                  </div>
                </div>
                @endforeach
              </div>
            </div>

            <div class="form-group">
              <label for="year" class="col-md-4 control-label">Year</label>

              <div class="col-md-6">

                <select name="year" class="form-control">
                  <option value="0">Select the year</option>
                  @for($year=1955;$year<=2016;$year++)

                  <option value="{{$year}}">{{$year}}</option>

                  @endfor
                </select>

              </div>
            </div>

            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Submit
                </button>
              </div>
            </div>

          </form>
        </div>
        <div class="panel-footer">
          <strong>Note :</strong> Clicking on more than one tag will give them acces to those alums which have all the chosen tags.
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  // For demo to fit into DataTables site builder...
  $('#smtable')
  .removeClass( 'display' )
  .addClass('table table-striped table-bordered');
</script>


</body>
</html>           