@extends('layout')
@section('title')
    Cập nhật môn học | Quản lý Sinh Viên
@endsection
@section('content')
<h1>Chỉnh Sửa Môn Học</h1>
<form action="{{route("subjects.update", ["subject" => $subject->id])}}" method="POST" accept-charset="utf-8">
    <div class="container">
        @csrf
        @method("PUT")
        @include('error')
        <div class="row">
            <input type="hidden" name="id" value="3">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control {{$errors->has("name") ? "is-invalid" : ""}}" placeholder="Tên môn học" name="name" value="{{old("name", $subject->name)}}">
                </div>
                <div class="form-group">
                    <label>Số tín chỉ</label>
                    <input type="text" class="form-control {{$errors->has("number_of_credit") ? "is-invalid" : ""}}" placeholder="Số tín chỉ" name="number_of_credit" value="{{old("number_of_credit", $subject->number_of_credit)}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
