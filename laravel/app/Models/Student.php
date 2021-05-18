<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $table = 'student';

    public function id_show($id){
        return DB::table('student as s')
        ->join('course as c', 'c.id', '=', 's.course_type')
        ->select('s.*', 'c.course_name as c_name')
        ->where('s.id', $id)
        ->get();
    }
}
