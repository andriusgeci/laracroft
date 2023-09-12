<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laracroft Task Management System</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <img src="{{ asset('images/auth.png') }}" alt="auth" width="100%">

        </div>
        <div class="col-md-4">
            @yield('content')
        </div>

    </div>
</div>

</body>
</html>
