@extends('group.group_comon')

@section('groupContent')


@livewire('group-topic',['group'=>$group,'is_admin'=>$is_admin,'group_member_id'=>$group_member_id])

@stop

@push('js')
    <script>
        window.addEventListener('topic-store',function(e){
            $('#topic-create-modal').modal('hide');
            // Swal.fire(
            // 'Saved!',
            // e.detail.title,
            // 'success'
            // );

            Swal.fire({
                toast: true,
                icon: 'success',
                title: e.detail.title,
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        });


        window.addEventListener('question-success',function(e){

            Swal.fire(
            e.detail.type,
            e.detail.title,
            'success'
            );


        });


        window.addEventListener('show-modal',function(e){

            $('#topic-create-modal').modal('show');
        });

        window.addEventListener('show-question-modal',function(e){
            $('#question-modal').modal('show');
        });

        window.addEventListener('show-detail',function(e){
            Swal.fire({
            html: e.detail.html,
            width:800,
            showCloseButton: true,
            showConfirmButton:true,
            });

        });


    </script>
@endpush
