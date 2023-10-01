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
        <a href="{{ route('students.index') }}"
            class="{{ request()->segment(1) == 'students' ? 'active' : '' }} btn btn-info">Students</a>
        <a href="{{ route('subjects.index') }}"
            class="{{ request()->segment(1) == 'subjects' ? 'active' : '' }} btn btn-info">Subject</a>
        <a href="{{ route('registers.index') }}"
            class="{{ request()->segment(1) == 'registers' ? 'active' : '' }} btn btn-info">Register</a>
        <div style="height:40px; margin-top:20px">
            <div class="error bg-danger container-fluid text-center">
            </div>
            <div class="message bg-primary container-fluid text-center">
            </div>
        </div>
        @include('message')
        @yield('content')
        <!-- Modal -->
        <div class="modal fade" id="modalDeletingConfirmation" tabindex="-1" role="dialog"
            aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bạn muốn xóa ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Hủy</button>
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xác Nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('vendor/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('vendor/popper.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap-4.5.3-dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </div>
</body>

</html>
