@extends('layout')
@section('title')
    Thêm môn học | Quản lý Sinh Viên
@endsection
@section('content')
<h1>Thêm môn học</h1>
<form action="{{route("subjects.store")}}" method="POST" accept-charset="utf-8">
    @csrf
    <div class="container">
        @include('error')
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control {{$errors->has("name") ? "is-invalid" : ""}}" placeholder="Tên môn học mới" name="name" value="{{old("name")}}">
                </div>
                <div class="form-group">
                    <label>Số tín chỉ</label>
                    <input type="text" class="form-control {{$errors->has("number_of_credit") ? "is-invalid" : ""}}" placeholder="Chỉ số tín chỉ" name="number_of_credit" value="{{old("number_of_credit")}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection