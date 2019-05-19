<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentClassesRequest;
use App\Models\Student;

class StudentClassesController extends Controller
{
    public function addStudentToClass(StudentClassesRequest $request)
    {
        $student = Student::findOrFail($request->student_id);
        $student->classes()->attach($request->classes_id);

        return response()->json($student->classes);
    }

    public function removeStudentFromClass(StudentClassesRequest $request)
    {
        $student = Student::findOrFail($request->student_id);
        $student->classes()->detach($request->classes_id);

        return response()->json($student->classes);
    }
}
