<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Http\Resources\TeacherCollection;
use App\Http\Resources\TeacherResource;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TeacherCollection(Teacher::paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $teacher = Teacher::create(
            $request->all()
        );

        return new TeacherResource($teacher);
    }

    /**
     * Display the specified resource.
     *
     * @param  Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return new TeacherResource($teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TeacherRequest  $request
     * @param  Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $teacher->update(
            $request->all()
        );

        return new TeacherResource($teacher);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return new TeacherResource($teacher);
    }
}
