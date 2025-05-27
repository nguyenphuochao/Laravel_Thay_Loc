@extends('layout')
@section('title')
    Thông tin môn học | Quản lý Sinh Viên
@endsection
@section('content')
<h1>Thông tin môn học</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>Mã Môn Học: </label>
                <span>{{$subject->id}}</span>
            </div>
            <div class="form-group">
                <label>Tên: </label>
                <span>{{$subject->name}}</span>
            </div>
            <div class="form-group">
                <label>Số tín chỉ: </label>
                <span>{{$subject->number_of_credit}}</span>
            </div>
            
            
        </div>
    </div>
</div> 
@endsection
