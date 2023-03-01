<div>
    <div class="bg-white p-5 border">
        <p style="font-size: 18px; font-weight:bold" class="py-3">Topic title: {{$topic->title}}</p>
        <table wire:ignore class="table table-bordered mb-3" style="width: 100%">
            <tr>
                <td style="font-size: 18px">Total question: {{$topic->question_no}}</td>
                <td style="font-size: 18px">Total mark: {{$topic->question_no}}</td>
                <td style="font-size: 18px">Duration: {{$topic->duration}}</td>
                <td style="font-size: 18px">Time: <div style="font-size: 22px; font-weight:bold; display:inline-block; width:60px" id="counterContainer" class="text-info"></div><span style="font-size: 18px;" ></span></td>
            </tr>
        </table>
        <br>
        <form wire:submit.prevent="examFinish">
            @foreach ($questions as $q)
            <div class="d-flex" wire:ignore>
                <div style="font-size: 18px; display:inline-block;width:20px">{{$loop->iteration}}</div>
                <div class="d-flex flex-column">
                    <p style="font-size: 18px;">{{$q->question}}</p>
                    <div class="d-flex">
                        <?php
                        $options=\App\Models\Option::where('question_id',$q->id)->get();
                        $optionKey=['0'=>'A','1'=>'B','2'=>'C','3'=>'D','4'=>'E','5'=>'F','6'=>'G'];
                        ?>
                        @foreach ($options as $key=>$option)
                        <p style="font-size: 18px; margin-right:20px">
                            <input wire:model="answers" type="checkbox" name="option[]" value="{{$option->id}}">
                            <span style="font-size: 18px; display:inline-block;width:20px">{{$optionKey[$key]}}.</span>
                            {{$option->option}}
                        </p>

                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
            <p style="font-size: 18px; text-align:center" class="py-4 text-primary">Answer {{count($answers)}} out of 20</p>

            <div class="d-flex justify-content-center my-4">
                <button id="submitButton" style="font-size: 18px" type="submit" class="btn btn-primary">Finish Exam</button>
            </div>
        </form>
    </div>
</div>


<script>
    const startingMinutes={{$topic->duration}};
    let time=startingMinutes*60;
    let countDownEl=document.getElementById("counterContainer");
    let submitButton=document.getElementById("submitButton");


    function updateCountDown(){
        const minute=Math.floor(time/60);
        let seconds=time%60;

         seconds= seconds<10?'0'+seconds:seconds;

         countDownEl.innerHTML=`${minute}:${seconds}`;
         time--;
         if(minute==0 && seconds==0){
            submitButton.disabled = true;
            Livewire.emit('examFinish');
         }

    }
    setInterval(updateCountDown, 1000);


</script>
