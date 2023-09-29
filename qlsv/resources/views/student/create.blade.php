@extends('layout')
@section('title')
    Thêm | Quản lí sinh viên
@endsection
@section('content')
    @include('error')
    <h1>Thêm sinh viên</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            placeholder="Tên của bạn" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="date" class="form-control {{ $errors->has('birthday') ? 'is-invalid' : '' }}"
                            placeholder="Ngày sinh của bạn" name="birthday" value="{{ old('birthday') }}">
                    </div>
                    <div class="form-group">
                        <label>Chọn Giới tính</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-warning" href="{{ route('students.index') }}" role="button">Quay lại</a>
                        <button class="btn btn-success" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
