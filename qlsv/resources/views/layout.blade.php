<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Quản lí sinh viên')</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-5.15.1-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container" style="margin-top:20px;">
        <a href="{{ route('students.index') }}" class="{{ request()->segment(1) == 'students' ? 'active' : '' }} btn btn-info">Students</a>
        <a href="" class=" btn btn-info">Subject</a>
        <a href="{{route('registers.index')}}" class="{{ request()->segment(1) == 'registers' ? 'active' : '' }} btn btn-info">Register</a>
        <div style="height:40px; margin-top:20px">
            <div class="error bg-danger container-fluid text-center">
            </div>
            <div class="message bg-primary container-fluid text-center">
            </div>
        </div>
        @yield('content')
        <script src="{{ asset('vendor/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('vendor/popper.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap-4.5.3-dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </div>
</body>

</html>
