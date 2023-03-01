@extends('profile_master')
   @section('profile_content')
   @livewire('exam-start', ['questions' => $questions,'topic'=>$topic,'exam'=>$exam])
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
