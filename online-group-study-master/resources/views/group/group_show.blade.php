@extends('master')
@section('title')
 Online Group Study | all group
@stop 
@section('content')
<section class="groups "  id="groups">

    <h1 class="heading"> our <span>all groups</span> </h1>

    <div class="group-slider row">

        <!-- <div class="swiper-wrapper"> -->

            @foreach($groups as $group)
            <div class="box col-md-3 m-4">
            <!-- <img src="" alt="profile Pic" height="200" width="200"> -->
                <img src="{{URL::asset('/image/groupstudy1.jpg')}}" alt="">
                <h3>{{$group->gname}}</h3>
                <div class="details"> about group details </div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="{{route('join.group',$group->id)}}" class="gs-btn">join group</a>
            </div>
            @endforeach
            
            

        <!-- </div> -->

    </div>


</section>


@stop