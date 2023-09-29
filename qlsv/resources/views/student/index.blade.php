@extends('layout')
@section('title')
    Quản lí sinh viên | Danh sách sinh viên
@endsection
@section('content')
    <h1>Danh sách sinh viên</h1>
    <a href="{{ route('students.create') }}" class="btn btn-info">Add</a>
    <form action="{{ route('students.index') }}" method="GET">
        <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control"
                value="{{ $search }}">
            <button class="btn btn-danger">Tìm</button>
        </label>
    </form>
    @if (request()->session()->has('success'))
        <div class="alert alert-success">{{ request()->session()->pull('success') }}</div>
    @endif
    @if (request()->session()->has('error'))
        <div class="alert alert-danger">{{ request()->session()->pull('error') }}</div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Mã SV</th>
                <th>Tên</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $key => $student)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ formatDate($student->birthday) }}</td>
                    <td>{{ $student->getGenderName() }}</td>
                    <td>
                        <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="btn btn-warning"
                            role="button">Sửa</a>
                        <form action="{{ route('students.destroy', ['student' => $student->id]) }}" method="POST"
                            style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Bạn chắc xóa')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $students->links() }}
    </div>
    <div>
        <span>Số lượng: {{ count($students) }} / {{ $students->total() }}</span>
    </div>
@endsection
