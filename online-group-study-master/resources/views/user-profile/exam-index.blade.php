@extends('profile_master')
   @section('profile_content')
   @livewire('my-exam', ['mygroups' => $mygroups])
 @stop
