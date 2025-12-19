

<!doctype html>
{{--动态设定网页语言 config/app.php 中的locale的值--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>@yield('title', 'BbsChat项目') -Laravel实战</title>
</head>
<body>
@include('layouts._header')
<div id="base" class="container">
    @include('shard._messages')
    @yield('content')
</div>

@include('layouts._footer')


<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
