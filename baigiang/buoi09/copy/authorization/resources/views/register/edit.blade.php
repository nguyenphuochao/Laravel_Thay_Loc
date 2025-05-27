@extends('layout')
@section('title')
    Cập nhật môn học | Quản lý Sinh Viên
@endsection
@section('content')
<h1>Cập nhật điểm</h1>
<form action="{{route("registers.update", ["register" => $register->id])}}" method="POST">
    <div class="container">
        @csrf
        @method("PUT")
        @include('error')
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Tên sinh viên</label>
                    <span>{{$register->student->name}}</span>
                </div>
                <div class="form-group">
                    <label>Tên môn học</label>
                    <span>{{$register->subject->name}}</span>
                </div>
                <div class="form-group">
                    <label for="score">Điểm</label>
                    <input type="text" class="form-control {{$errors->has("score") ? "is-invalid" : ""}}" placeholder="Điểm" name="score" value="{{old("score", $register->score)}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
