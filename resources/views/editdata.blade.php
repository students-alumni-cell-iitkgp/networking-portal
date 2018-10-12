@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADD ALUMMI</div>

                <div class="panel-body">
                    @if($message!='')
                    <div class="alert alert-success">
                        <strong>Message :</strong>{{$message }}
                    </div>
                    <br>
                    @endif
                     @foreach($alumni as $alum)
                    <form class="form-horizontal" method="POST" action="{{ url('/editalumnidata')}}">
                        {{ csrf_field() }}


                            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            <label for="id" class="col-md-4 control-label" >ID</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id"  value="{{$alum['id']}}" autofocus readonly>

                                @if ($errors->has('id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label" >Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"  value="{{$alum['name']}}" autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{$alum['email']}}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hall') ? ' has-error' : '' }}">
                            <label for="hall" class="col-md-4 control-label">Hall of Residence</label>

                            <div class="col-md-6">
                                <input id="hall" type="text" class="form-control" name="hall" value="{{$alum['hall']}}"  >

                                @if ($errors->has('hall'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('hall') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('dept') ? ' has-error' : '' }}">
                            <label for="dept" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                <input id="dept" type="text" class="form-control" name="dept" value="{{$alum['dept']}}"  >

                                @if ($errors->has('dept'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dept') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('yog') ? ' has-error' : '' }}">
                            <label for="yog" class="col-md-4 control-label">Year of graduation</label>

                            <div class="col-md-6">
                                <input id="yog" type="text" class="form-control" name="yog" value="{{$alum['yog']}}"  >

                                @if ($errors->has('yog'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('yog') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>







                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{$alum['address']}}"  >

                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{$alum['city']}}" >

                                @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{$alum['country']}}"  >

                                @if ($errors->has('country'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{$alum['mobile']}}"  >

                                @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Year</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control" name="year" value="{{$alum['year']}}"  >

                                @if ($errors->has('year'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('year') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">D.O.B</label>

                            <div class="col-md-6">
                                <input id="dob" type="text" class="form-control" name="dob" value="{{$alum['dob']}}"  >

                                @if ($errors->has('dob'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dob') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company" class="col-md-4 control-label">Company</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="company" value="{{$alum['company']}}"  >

                                @if ($errors->has('company'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="designation" value="{{$alum['designation']}}"  >

                                @if ($errors->has('designation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('designation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
