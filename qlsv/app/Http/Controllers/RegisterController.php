<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    protected $pattern = [
        'score' => 'numeric|between:0,10'
    ];
    protected $messenger = [
        'numeric' => ':attribute phải là số',
        'between' => ':attribute phải từ 0 đến 10'
    ];
    protected $customName = [
        'score' => 'Điểm'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemPerPage = env("ITEM_PER_PAGE", 4);
        $registers = Register::join('students', 'registers.student_id', '=', 'students.id')
            ->join('subjects', 'registers.subject_id', '=', 'subjects.id')
            ->where('students.name', 'LIKE', "%$request->search%")
            ->orWhere('subjects.name', 'LIKE', "%$request->search%")
            ->select('registers.*')
            ->paginate($itemPerPage)->withQueryString();
        return view('register.index', ["registers" => $registers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('register.create', ["students" => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $register = new Register();
        $register->student_id = $data["student_id"];
        $register->subject_id = $data["subject_id"];
        $register->save();
        request()->session()->put("success", "Thêm thành công đăng kí môn học");
        return redirect()->route('registers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        return view('register.edit', ['register' => $register]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        $this->validate($request, $this->pattern, $this->messenger, $this->customName);
        $data = $request->all();
        $register->score = $data['score'];
        $register->save();
        request()->session()->put("success", "Cập nhật điểm môn học {$register->subject->name}
       thành công cho sinh viên {$register->student->name}");
        return redirect()->route('registers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        try {
            $register->forceDelete();
            request()->session()->put("success", "Xóa thành công sv {$register->student->name} môn {$register->subject->name} thành công");
        } catch (Exception $e) {
            request()->session()->put("error", $e->getMessage());
        }
        return redirect()->route('registers.index');
    }
}
