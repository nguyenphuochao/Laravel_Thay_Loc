@extends('layout')
@section('title')
    Sửa sinh viên | Danh sách sinh viên
@endsection
@section('content')
    @include('error')
    <h1>Chỉnh sửa sinh viên</h1>
    <form action="{{ route('students.update', ['student' => $student->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="1">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Tên của bạn"  name="name"
                            value="{{ $student->name }}">
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" class="form-control {{$errors->has('birthday') ? 'is-invalid' : ''}}" placeholder="Ngày sinh của bạn"  name="birthday"
                            value="{{ $student->birthday }}">
                    </div>
                    <div class="form-group">
                        <label>Chọn Giới tính</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="0" {{ $student->gender == 0 ? 'selected' : '' }}>Nam</option>
                            <option value="1" {{ $student->gender == 1 ? 'selected' : '' }}>Nữ</option>
                            <option value="2" {{ $student->gender == 2 ? 'selected' : '' }}>Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-warning" href="{{ route('students.index') }}" role="button">Quay về</a>
                        <button class="btn btn-success" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
