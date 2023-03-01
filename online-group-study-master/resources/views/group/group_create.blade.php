@extends('master')
@section('title')
 Online Group Study | group
@stop 
@section('content')

<div class="groupcreate-box">
      <h1>create group</h1>
      <form action="{{route('group.store')}}" class="group-form" method="POST">
          <!-- Equivalent to... -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <label>Group name</label>
        <input type="text" name="gname" placeholder="give the group name" class="box" value="{{old('fname')}}"/>
        <div class="validation_error">{{$errors->first('gname')}}</div>
        
        <input type="submit" value="Submit" class="gs-btn"/>
      </form>
    </div>



@stop