<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- custom css file link -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">


    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @livewireStyles
</head>
<body>
@include('sweetalert::alert')
<!-- heder section start -->
@include('inc.header')

<!-- heder section end -->
@yield('content')
@include('inc.footer')

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<!-- custome js file link -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    
@livewireScripts 
@stack('js')
<script>
    window.addEventListener('success',function(e){
    $("#profileUpdateModal").modal('hide');
    
    /*Swal.fire({
        toast: true,
        icon: e.detail.type,
        title: e.detail.msg,
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });*/
    Swal.fire({
        position: 'top-end',
        icon: e.detail.type,
        title: e.detail.msg,
        showConfirmButton: false,
        timer: 1500
    }); 
});
</script>


<script>
//   $(document).ready(function() {
//     $("#select2").select2();
// });

window.addEventListener('is_delete_confirm',function(event){
    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if(result.isConfirmed) {
                Livewire.emit('deleteConfirmed');
            }

            });
});

window.addEventListener('delete_confirm',function(e){
    // Swal.fire(
    // 'Deleted!',
    // 'Your file has been deleted.',
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


$('.date').daterangepicker({
    singleDatePicker: true,
    format: 'YYYY-MM-DD',
    minYear: 2011,
    showDropdowns: true,
    locale: {
        format: 'YYYY-MM-DD',
    },
    calender_style: "picker_3"
});


</script>
</body>
</html>











