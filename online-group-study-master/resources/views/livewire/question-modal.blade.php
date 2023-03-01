



  <!-- Modal -->
  <div class="modal fade" wire:ignore.self id="question-modal"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">

                <div class="col-md-6">
                    @if ($isOptionActive)
                        <h3>{{$selectedQuestion->question}}</h3>
                        <?php $j=1;?>
                        <div class="d-flex flex-wrap ">
                            @foreach ($selectedOptions as $index=>$selectedOption)
                            <div style="margin-right:5px" class="{{$selectedOption->is_answer?'text-success':''}}">({{$j++}}) {{$selectedOption->option}}</div>
                            @endforeach
                        </div>
                    @else

                    <form wire:submit.prevent="{{$isQuestionEdit?'questionUpdate':'questionStore'}}">
                        <div class="row">
                            <div class="col-md-10">

                                <div class="form-group">
                                    <input type="text" wire:model.defer="stateQuestion.question"  class="form-control @error('question') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter question">
                                    @error('question')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">{{$isQuestionEdit?'Update':'Submit'}}</button>
                            </div>
                        </div>
                    </form>
                    @endif

                </div>

                <div class="col-md-6">
                    @if ($isOptionActive)
                    <form wire:submit.prevent="{{$isOptionEdit?'optionUpdate':'optionStore'}}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="padding: .600rem .75rem">
                                        <input type="checkbox" wire:model="stateOption.ans" aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                    <input type="text" wire:model="stateOption.option" class="form-control @error('option') is-invalid @enderror" aria-label="Text input with checkbox"  placeholder="Enter option">
                                    @error('option')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" wire:loading.attr="disabled" class="btn btn-primary">{{$isOptionEdit?'Update':'Submit'}}</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" wire:click.prevent="optionClose" wire:loading.attr="disabled" class="btn btn-secondary">Close</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>




            </div>
            <hr>
            <?php $i=1; ?>
            @foreach ($questions as $index=>$question)
            <div class="row">
                <h3>
                    <span style="display: inline-block; margin-right:10px">
                        <a title="Question edit" class="btn btn-outline-primary btn-sm" wire:click.prevent="questionEdit({{$question}})"><i class="fas fa-edit"></i></a>
                        <a title="Question delete" class="btn btn-outline-danger btn-sm" wire:click.prevent="questionDelete({{$question->id}})" ><i class="fas fa-trash"></i></a>
                        <a title="Add option" class="btn btn-outline-info btn-sm" wire:click.prevent="addOption({{$question->id}})" ><i class="fas fa-plus"></i></a>
                    </span>
                    <span>{{$i++}}.</span>
                    <span>{{$question->question}}</span>
                </h3>
            </div>

            @endforeach



         </div>

      </div>
    </div>
  </div>

