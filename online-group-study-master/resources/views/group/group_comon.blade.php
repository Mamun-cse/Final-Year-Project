@extends('master')
@section('title')
 Online Group Study | {{$group->gname}}
@stop
@section('content')
<div class="container my-5 group-container">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-3">
                <img style="margin: 0 auto" src="{{asset('/image/group/logo.png')}}" class="img-fluid my-5" width="40%" alt="...">

            </div>
            <div class="card">

                <ul class="list-group list-group-flush" >
                    <li class="list-group-item">
                        <a style="font-size: 18px" href="{{route('group.home',['group_id'=>$group->id])}}"><i style="font-size: 18px" class="fa fa-home icon"> </i> Home</a>
                    </li>
                    <li class="list-group-item"><a style="font-size: 18px" href=""><i style="font-size: 18px" class="fa fa-edit icon"> </i> Edit Group</a></li>
                    <li class="list-group-item"><a style="font-size: 18px" href="{{route('group.all.members',$group->id)}}"><i style="font-size: 18px" class="fa fa-users icon"> </i> Group Members</a></li>
                    <li class="list-group-item"><a style="font-size: 18px" href="{{route('group.study.topics',$group->id)}}"><i style="font-size: 18px" class="fa fa-rocket icon"></i> Topics</a></li>
                </ul>

            </div>

        </div>
        <div class="col-md-9">

            <div class="group-post">
                @yield('groupContent')
            </div>
        </div>
    </div>
</div>

@stop
