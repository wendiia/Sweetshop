<title>"Еще кусочек" - мини-кондитерская</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="icon" href="{{secure_asset('favicon.ico')}}" type="image/x-icon">



{{-- Для загрузки компонентов bs5  --}}
{{--@vite('resources/sass/app.scss')--}}



{{--<link rel="stylesheet" href="{{secure_asset('backend/assets/vendor/fontawesome-free/css/fontawesome-all.min.css')}}">--}}

{{--<link rel="stylesheet" href="{{secure_asset('main/css/bootstrap.min.css')}}?v=<?=time()?>">--}}
{{--<link rel="stylesheet" href="{{secure_asset('main/css/style.css')}}?v=<?=time()?>">--}}





<link rel="stylesheet" href="{{asset('main/css/bootstrap.min.css')}}?v=<?=time()?>">
<link rel="stylesheet" href="{{asset('main/css/style.css')}}?v=<?=time()?>">

<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
