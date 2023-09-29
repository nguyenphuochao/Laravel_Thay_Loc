<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $pattern = [
        'name' => 'required|max:50',
        'birthday' => 'required|date',
        'gender' => 'bail|required|numeric|between:0,2',
    ];
    protected $messenger = [
        'required' => ':attribute không được để trống',
        'regex' => ':attribute không được chứa số hoặc ký tự đặc biệt',
        'date' => ':attribute không nhập sai định dạng ngày tháng năm',
        'max' => ':attribute không được lớn hơn :max ký tự',
        'between' => ':attribute phải là số từ :min đến :max',
        'numeric' => ':attribute phải là số',
    ];
    protected $customName = [
        'name' => 'Tên',
        'birthday' => 'Ngày sinh',
        'gender' => 'Giới tính',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Hàm lấy danh sách
    public function index(Request $request)
    {
        $search = $request->input('search');
        $students = Student::where('name', 'LIKE', "%$search%")->paginate(10)->withQueryString();
        return view('student.index', ['students' => $students, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->pattern, $this->messenger, $this->customName);
        $data = $request->all();
        $student = new Student();
        $student->name = $data['name'];
        $student->birthday = $data['birthday'];
        $student->gender = $data['gender'];
        $student->save();
        $request->session()->put("success", "Đã tạo sinh viên {$student->name} thành công");
        return redirect()->route('students.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, $this->pattern, $this->messenger, $this->customName);
        $data = $request->all();
        $student->name = $data['name'];
        $student->birthday = $data['birthday'];
        $student->gender = $data['gender'];
        $student->save();
        $request->session()->put("success", "Cập nhật thành công {$student->name}");
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            $student->forceDelete();
            request()->session()->put("success", "Xóa thành công sinh viên");
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                request()->session()->put("error", "Sinh viên đã đăng kí môn học, không thể xóa");
            } else {
                request()->session()->put("error", $e->getMessage());
            }
        }

        return redirect()->route('students.index');
    }
}
