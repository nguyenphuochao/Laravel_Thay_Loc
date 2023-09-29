@extends('layout')
@section('title')
    Thêm đăng kí môn học | Danh sách sinh viên
@endsection
@section('content')
    <h1>Thêm đăng ký môn học</h1>
    <form action="{{route('registers.store')}}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="student_id">Tên sinh viên</label>
                        <select class="form-control" name="student_id" id="student_id"
                            url="{{ route('student.subjects.unregistered', ['id' => 'pattern']) }}" required>
                            <option value="">Vui lòng chọn sinh viên</option>
                            @foreach ($students as $stu)
                                <option value="{{ $stu->id }}">{{ $stu->id }} - {{ $stu->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject_id">Tên môn học</label>
                        <span id="load" class="text-primary"></span>
                        <select class="form-control" name="subject_id" id="subject_id" required>
                            <option value="">Vui lòng chọn môn học</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
