@extends('master')
@section('title')
 Online Group Study
@stop
@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-md-3">

            <ul class="profile-side-nav border border-1">
                <li><a href="#">Profile Info </a></li>
                <li><a href="#">Account Setting </a></li>
                <li><a href="#">Security </a></li>
                <li><a href="#">Notification </a></li>
                <li><a href="{{route('profile.group')}}">My groups </a></li>
                <li><a href="{{route('profile.exam.index')}}">Exam</a></li>
            </ul>
        </div>
        <div class="profile-right col-md-9">
            @yield('profile_content')

        </div>
    </div>
</div>

@stop
@push('js')
<script>
 window.addEventListener('openProfileEditModal',function(e){
    $("#profileUpdateModal").modal('show');

});


</script>
@endpush
