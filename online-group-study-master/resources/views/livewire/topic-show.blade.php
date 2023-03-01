
<div class="row">
    <div class="col-md-6">
        <h4 class="text-center mt-4">Topic details</h4>
        <div class="table-responsive">

            <table class="table">
                <tr>
                    <td>Title</td>
                    <td>:</td>
                    <td>{{$topic->title}}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>{{$topic->description}}</td>
                </tr>
                <tr>
                    <td>Start Date</td>
                    <td>:</td>
                    <td>{{$topic->start_date}}</td>
                </tr>
                <tr>
                    <td>End Date</td>
                    <td>:</td>
                    <td>{{$topic->end_date}}</td>
                </tr>
                <tr>
                    <td>Total Question</td>
                    <td>:</td>
                    <td>{{$topic->question_no}}</td>
                </tr>
                <tr>
                    <td>Exam start date</td>
                    <td>:</td>
                    <td>{{$topic->exam_start_date}}</td>
                </tr>
                <tr>
                    <td>Exam end date</td>
                    <td>:</td>
                    <td>{{$topic->exam_end_date}}</td>
                </tr>

            </table>
        </div>
    </div>
    <div class="col-md-6">
        <h4 class="text-center mt-4">Question details</h4>
        <?php
            $users=\App\Models\Question::where('topic_id',$topic->id)
            ->groupBy('user_id')->select('user_id', DB::raw('count(*) as question_number'))
                 ->groupBy('user_id')
                 ->get();
                 $i=1;
        ?>

        @if (count($users)>0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Member name</th>
                        <th>number of question</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$user->user->fname}} {{$user->user->lname}}</td>
                            <td>{{$user->question_number}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Question not found!</p>
        @endif


    </div>
</div>
