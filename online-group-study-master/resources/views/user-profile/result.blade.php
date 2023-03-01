@extends('profile_master')
   @section('profile_content')
    <div class="card">
        <div class="card-body">
            <p style="font-size: 18px; font-weight:600;text-align:center">Your answers</p>
            <div class="row">
                 <div class="col-md-12">

                     @foreach ($answers as $q)
                     <div class="d-flex" >
                         <div style="font-size: 18px; display:inline-block;width:20px">{{$loop->iteration}}</div>
                         <div class="d-flex flex-column">
                             <p style="font-size: 18px;">{{$q->question->question}}</p>
                             <div class="d-flex flex-wrap">
                                 <?php
                                 $options=\App\Models\Option::where('question_id',$q->question_id)->get();
                                 $optionKey=['0'=>'A','1'=>'B','2'=>'C','3'=>'D','4'=>'E','5'=>'F','6'=>'G'];
                                 ?>
                                 @foreach ($options as $key=>$option)
                                 <p style="font-size: 18px; margin-right:20px">
                                     <input type="checkbox"  value="{{$option->id}}" {{$option->id==$q->option_id?'checked':''}}>
                                     <span style="font-size: 18px; display:inline-block;width:20px">{{$optionKey[$key]}}.</span>

                                     @if ($option->is_answer)
                                         <span class="text-success">{{$option->option}} (correct answer)</span>
                                     @else
                                        <span>{{$option->option}}</span>
                                     @endif
                                 </p>

                                 @endforeach
                             </div>
                         </div>
                     </div>
                     @endforeach
                 </div>
            </div>
        </div>
    </div>
 @stop

 <script>
     window.addEventListener('exam-success',function(e){

        Swal.fire({
                icon: 'success',
                title: e.detail.title,
                animation: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            window.location.href = "{{route('profile.exam.index')}}";

    });
 </script>
