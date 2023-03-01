<div>
    @if ($is_admin)
        @include('livewire.topic-create')
    @endif

    @include('livewire.question-modal')


    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Study Topics </h3>
                <button wire:click="addNewTopic" class="btn btn-primary" style="font-size:18px">New Topic</button>
            </div>
            <br>
            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size: 18px">SL</th>
                            <th style="font-size: 18px">Title</th>
                            <th style="font-size: 18px">Question</th>
                            <th style="font-size: 18px">Created at</th>
                            <th style="font-size: 18px">Status</th>
                            <th style="font-size: 18px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topics as $index=>$topic)
                        <tr>
                            <td style="font-size: 18px">{{$topics->firstItem()+$index}}</td>
                            <td style="font-size: 18px">{{$topic->title}}</td>
                            <td style="font-size: 18px">{{\App\Models\Question::where('topic_id',$topic->id)->count()}} out of {{$topic->question_no}}</td>
                            <td style="font-size: 18px">{{$topic->created_at}}</td>
                            <td style="font-size: 18px">{{$topic->status?"Active":"Inactive"}}</td>
                            <td>


                                    <a class="btn btn-outline-info btn-sm" wire:click.prevent="showTopic({{$topic}})"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-outline-warning btn-sm" wire:click.prevent="showQuestionModal({{$topic}})"><i class="fas fa-plus"></i></a>
                                    @if ($is_admin)
                                    <a class="btn btn-outline-primary btn-sm" wire:click.prevent="editTopic({{$topic}})"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-outline-danger btn-sm" wire:click.prevent="delete({{$topic->id}})" ><i class="fas fa-trash"></i></a>
                                    @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="mt-2">{{$topics->links('livewire.custom-pagination')}}</div>
        </div>
    </div>


</div>
