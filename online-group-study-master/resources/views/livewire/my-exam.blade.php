<div>
    <div class="bg-white p-4 bordered">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>

                        <th style="font-size: 18px">Group name</th>
                        <th style="font-size: 18px">Topic title</th>
                        <th style="font-size: 18px">Question</th>
                        <th style="font-size: 18px">Duration</th>
                        <th style="font-size: 18px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($mygroups)>0)
                    @foreach ($mygroups as $mygroup)
                    <?php
                    $topics=\App\Models\Topic::where('group_id',$mygroup->group_id)
                    ->where('status',1)->get();
                    $counter=0;
                    ?>
                        @foreach ($topics as $topic)
                        <tr>

                            @if ($counter==0)

                            <td rowspan="{{count($topics)}}" style="font-size: 18px; vertical-align:middle" align="middle" >{{$mygroup->group->gname}}</td>
                            @endif
                            <?php $counter++; ?>
                            <td style="font-size: 18px">
                                    {{$topic->title}}
                            </td>
                            <td style="font-size: 18px">{{$topic->question_no}}</td>
                            <td style="font-size: 18px">{{$topic->duration}}</td>
                            <td style="font-size: 18px">
                                <?php
                                   $exam=\App\Models\Exam::where('topic_id',$topic->id)
                                   ->where('user_id',Auth::user()->id)->get() ;
                                ?>
                                @if (count($exam)>0)
                                <a style="font-size: 14px" href="{{route('profile.result.show',['topic_id'=>$topic->id,'exam_id'=>$exam[0]->id])}}" class="btn btn-sm btn-primary">Result</a>
                                @else
                                <a style="font-size: 14px" href="{{route('profile.exam.start',['topic_id'=>$topic->id])}}" class="btn btn-sm btn-success">Start</a>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
