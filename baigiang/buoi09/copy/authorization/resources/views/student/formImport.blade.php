@extends('layout')
@section('title')
    Import sinh viên | Quản lý Sinh Viên
@endsection
@section('content')
<h1>Import sinh viên</h1>
<form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="excel" class="form-control">
    <br>
    
    <button class="btn btn-success">Import</button>
</form>
@endsection