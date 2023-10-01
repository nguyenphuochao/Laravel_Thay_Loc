@extends('layout')
@section('title')
    Cập nhật điểm | Danh sách sinh viên
@endsection
@section('content')
    @include('error')
    <h1>Cập nhật điểm</h1>
    <form action="{{ route('registers.update', ['register' => $register->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tên sinh viên:</label>
                        <span>{{ $register->student->name }}</span>
                    </div>
                    <div class="form-group">
                        <label>Tên môn học:</label>
                        <span>{{ $register->subject->name }}</span>
                    </div>
                    <div class="form-group">
                        <label for="score">Điểm</label>
                        <input type="text" name="score" id="score" value="{{ $register->score }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
