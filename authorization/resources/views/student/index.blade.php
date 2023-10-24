@extends('layout')
@section('title')
    Danh sách sinh viên | Quản lý Sinh Viên
@endsection
@section('content')
    <h1>Danh sách sinh viên</h1>
    @can('create', 'App\Models\Student')
        <a href="{{ route('students.create') }}" class="btn btn-info">Add</a>
    @endcan
    @cannot('create', 'App\Models\Student')
        <a href="{{ route('students.create') }}" class="btn btn-info disabled">Add</a>
    @endcannot
    <a href="{{ route('students.formImport') }}" class="btn btn-primary">Import</a>
    <a href="{{ route('students.export') }}" class="btn btn-success">Export</a>
    <form action="{{ route('students.index') }}" method="GET">
        <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control"
                value="<?= $search ?>">
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
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $order = 0;
            @endphp
            @foreach ($students as $student)
                @php
                    $order++;
                @endphp
                <tr>
                    <td>{{ $order }}</td>
                    <td>{{ $student->id }}</td>
                    <td>
                        <a href="{{ route('students.show', ['student' => $student->id]) }}">
                            {{ $student->name }}
                        </a>
                    </td>
                    <td>{{ formatVNDate($student->birthday) }}</td>
                    <td>{{ $student->getGenderName() }}</td>
                    <td><a class="btn btn-primary" href="{{ route('students.edit', ['student' => $student->id]) }}">Sửa</a>
                    </td>
                    <td>
                        <button class="btn btn-danger delete"
                            url="{{ route('students.destroy', ['student' => $student->id]) }}">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $students->links() }}
    </div>
    <div>
        <span>Số lượng: {{ $students->total() }}</span>
    </div>
@endsection
