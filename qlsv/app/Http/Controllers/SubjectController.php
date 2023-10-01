<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subjects = Subject::where("name", "LIKE", "%$request->search%")->paginate(4)->withQueryString();
        return view('subject.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.create');
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
        $subject = new Subject();
        $subject->name = $data['name'];
        $subject->number_of_credit = $data['number_of_credit'];
        $subject->save();
        request()->session()->put("success", "Thêm thành công môn {$subject->name}");
        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        try {
            $subject->forceDelete();
            request()->session()->put("success", "Xóa thành công môn học");
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                request()->session()->put("error", "Môn học này đã được sinh viên đăng kí không thể xóa");
            } else {
                request()->session()->put("error", $e->getMessage());
            }
        }
        return redirect()->route('subjects.index');
    }
    public function unregistered($id)
    {
        $subjects = Subject::whereNotIn('id', function ($query) use ($id) {
            $query->select('subject_id')->from('registers')->where('student_id', '=', $id);
        })->get();
        $unRegisterSubject = [];
        foreach ($subjects as $subject) {
            $unRegisterSubject[] = ["id" => $subject->id, "name" => $subject->name];
        }
        echo json_encode($unRegisterSubject);
    }
}
