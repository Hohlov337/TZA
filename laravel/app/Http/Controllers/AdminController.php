<?php

namespace App\Http\Controllers;

use App\Http\Controllers\StudentController;
use App\Models\Student;
use \App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', ['data' => DB::table('student as s')
            ->join('course as c', 'c.id', '=', 's.course_type')
            ->select('s.*', 'c.course_name as c_name')
            ->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add', ['courses' => (new Course())->courses()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new Student;
        $add->name = $request->input('name');
        $add->course_type = $request->input('course_type');
        $add->course_name = $request->input('course_name');
        $add->date = $request->input('date');
        $add->save();
        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.edit', [
            'courses' => (new Course)->courses(),
            'result' => (new Student)->id_show($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('student')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'course_type' => $request->input('course_type'),
                'course_name' => $request->input('course_name'),
                'date' => $request->input('date')
            ]);
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('student')->where('id', '=', $id)->delete();
        return redirect()->route('course.index');
    }
}
