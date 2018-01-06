@extends('layouts.app')

@section('content')
<script type="text/javascript">
  function call()
  {
    window.location = '/viewdata';
  }
  function addtag()
  {
    window.location = '/addtag';
  }
  function access()
  {
    window.location = '/access';
  }
  function add()
  {
    window.location = '/addalumni';
  }

</script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

  <!-- Page Container -->
  <div class="w3-content w3-margin-top" style="max-width:1400px;">
    <!-- Modal -->
    <div class="modal fade" id="modal1" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Change Profile Picture.</h4>
          </div>
          <div class="modal-body">
            <form action="/upload_pic" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              @if (count($errors) > 0)
              <script type="text/javascript">
                alert('<?php foreach($errors->all() as $error) { echo "$error"; } ?>');
              </script>
              @endif
              <div class="form-group">
                <label for="exampleInputFile">Upload Profile Picture</label>
                <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">Choose image of format jpeg,jpg,png and size less than 500 Kb</small>
              </div>

              <div class="form-group">
               <button type="submit" class="btn btn-primary"  >Submit</button>
             </div>
           </form>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <!-- The Grid -->
  <div class="w3-row-padding">

    <!-- Left Column -->
    <div class="w3-third">

      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">

         <a class="modal-trigger" href="#modal1" data-toggle="modal" data-target="#modal1">
          @if(file_exists(Auth::user()->pro_pic))
          <img src="<?php if (!empty(Auth::user()->pro_pic)){echo Auth::user()->pro_pic; } else { echo 'avatar_hat.jpg';}?>" style="width:100%" alt="Avatar">
          @else
          <img src="<?php echo 'avatar_hat.jpg';?>" style="width:100%" alt="Avatar">
          @endif
          <figcaption class="figure-caption text-right">Click on the image to change profile picture.</figcaption>
        </a>

        <div class="w3-display-bottomleft w3-container w3-text-black" style="background-color: white;">
          <h2>{{Auth::user()->name}}</h2>
        </div>
      </div>
      <div class="w3-container">
        <br>
        <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Coordinator</p>
        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Kharagpur</p>
        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>{{Auth::user()->email}}</p>
        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>{{Auth::user()->contact}}</p>
        <hr>

      </div>
    </div><br>

    <!-- End Left Column -->
  </div>

  <!-- Right Column -->
  <div class="w3-twothird">

    <div class="w3-container w3-card w3-white w3-margin-bottom">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal" ></i>VIEW DATA</h2>
      <div class="w3-container">
       <div class="btn-group btn-group-lg"><button type="button" class="btn btn-primary" onclick="call();">INFORMATION</button></div>
       <p>Click the button above to view all the networking data, give tags to alum and edit it if needed.</p>
       <hr>
     </div>
     <br />
     <div class="w3-container">
      <h5 class="w3-opacity"><b>TAGS</b></h5>
      <div class="btn-group btn-group-lg"><button type="button" class="btn btn-primary" onclick="addtag();">TAGS</button></div>

      <p>You can create tags and also delete them.Click the button to do it.</p>
      <hr>
    </div>
    <br />
    <div class="w3-container">
      <h5 class="w3-opacity"><b>ACCESS</b></h5>
      <div class="btn-group btn-group-lg"><button type="button" class="btn btn-primary" onclick="access();">ACCESS</button></div>
      <p>You can give access to student members of the data of alumni of our instituion.Click the button to see it. </p><br>
    </div>


    <br />
    <div class="w3-container">
      <h5 class="w3-opacity"><b>ADD ALUMNI</b></h5>
      <div class="btn-group btn-group-lg"><button type="button" class="btn btn-primary" onclick="add();">ADD</button></div>
      <p>You can add data of alumni of our instituion which are still not connected to us.Click the button to see it. </p><br>
    </div>
  </div>


  <!-- End Right Column -->
</div>

<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>




@endsection
<script type="text/javascript">

  $('#OpenImgUpload').click(function(){ $('#fileToUpload').trigger('click'); });
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#OpenImgUpload')
        .attr('src', e.target.result)
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $(document).ready(function() {
    $('select').material_select();
  });

  function update(){
    $('.edit_button').click(function(){
      $('.edit').show();$(".upload").hide();$(".edit_button").hide();
    });
  }
</script>
