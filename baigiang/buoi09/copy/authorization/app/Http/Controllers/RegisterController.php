<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    function __construct() {
        $this->middleware(['auth', 'verified']);
    }
        
    protected $pattern = [
        'student_id' => 'bail|required|numeric',
        'subject_id' => 'bail|required|numeric',
        'score'      => 'numeric|between:0,10',
    ];

    protected $updatePattern = [
        'score'      => 'numeric|between:0,10',
    ];

    protected $messenger = [
        'required' => ':attribute không được để trống',
        'between' => ':attribute phải là số từ :min đến :max',
        'numeric' => ':attribute phải là số',
     ];
  
     protected $customName = [
        'student_id' => 'Sinh viên',
        'subject_id' => 'Môn học',
        'score' => 'Điểm',
     ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input("search");
        $itemPerPage = env("ITEM_PER_PAGE", 2);
        $registers = Register::join('students', 'students.id', '=', 'registers.student_id')
            ->join('subjects', 'subjects.id', '=', 'registers.subject_id')
            ->where("students.name", "LIKE",  "%$search%")
            ->orwhere("subjects.name", "LIKE",  "%$search%")
            ->paginate($itemPerPage)->withQueryString();
        return view('register.index', ["registers" => $registers, "search" => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       
        $this->validate($request,$this->pattern, $this->messenger, $this->customName);
        
        $data       = $request->all();
        $register    = new Register();
        $register->student_id  = $data["student_id"];
        $register->subject_id  = $data["subject_id"];
        $register->save();
        $request->session()->put('success', 'Đã tạo đăng ký môn học thành công');
        return redirect()->route("registers.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {

        return view('register.show', ["register" => $register]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
        return view('register.edit', ["register" => $register]);
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
        //
        
        
        $this->validate($request,$this->updatePattern, $this->messenger, $this->customName);
        $data = $request->all();
        $register->score = $data["score"];
        $register->save();
        request()->session()->put('success', 'Đã cập nhật điểm thành công');
        return redirect()->route("registers.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
        try {
            $register->forceDelete();
            request()->session()->put('success', 'Đã xóa môn học thành công');
        }
        catch(QueryException $e) {
            if ($e->getCode() == 23000) {
                request()->session()->put('error', "Sinh viên đã đăng ký môn học, bạn không thể xóa");
            }
            else {
                request()->session()->put('error', $e->getMessage());
            }
            
        }
        return redirect()->route("registers.index");
    }
}
