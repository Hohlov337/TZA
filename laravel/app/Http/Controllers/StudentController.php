<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    protected function schema()
    {
        return DB::table('student as s')
            ->join('course as c', 'c.id', '=', 's.course_type')
            ->select('s.*', 'c.course_name as c_name');
    }

    public function index(?Request $request)
    {
        $sort = $request->sort;
        if (isset($request) && $sort != null) {
            switch ($sort) {
                case 1:
                    $sorted =
                        $this->schema()
                            ->orderBy('name');
                    break;
                case 2:
                    $sorted =
                        $this->schema()
                            ->orderBy('course_name');
                    break;
                case 3:
                    $sorted =
                        $this->schema()
                            ->orderBy('date','desc');
                    break;
            }
            return view('guest.index', ['data' =>
                $sorted
                    ->get()]);
        } else {
            return view('guest.index', ['data' =>
                $this->schema()->get()]);
        }
    }

    public function show(Request $request)
    {
        return view('guest.find', ['data' => DB::table('student as s')
            ->join('course as c', 'c.id', '=', 's.course_type')
            ->select('s.*', 'c.course_name as c_name')
            ->where('s.name', 'like', '%' . $request->name . '%')
            ->get()]);
    }
}
