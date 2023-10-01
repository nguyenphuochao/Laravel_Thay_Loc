@extends('layout')
@section('title')
    Đăng kí môn học | Danh sách sinh viên
@endsection
@section('content')
    <h1>Danh sách sinh viên đăng ký môn học</h1>
    <a href="{{ route('registers.create') }}" class="btn btn-info">Add</a>
    <form action="{{route('registers.index')}}" method="GET">
        <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control"
                value="{{request()->search}}">
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
            @foreach ($registers as $key => $re)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $re->student_id }}</td>
                    <td>{{ $re->student->name }}</td>
                    <td>{{ $re->subject_id }}</td>
                    <td>{{ $re->subject->name }}</td>
                    <td>{{ $re->score }}</td>
                    <td><a href="{{ route('registers.edit', ['register' => $re->id]) }}">Cập nhật điểm</a></td>
                    <td>
                        <button class="btn btn-danger delete"
                            url="{{ route('registers.destroy', ['register' => $re->id]) }}">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $registers->links() }}
    </div>
    <div>
        <span>Số lượng: {{ count($registers) }} / {{ $registers->total() }}</span>
    </div>
@endsection
