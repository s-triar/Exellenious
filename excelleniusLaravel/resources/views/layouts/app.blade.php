<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>  --}}
    <script src={{ asset('js/parsley.js') }}></script>
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>

<body>
    @include('inc.navbar') @yield('content')
</body>

<script src="{{ asset('js/style.js') }}"></script>

</html>