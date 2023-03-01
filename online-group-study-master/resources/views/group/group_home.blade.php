@extends('group.group_comon')

@section('groupContent')
<div class="group-header">
    <div class="card mb-3">
    <img src="{{asset('/image/group/banner.jpg')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title" style="font-size: 18px">Group name</h5>
        <p class="card-text" style="font-size: 16px">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text" style="font-size: 16px"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    </div>
</div>


@stop
