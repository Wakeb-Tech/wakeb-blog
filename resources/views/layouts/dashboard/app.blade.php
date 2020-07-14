<!DOCTYPE html>
<html lang="en">
  <head>


    <title>My Net</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/rrssb.css') }}">

    {{--jquery--}}
    <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">

  {{--summernote --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/summernote/dist/summernote.css') }}">
    <script src="{{ asset('dashboard_files/plugins/summernote/dist/summernote.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/plugins/summernote/dist/summernote-ext-rtl.js') }}"></script>
    <script src="{{ asset('dashboard_files/plugins/summernote/dist/lang/summernote-ar-AR.js') }}"></script>

    <style>
        label {
            font-weight: bold;
        }
    </style>

    @stack('styles')
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    @include('layouts.dashboard.header')
    
    <!-- Sidebar menu-->
    @include('layouts.dashboard.aside')
    
    <main class="app-content">
      @include('dashboard.partials._sessions')
      @yield('content')
   
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
        {{--select 2--}}
    <script src="{{ asset('dashboard_files/js/plugins/select2.min.js') }}"></script>
    
    <script src="{{ asset('dashboard_files/js/main.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/rrssb.min.js') }}"></script>
    {{--ckeditor standard--}}
    {{-- <script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script> --}}

   

    <script type="text/javascript">
        
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $(document).on('click', '.delete', function (e) {
            e.preventDefault();

            var that = $(this);

            var n = new Noty({
                text: "Confirm deleting record",
                killer: true,
                buttons: [
                    Noty.button('Yes', 'btn btn-success mr-2', function () {
                        that.closest('form').submit()
                    }),

                    Noty.button('No', 'btn btn-danger', function () {
                        n.close();
                    }),
                ]
            });

            n.show();
        });

     
CKEDITOR.config.language =  "{{ app()->getLocale() }}";

    });//end of document ready

     //select2
    $('.select2').select2({
        'width': '100%',
        tags : true
    });

   //summernote

// var options =  {
//   height: 300,                
//   placeholder: 'Start typing your text...',
//   toolbar: [
//       ['style', ['bold', 'italic', 'underline', 'clear']],
//       ['fontsize', ['fontsize']],
//       ['color', ['color']],
//       ['para', ['ul', 'ol', 'paragraph']],
//       ['insert',['ltr','rtl']],
//       ['insert', ['link','picture', 'video', 'hr']],
//       ['view', ['fullscreen', 'codeview']]
//   ]
// };
// summernote.summernote(options);
// $('#summernote').summernote(options);

$('#summernote').summernote({
  callbacks: {
    onInit: function() {
       $('.note-editing-area').attr('dir', 'auto');
    }
  }
});
$('#summernote1').summernote({
  callbacks: {
    onInit: function() {
       $('.note-editing-area').attr('dir', 'auto');
    }
  }
});

    </script>

  </body>
</html>