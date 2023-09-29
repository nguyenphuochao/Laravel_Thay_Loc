<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Student;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registers = Register::paginate(10)->withQueryString();
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
        //
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
    }
}
