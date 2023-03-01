<div>

<div class="bg-white p-4 bordered">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>

                    <th style="font-size: 18px">Group name</th>
                    <th style="font-size: 18px">Status</th>
                    <th style="font-size: 18px">Action</th>

                </tr>
            </thead>
            <tbody>

                    @foreach ($mygroups as $mygroup)
                    <tr>

                        <td style="font-size: 18px">
                            {{$mygroup->group->gname}}
                        </td>
                        <td >
                            @if($mygroup->status==1)
                            <span style="font-size: 18px" class=" text-success">Approved</span>

                            @else
                            <span style="font-size: 18px" class="text-secondary">Pending</span>
                            @endif
                       </td>
                       <td>
                           @if($mygroup->status==1)

                           <a style="font-size: 18px" class="btn btn-sm btn-primary" href="{{route('group.home',['group_id'=>$mygroup->group->id])}}">View</a>

                           @endif
                       </td>

                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
</div>
</div>




