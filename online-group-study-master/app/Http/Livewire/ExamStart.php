<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Option;
use App\Models\Exam;
use App\Models\Answer;



class ExamStart extends Component
{
    public $questions;
    public $topic;
    public $exam;
    public $answers=[];
    protected $listeners = ['examFinish'];

    public function examFinish(){
        $answers=$this->answers;
        $exam=$this->exam;
        if(count($answers)>0){
            $exam=Exam::find($exam->id);
            $exam->exam_end_date=date("Y-m-d H:i:s");
            $exam->update();

            foreach($answers as $key=>$value){
                $option=Option::find($value);

                $answer=new Answer;
                $answer->question_id=$option->question_id;
                $answer->option_id=$value;
                $answer->user_id=$exam->user_id;
                $answer->exam_id=$exam->id;
                $answer->save();
            }
            $this->dispatchBrowserEvent('exam-success',[
                'type'=>'success',
                'title'=>'You have submited your answer successfully',
            ]);

        }
        else{
            $exam=Exam::find($exam->id);
            $exam->exam_end_date=date("Y-m-d H:i:s");
            $exam->update();
            $this->dispatchBrowserEvent('exam-success',[
                'type'=>'success',
                'title'=>'You have submited your answer successfully',
            ]);
        }


    }

    public function render()
    {
        return view('livewire.exam-start');
    }
}
