@extends('layout')
@section('title')
    Thông tin sinh viên | Quản lý Sinh Viên
@endsection
@section('content')
<h1>Thông tin sinh viên</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Mã SV: </label>
                <span>{{$student->id}}</span>
            </div>
            <div class="form-group">
                <label>Tên: </label>
                <span>{{$student->name}}</span>
            </div>
            <div class="form-group">
                <label>Ngày sinh: </label>
                <span>{{formatVNDate($student->birthday)}}</span>
            </div>
            <div class="form-group">
                <label>Giới tính: </label>
                <span>{{$student->getGenderName()}}</span>
            </div>
            
        </div>
    </div>
</div> 
@endsection
