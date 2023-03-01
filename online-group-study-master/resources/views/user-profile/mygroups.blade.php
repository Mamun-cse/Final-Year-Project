@extends('profile_master')
   @section('profile_content')
   @livewire('my-groups', ['mygroups' => $mygroups])
 @stop
