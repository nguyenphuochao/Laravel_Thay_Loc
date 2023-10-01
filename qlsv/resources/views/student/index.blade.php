@extends('layout')
@section('title')
    Quản lí sinh viên | Danh sách sinh viên
@endsection
@section('content')
    <h1>Danh sách sinh viên</h1>
    <a href="{{ route('students.create') }}" class="btn btn-info">Add</a>
    <a href="{{ route('students.export') }}" class="btn btn-success">Export</a>
    <a href="{{ route('students.formImport') }}" class="btn btn-dark">Import</a>
    <form action="{{ route('students.index') }}" method="GET">
        <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control"
                value="{{ $search }}">
            <button class="btn btn-danger">Tìm</button>
        </label>
    </form>
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
                        <button class="btn btn-danger delete"
                            url="{{ route('students.destroy', ['student' => $student->id]) }}">Xóa</button>
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
