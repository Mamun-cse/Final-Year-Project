


  <!-- Modal -->
  <div class="modal fade" wire:ignore.self id="topic-create-modal"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$isEdit?'Edit':'Create'}} Topic</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent="{{$isEdit?'topicUpdate':'topicStore'}}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="inputEmail4">Title <span class="text-danger">*</span></label>
                            <input type="text" wire:model.defer="state.title"  class="form-control @error('title') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter title">
                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="inputEmail4">Description <span class="text-danger">*</span></label>
                            <textarea  wire:model.defer="state.description"  class="form-control @error('description') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter description" cols="30"></textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputEmail4">Exam duration (in minite) <span class="text-danger">*</span></label>
                            <input type="number" wire:model.defer="state.duration"  class="form-control @error('duration') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter exam duration (in minite)">
                            @error('duration')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail4">Start date <span class="text-danger">*</span></label>
                            <input type="date" wire:model.defer="state.start_date"  class="form-control @error('start_date') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter start date">
                            @error('start_date')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">End date <span class="text-danger">*</span></label>
                            <input type="date" wire:model.defer="state.end_date"  class="form-control @error('end_date') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter end date">
                            @error('end_date')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputEmail4">Number of question <span class="text-danger">*</span></label>
                            <input type="number" wire:model.defer="state.question_no"  class="form-control @error('question_no') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter question number">
                            @error('question_no')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputEmail4">Status<span class="text-danger">*</span></label>
                            <select wire:model.defer="state.status" class="form-control  @error('status') is-invalid @enderror">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>




                    </div>


                </div>



            </div>
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary">{{$isEdit?'Update':'Submit'}}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
