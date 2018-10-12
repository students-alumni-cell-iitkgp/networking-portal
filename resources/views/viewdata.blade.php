<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>

  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
  <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>


  <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    var clipboard = new ClipboardJS('.btn');


    $('#example').DataTable(
      {
        "columns": [

          { "searchable": false },
          null,
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
      // document.getElementById("mySidenav").style.width = "250px";
      // document.getElementById("main").style.marginLeft = "250px";
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
      <br>

      <form method="post" action="{{ url('/assign_multiple_tag')}}" class="form-inline">
        {{ csrf_field() }}
        Select <b>checkboxes</b> to add tags to multiple alumni :
        <div class="form-group">
          <select name="multiple_tag_name" class="form-control" disabled>
            @foreach($tags as $tag)
              <option value="{{$tag['tagname']}}">{{$tag['tagname']}}</option>
            @endforeach
          </select>
        </div>

        <input type="hidden" name="tags_multiple_id" >
        <div class="form-group">
          <button type="submit" name="submit_multiple" class="btn btn-primary" disabled>
            Add Tag
          </button>
        </div>

      </form>


      <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>
              ID
            {{-- <input type="checkbox" name="select_all" value=""> --}}
            </th>
            <th>ALUMNI</th>
            <th>EMAIL</th>
            <th>COMPANY</th>
            <th>DESIGNATION</th>
            <th>TAGS</th>
            <th>ADD TAG TO ALUM</th>
            <th>DELETE TAG</th>
            <th>Year</th>
            <th>Edit Data</th>
          </tr>
        </thead>
        <tbody>
          @foreach($alumni as $alum)
            <tr id="row{{$alum['id']}}">
              <td>
                {{$alum['id']}}
                <input type="checkbox" name="alum_selected" value="{{$alum['id']}}">
              </td>
              <td><a href="{{url('/profile/'.$alum['id'])}}">{{$alum['name']}}</a></td>
              <td class="email">
                <span id="copy{{ $alum['id'] }}"> {{$alum['email'].' '}} </span>
                @if($alum['email'])
                  <button class="btn" data-clipboard-target="#copy{{ $alum['id']}}">
                    <img src="https://clipboardjs.com/assets/images/clippy.svg" alt="Copy to clipboard" style="height: 18px; width: 18px;">
                  </button>
                @endif
              </td>
              <td>{{$alum['company']}}</td>
              <td>{{$alum['designation']}}</td>
              <td><?php
              $tags_a = App\Addtag::where('alum_id',$alum['id'])->pluck('tags');
              foreach ($tags_a as $tag_a)
              {
                echo $tag_a.'        ';
              }
              ?>
            </td>

            <td>
              <form action="{{ url('/assigntag/'.$alum['id'])}}" method="post">
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
              <form action="{{ url('/taggdelete/'.$alum['id'])}}" method="POST">
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
              <a href="{{url('/editalum/'.$alum['id'])}}">
                <span class="glyphicon glyphicon-edit"></span>
              </a>

            </td>

          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <script type="text/javascript">

  $('#example')
  .removeClass( 'display' )
  .addClass('table table-striped table-bordered');
  // var checkbox_all = document.querySelector('input[name=select_all]');
  // checkbox_all.addEventListener('change',function selectAllCheckbox() {
  //
  // })

  var checkboxes = document.querySelectorAll('input[type=checkbox]');
  var select = document.querySelector('select[name=multiple_tag_name]');
  var button = document.querySelector('button[name=submit_multiple]');
  var hidden_input = document.querySelector('input[name=tags_multiple_id]');
  var trows = document.querySelectorAll(`tr`);

  var alum_multiple_id = [];
  // checkboxes.addEventListener('chec')
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change',function functionName() {

      if(checkbox.checked){
        //console.log(tr);
        var tr = trows.item(checkbox.value);
        tr.style.background = '#d4d2d2';
        // console.log(tr);
        alum_multiple_id.push(checkbox.value);
        hidden_input.value = alum_multiple_id;
      }
      else {
        var pos = alum_multiple_id.indexOf(checkbox.value);
        if(pos > -1){
          alum_multiple_id.splice(pos,1);
        }
        hidden_input.value = alum_multiple_id;
        var tr = trows.item(checkbox.value);

        tr.style.background = (checkbox.value % 2 == 0) ? '#fff' : '#f9f9f9';
      }

      if(hidden_input.value.length){
        select.disabled = false;
        button.disabled = false;
      }
      else {
        select.disabled = true;
        button.disabled = true;
      }
      // console.log(hidden_input);
    })
  });
</script>
</body>
</html>
