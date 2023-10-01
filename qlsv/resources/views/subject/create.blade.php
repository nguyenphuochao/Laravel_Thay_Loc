@extends('layout')
@section('title')
    Thêm môn học | Quản lí sinh viên
@endsection
@section('content')
    @include('error')
    <h1>Thêm Môn Học</h1>
    <form action="{{route('subjects.store')}}" method="POST" accept-charset="utf-8">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" placeholder="Tên Môn Học Mới"  name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>Số tín chỉ</label>
                        <input type="text" class="form-control" placeholder="Chỉ số tín chỉ"
                            name="number_of_credit" value="{{old('number_of_credit')}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
