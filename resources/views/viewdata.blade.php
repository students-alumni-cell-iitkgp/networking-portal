<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>


  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {


    $('#example').DataTable(
    {
     "columns": [

     { "searchable": false },
     null,
     null,
     null,
     null,
     { "searchable": false },
     { "searchable": false },
     null,
     { "searchable": false },
     ]
   });
   document.getElementById("mySidenav").style.width = "250px";
   document.getElementById("main").style.marginLeft = "250px";
 } );

 function copy_mail(element) {

 var $temp = $("<input>");
 $("body").append($temp);
 $temp.val($(element).text()).select();
 document.execCommand("copy");
 $temp.remove();
 alert("Emails have been succesfully copied!");
}
</script>
</head>
<body>
  @include('layouts.navbar')

  
  
  <div class="container">
    @if($message!='')
    <div class="alert alert-success">
      <strong>Message :</strong>{{$message }}
    </div>
    <br>
    @endif
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
    To <strong>copy</strong> all the emails in the page : <button type="button" class="btn btn-primary" id="copy_mail" onclick="copy_mail('.email')">COPY</button>
    <br>
    <table id="example" class="display" cellspacing="0" width="100%">
      <thead>
       <tr>
        <th>ID</th>
        <th>ALUMNI</th>
        <th>EMAIL</th>
        <th>INDUSTRY</th>
        <th>TAGS</th>
        <th>ADD TAG TO ALUM</th>
        <th>DELETE TAG</th>
        <th>Year</th>
        <th>Edit Data</th>
      </tr>
    </thead>
    <tbody>
      @foreach($alumni as $alum)
      <tr>
        <td>{{$alum['id']}}</td> 
        <td><a href="/profile/{{$alum['id']}}">{{$alum['name']}}</a></td>        
        <td class="email">{{$alum['email'].' '}}</td>
        <td>{{$alum['industry']}}</td>
        <td><?php
        $tags_a = App\Addtag::where('alum_id',$alum['id'])->pluck('tags');
        foreach ($tags_a as $tag_a)
        {
          echo $tag_a.'        ';  
        }
        ?>
      </td>

      <td>
        <form action="/assigntag/{{$alum['id']}}" method="post">
          {{csrf_field()}}
          <select name="tag" id="{{$alum['id']}}" class="form-control">
            @foreach($tags as $tag)
            <option value="{{$tag['tagname']}}">{{$tag['tagname']}}</option>
            @endforeach
          </select>
          
           <div class="form-group"> 
          <button type="submit" style="background:none; border:none;">
           <span class="glyphicon glyphicon-plus"></span>
         </button>
         </div>
       </form>
     </td>

     <td>
      <form action="/taggdelete/{{$alum['id']}}" method="POST">
        {{csrf_field()}}
        <?php
        $tags_a = App\Addtag::where('alum_id',$alum['id'])->get();
        ?>
        <select name="tagd" id="{{$alum['id']}}" class="form-control">
          @foreach($tags_a as $tag_a)
          <option value="{{$tag_a['id']}}">{{$tag_a['tags']}}</option>
          @endforeach
        </select>
        @if(sizeof($tags_a)>0)
        <button type="submit" style="background:none; border:none;">
          <span class="glyphicon glyphicon-trash"></span>
        </button>
        @endif
      </form>
    </td>

    <td>{{$alum['year']}}</td>
    <td>  
      <a href="/editalum/{{$alum['id']}}">
        <span class="glyphicon glyphicon-edit"></span>
      </a>

    </td>

  </tr>
  @endforeach
</tbody>
</table>
</div>


<script type="text/javascript">
  // For demo to fit into DataTables site builder...
  $('#example')
  .removeClass( 'display' )
  .addClass('table table-striped table-bordered');
</script>
</body>
</html>