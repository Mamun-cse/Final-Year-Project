<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

use Auth;
class Profile extends Component
{
    public $state=[];
    //public $isEdit=false;
    public $user;

    public function updateModalOpen($id){
        //$this->isEdit = true;
        $user = User::find($id);
        $this->user = $user;
        $this->state = $user->toArray();

        $this->dispatchBrowserEvent('openProfileEditModal',['userid'=>$id]);

    }

    public function profileUpdate(){
        
        $validatedData = Validator::make($this->state,[
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255'
        ])->validate();
        $this->user->update($validatedData);
        $this->dispatchBrowserEvent('success',['msg'=>"Profile has been update successfully",'type'=>'success']);
    }
   /* public function profileStore(){
        $validatedData = Validator::make($this->state,[
            'fname' => 'required|max:255'
        ])->validate();
        
        User::create($validatedData);
        $this->state=[];

        $this->dispatchBrowserEvent('designation-store',[
            'type'=>'success',
            'title'=>'Designation has been saved succesfully',
        ]);
    }*/

    public function render()
    {
        $userid = Auth::user()->id;
        $users = User::find($userid);
        return view('livewire.profile',compact('users'));
    }
}

