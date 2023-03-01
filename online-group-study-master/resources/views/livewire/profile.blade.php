<div>

<!-- Modal -->
<div class="modal fade" wire:ignore.sel id="profileUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form wire:submit.prevent="profileUpdate">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" wire:model.defer="state.fname"  class="form-control @error('fname') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter full name">
            @error('fname')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" wire:model.defer="state.lname"  class="form-control @error('lname') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter full name">
            @error('lname')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" wire:model.defer="state.email"  class="form-control @error('email') is-invalid @enderror" id="" aria-describedby="emailHelp" placeholder="Enter email">
            @error('email')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary">Update</button>

      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div class="bg-white p-5 border">
    <div  class="py-3 d-flex justify-content-between">
        <p style="font-size: 18px;">Profile</p>
        <a style="font-size: 18px;" class="btn btn-secondary btn-sm " wire:click="updateModalOpen({{$users->id}})">Update</a>

    </div>
    <div class="row">
        <div class="col-md-3">
            <img src="{{asset('/image/profile-picture/dumy.jpg')}}" class="img-thumbnail rounded-circle w-50 mx-auto d-block " alt="...">

        </div>
        <div class="col-md-9">
            <table wire:ignore class="table table-bordered mb-3" style="width: 100%">
                <tr>
                    <td style="font-size: 18px">First Name</td>
                    <td style="font-size: 18px">{{$users->fname}}</td>
                </tr>
                    <td style="font-size: 18px">Last Name</td>
                    <td style="font-size: 18px">{{$users->lname}}</td>
                </tr>
                <tr>
                    <td style="font-size: 18px">Email</td>
                    <td style="font-size: 18px">{{$users->email}}</td>
                </tr>
            </table>

        </div>
    </div>


</div>
</div>


