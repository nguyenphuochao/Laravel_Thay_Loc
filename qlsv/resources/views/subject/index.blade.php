@extends('layout')
@section('title')
    Quản lí môn học | Danh sách sinh viên
@endsection
@section('content')
    <h1>Danh sách môn học</h1>
    <a href="{{ route('subjects.create') }}" class="btn btn-info">Add</a>
    <form action="{{ route('subjects.index') }}" method="GET">
        <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control"
                value="{{ request()->search }}">
            <button class="btn btn-danger">Tìm</button>
        </label>
    </form>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Mã môn học</th>
                <th>Tên môn học</th>
                <th>Số tín chỉ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $key => $subject)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{$subject->number_of_credit}}</td>
                    <td>
                        <a href="{{ route('subjects.edit', ['subject' => $subject->id]) }}" class="btn btn-warning"
                            role="button">Sửa</a>
                        <button class="btn btn-danger delete"
                            url="{{ route('subjects.destroy', ['subject' => $subject->id]) }}">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $subjects->links() }}
    </div>
    <div>
        <span>Số lượng: {{ count($subjects) }} / {{ $subjects->total() }}</span>
    </div>
@endsection
