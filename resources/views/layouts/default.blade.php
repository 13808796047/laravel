<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','标题')- Laravel 教程 - Web 开发实战入门 ( Laravel 5.5 )</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
@include('layouts._header')

<div class="container">
    @include('shared._message')
    @yield('content');
    @include('layouts._footer')
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>