@extends('layout')
@section('title')
    Danh sách đăng ký | Quản lý Sinh Viên
@endsection
@section('content')
<h1>Danh sách đăng ký</h1>
<a href="{{route("registers.create")}}" class="btn btn-info">Add</a>
<form action="{{route("registers.index")}}" method="GET">
    <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control" value="{{$search}}">
    <button class="btn btn-danger">Tìm</button>
    </label>
    <input type="hidden" name="c" value="register">
</form>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Mã SV</th>
            <th>Tên SV</th>
            <th>Mã MH</th>
            <th>Tên MH</th>
            <th>Điểm</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $order = 0;
            @endphp
            @foreach ($registers as $register)
            @php
                $order++;
            @endphp
        <tr>
            <td>{{$order}}</td>
            <td>{{$register->student_id}}</td>
            <td>{{$register->student->name}}</td>
            <td>{{$register->subject_id}}</td>
            <td>{{$register->subject->name}}</td>
            <td>{{$register->score}}</td>
            <td><a class="btn btn-primary" href="{{route("registers.edit",["register" => $register->id])}}">Cập nhật điểm</a></td>
            <td>
                <button class="btn btn-danger delete" url="{{route("registers.destroy", ["register" => $register->id])}}">Xóa</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-end">
    {{$registers->links()}}
</div>
<div>
    <span>Số lượng: {{$registers->total()}}</span>
</div>
@endsection