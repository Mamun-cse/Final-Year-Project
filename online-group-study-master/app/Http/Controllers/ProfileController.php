<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use App\Models\Group;
use App\Models\Exam;
use App\Models\Answer;
use App\Models\Topic;
use App\Models\Question;
use App\Models\GroupMember;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        return view('user-profile.profile');

    }
    public function mygroup(){
        $mygroups = GroupMember::where('user_id',Auth::user()->id)->get();
        return view('user-profile.mygroups',compact('mygroups'));

    }
    public function myexam(){
        $mygroups = GroupMember::where('user_id',Auth::user()->id)->get();
        return view('user-profile.exam-index',compact('mygroups'));

    }
    public function exam_start(Request $request){

        if(Auth::check()){
            $examCount=Exam::where('topic_id',$request->topic_id)
            ->where('user_id',Auth::user()->id)->get();
            if(count($examCount)>0){
                $questions = Question::where('topic_id',$request->topic_id)->get();
                $topic = Topic::findOrFail($request->topic_id);
                if(count($questions)>0){
                    $exam=new Exam;
                    $exam->user_id=Auth::user()->id;
                    $exam->topic_id=$request->topic_id;
                    $exam->exam_start_date=date("Y-m-d H:i:s");
                    $exam->save();
                }
                return view('user-profile.exam-start',compact('questions','topic','exam'));
            }
            else{
                $questions = Question::where('topic_id',$request->topic_id)->get();
                $topic = Topic::findOrFail($request->topic_id);

                if(count($questions)>0){
                    $exam=new Exam;
                    $exam->user_id=Auth::user()->id;
                    $exam->topic_id=$request->topic_id;
                    $exam->exam_start_date=date("Y-m-d H:i:s");
                    $exam->save();
                }
                return view('user-profile.exam-start',compact('questions','topic','exam'));

            }
        }


    }

    public function result_show(Request $request){
        $topic_id=$request->topic_id;
        $exam_id=$request->exam_id;
       $answers=Answer::where('exam_id',$exam_id)->get();
       return view('user-profile.result',compact('answers','topic_id','exam_id'));


    }
}
