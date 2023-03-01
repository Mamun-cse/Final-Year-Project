@extends('master')
@section('title')
 Online Group Study | registration
@stop 
@section('content')

    <div class="signup-box">
      <h1>Sign Up</h1>
      <form action="/registration/store" class="reg-form" method="POST">
          <!-- Equivalent to... -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <label>First Name</label>
        <input type="text" name="fname" placeholder="First Name" class="box" value="{{old('fname')}}"/>
        <div class="validation_error">{{$errors->first('fname')}}</div>
        <label>Last Name</label>
        <input type="text" name="lname" placeholder="Last Name" class="box" value="{{old('lname')}}"/>
        <div class="validation_error">{{$errors->first('lname')}}</div>
        <label>Email</label>
        <input type="email" name="email" placeholder="Email" class="box" value="{{old('email')}}"/>
        <div class="validation_error">{{$errors->first('email')}}</div>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" class="box" value="{{old('password')}}"/>
        <div class="validation_error">{{$errors->first('password')}}</div>
        <label>Confirmed Password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="box" value="{{old('password_confirmation')}}"/>
        <div class="validation_error">{{$errors->first('password_confirmation')}}</div>
        <input type="submit" value="Submit" class="gs-btn"/>
      </form>
    </div>


@stop