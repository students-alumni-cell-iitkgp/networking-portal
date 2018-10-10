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
                    <form class="form-horizontal" method="POST" action="{{url('/addalumni')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>

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
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"  >

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
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}"  >

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
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}"  >

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
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"  >

                                @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('yog') ? ' has-error' : '' }}">
                            <label for="yog" class="col-md-4 control-label">Year of Graduation</label>

                            <div class="col-md-6">
                                <input id="yog" type="text" class="form-control" name="yog" value="{{ old('yog') }}"  >

                                @if ($errors->has('yog'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('yog') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">D.O.B</label>

                            <div class="col-md-6">
                                <input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob') }}"  >

                                @if ($errors->has('dob'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dob') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('hall') ? ' has-error' : '' }}">
                            <label for="hall" class="col-md-4 control-label">Hall of Residence</label>

                            <div class="col-md-6">
                                <input id="hall" type="text" class="form-control" name="hall" value="{{ old('hall') }}"  >

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
                                <input id="dept" type="text" class="form-control" name="dept" value="{{ old('dept') }}"  >

                                @if ($errors->has('dept'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dept') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company" class="col-md-4 control-label">Company</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}"  >

                                @if ($errors->has('company'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">designation</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control" name="designation" value="{{ old('designation') }}"  >

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
