<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Option;

use Auth;
use Livewire\WithPagination;


use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class GroupTopic extends Component
{
    use WithPagination;
    protected $listeners=['deleteConfirmed'=>'deleteConfirmedItem'];
    public $beingDeletItem = NULL;

    public $topic;
    public $state=[];
    public $stateQuestion=[];
    public $stateOption=[];
    public $isOptionActive=false;
    public $isEdit=false;
    public $isQuestionEdit=false;
    public $isOptionEdit=false;
    public $searchField;
    public $currentPage=1;

    public $sortColumnName='created_at';
    public $sortDirection='desc';
    public $questions=[];
    public $selectedOptions=[];
    public $q;
    public $selectedQuestion;
    public $group;
    public $is_admin;
    public $group_member_id;
    public $topic_id;

    public function delete($delete_item_id){

        $this->beingDeletItem = $delete_item_id;
        $this->dispatchBrowserEvent('is_delete_confirm',['removalId'=>$delete_item_id]);

    }

    public function deleteConfirmedItem(){
        $delete_item=Topic::findOrFail($this->beingDeletItem);
        $delete_item->delete();
        $this->dispatchBrowserEvent('delete_confirm',['title'=>'Employee has been deleted succesfully.']);
    }

    public function editTopic(Topic $topic){
        $this->isEdit=true;
        $this->topic=$topic;
        $this->state=$topic->toArray();
        $this->dispatchBrowserEvent('show-modal');
    }

    public function topicUpdate(){
       // dd($this->state['salary_code']);
        $validatedData = Validator::make($this->state,[
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'question_no' => 'required|numeric',
            'duration' => 'required|numeric',
            'status' => 'required|numeric',

        ])->validate();

        $this->topic->update($validatedData);

        $this->dispatchBrowserEvent('topic-store',[
            'type'=>'success',
            'title'=>'Topic has been updated succesfully',
        ]);
    }




    public function addNewTopic(){
        $this->isEdit=false;
        $this->state=[];

        $this->dispatchBrowserEvent('show-modal');
    }


    public function topicStore(){
        $this->state['group_id']=$this->group->id;
        $this->state['group_member_id']=$this->group_member_id;
        $validatedData = Validator::make($this->state,[
            'group_id' => 'required',
            'group_member_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'question_no' => 'required|numeric',
            'duration' => 'required|numeric',
            'status' => 'required|numeric',
        ]
        )->validate();


        topic::create($validatedData);
        $this->state=[];
        $this->dispatchBrowserEvent('topic-store',[
            'type'=>'success',
            'title'=>'Topic has been saved succesfully',
        ]);
    }

    public function questionStore(){

        $this->stateQuestion['topic_id']=$this->topic_id;
        $this->stateQuestion['group_member_id']=$this->group_member_id;
        $this->stateQuestion['user_id']=Auth::user()->id;



        $validatedQuestionData = Validator::make($this->stateQuestion,[
            'topic_id'=>'',
            'group_member_id'=>'',
            'user_id'=>'',
            'question' => 'required',
        ]

        )->validate();


        Question::create($validatedQuestionData);

        $this->questions=Question::where('topic_id',$this->topic_id)
        ->where('group_member_id',$this->group_member_id)
        ->where('user_id',Auth::user()->id)
        ->get();


        $this->stateQuestion=[];

        $this->dispatchBrowserEvent('question-success',[
            'type'=>'Saved!',
            'title'=>'Question saved succesfully',
        ]);
    }

    public function questionEdit(Question $question){

        $this->isQuestionEdit=true;
        $this->q=$question;
        $this->stateQuestion=$question->toArray();

    }


    public function questionUpdate(){

        $validatedQuestionData = Validator::make($this->stateQuestion,[
            'topic_id'=>'',
            'group_member_id'=>'',
            'user_id'=>'',
            'question' => 'required',
        ]

        )->validate();


        $this->q->update($validatedQuestionData);
        $this->stateQuestion=[];
        $this->isQuestionEdit=false;

        $this->questions=Question::where('topic_id',$this->topic_id)
        ->where('group_member_id',$this->group_member_id)
        ->where('user_id',Auth::user()->id)
        ->get();

        $this->dispatchBrowserEvent('question-success',[
            'type'=>'Updated!',
            'title'=>'Question updated succesfully',
        ]);
    }

    public function questionDelete($id){
        Question::find($id)->delete();
        Option::where('question_id',$id)->delete();

        $this->questions=Question::where('topic_id',$this->topic_id)
        ->where('group_member_id',$this->group_member_id)
        ->where('user_id',Auth::user()->id)
        ->get();

        $this->isOptionActive=false;

        $this->dispatchBrowserEvent('question-success',[
            'type'=>'Deleted!',
            'title'=>'Question deleted succesfully',
        ]);
    }


    public function addOption(Question $question){
        $this->isOptionActive=true;
        $this->selectedQuestion=$question;
        $this->selectedOptions=Option::where('question_id',$question->id)->get();
        $this->stateOption=[];

    }

    public function optionClose(){
        $this->isOptionActive=false;
    }


    public function optionStore(){
        $validatedOptionData = Validator::make($this->stateOption,[
            'ans'=>'',
            'option'=>'required',
        ]
        )->validate();

        if(isset($this->stateOption['ans'])){
            Option::create([
                'question_id'=>$this->selectedQuestion->id,
                'option'=>$this->stateOption['option'],
                'is_answer'=>$this->stateOption['ans']?1:0,
            ]);
        }
        else{
            Option::create([
                'question_id'=>$this->selectedQuestion->id,
                'option'=>$this->stateOption['option'],
            ]);
        }

        $this->stateOption=[];
        $this->selectedOptions=Option::where('question_id',$this->selectedQuestion->id)->get();
        $this->questions=Question::where('topic_id',$this->topic_id)
        ->where('group_member_id',$this->group_member_id)
        ->where('user_id',Auth::user()->id)
        ->get();
        $this->dispatchBrowserEvent('question-success',[
            'type'=>'Saved!',
            'title'=>'Option added succesfully',
        ]);


    }




    public function showTopic(Topic $topic){

        $html=view('livewire.topic-show',compact('topic'))->render();
        $this->dispatchBrowserEvent('show-detail',[
            'html'=>$html
        ]);
    }

    public function showQuestionModal(Topic $topic){
        $this->topic_id=$topic->id;

        $this->questions=Question::where('topic_id',$topic->id)
        ->where('group_member_id',$this->group_member_id)
        ->where('user_id',Auth::user()->id)
        ->get();

        $this->dispatchBrowserEvent('show-question-modal');
    }

    public function sortBy($columnName){
        if($this->sortColumnName===$columnName){

            $this->sortDirection=$this->swapSortDirection();
        }
        else{
            $this->sortDirection='asc';

        }
        $this->sortColumnName=$columnName;

    }

    public function swapSortDirection(){
        return $this->sortDirection==='asc'?'desc':'asc';
    }





    public function render()
    {
        $topics=Topic::where('group_id',$this->group->id)
        ->where('title', 'like', '%'.$this->searchField.'%')
        ->orWhere('description', 'like', '%' . $this->searchField . '%')
        //join('designations','employees.designation_id','=','designations.id')
        //->select('employees.id as id','employees.name as emp_name','designations.name as desig_name','joining_date','salary_code','class','blood_group','grade','mobile','employees.created_at as created_at')
        // where(function($query){
        //     $query->where('group_id',$this->group->id)
        //     $query->where('title', 'like', '%'.$this->searchField.'%')
        //     ->orWhere('description', 'like', '%' . $this->searchField . '%');
        // })
        ->orderBy('id','desc')
        ->orderBy($this->sortColumnName,$this->sortDirection)
        ->paginate(10);

        //$topics = Topic::where('group_id',$this->group->id)->orderBy('id','desc')->get();
        return view('livewire.group-topic',compact('topics'));
    }

    public function setPage($url){
        $this->currentPage=explode('page=',$url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }
}
