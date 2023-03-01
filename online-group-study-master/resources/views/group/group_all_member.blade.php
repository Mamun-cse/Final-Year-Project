@extends('group.group_comon')

@section('groupContent')

<div class="card">

    <div class="card-body">
        <h3 class="card-title py-3">All Group Members</h3>
        <table class="table table-bordered">
            <tr>
                <th style="font-size: 18px">Member name</th>
                <th style="font-size: 18px">Status</th>
                <th style="font-size: 18px">Action</th>
            </tr>
            @foreach($members as $member)
            <tr>
                <td>
                    <div class="d-flex justify-content-between">

                        <p style="font-size: 18px">{{$member->user->name}}</p>

                        <span style="font-size: 18px">{{$member->user->id==$group->admin_user_id?'(Admin)':''}}</span>
                    </div>
                </td>
                <td>
                    @if($member->status)
                    <span style="font-size:18px">Approved</span>

                    @else
                    <span style="font-size:18px">Pending</span>
                    @endif

                </td>
                <td>
                    @if($is_admin && $member->status==0)
                        <a href="{{route('group.member.approve',['member_id'=>$member->id])}}" >Approve</a>
                    @endif

                </td>

            </tr>
            @endforeach
        </table>
    </div>
</div>



@stop
