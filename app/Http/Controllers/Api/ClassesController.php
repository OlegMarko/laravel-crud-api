<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClassesCollection;
use App\Models\Classes;
use App\Http\Resources\ClassesResource;
use App\Http\Requests\ClassesRequest;
use App\Http\Resources\ClassesDailyScheduleCollection;
use App\Http\Resources\StudentCollection;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ClassesCollection(Classes::paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClassesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassesRequest $request)
    {
        $class = Classes::create(
            $request->all()
        );

        return new ClassesResource($class);
    }

    /**
     * Display the specified resource.
     *
     * @param  Classes  $class
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $class)
    {
        return new ClassesResource($class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClassesRequest  $request
     * @param  Classes  $class
     * @return \Illuminate\Http\Response
     */
    public function update(ClassesRequest $request, Classes $class)
    {
        $class->update(
            $request->all()
        );

        return new ClassesResource($class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Classes  $class
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $class)
    {
        $class->delete();

        return new ClassesResource($class);
    }

    public function getStudents(Classes $class)
    {
        return new StudentCollection($class->students);
    }

    public function getStudentsOnClassAsGroup()
    {
        // ToDo: ??
    }

    public function getDailySchedule()
    {
        $schedule = Classes::orderBy('day', 'ASC')
            ->orderBy('time', 'ASC')
            ->paginate(3);

        return new ClassesDailyScheduleCollection($schedule);
    }
}
