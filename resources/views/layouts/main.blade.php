<div>
    <!doctype html>
<html lang="ku" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/jQuery.min.js')}}" type="text/javascript"></script>
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="{{asset('js/editor/build/ckeditor.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dark-mode.css')}}">
    <link rel="stylesheet" href="{{asset('img/svg/bootstrap-icons.css')}}">

		
    @livewireStyles
</head>

<body class="">

    @yield('main')
<footer class="position-sticky text-center text-muted ">
    <center>
        <p>ئیسلامــــــپیدیا</p>
    </center>
</footer>
<script src="{{asset('js/dark-mode-switch.min.js')}}" type="text/javascript"></script>

   @livewireScripts
    {{-- <script type="module">
        import hotwireTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}

</body>

</html>
</div>