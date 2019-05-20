<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClassesCollection;
use App\Models\Classes;
use App\Http\Resources\ClassesResource;
use App\Http\Requests\ClassesRequest;
use App\Http\Resources\ClassesDailyScheduleCollection;
use App\Http\Resources\StudentCollection;

/**
 * @SWG\Tag(
 *     name="Classes",
 *     description="Operations about Classes"
 * )
 */
class ClassesController extends Controller
{
    /**
     * @SWG\Get(
     *   path="/classes",
     *   summary="All Classes",
     *   tags={"Classes"},
     *   @SWG\Parameter(
     *     name="page",
     *     in="query",
     *     description="Number of page.",
     *     required=false,
     *     type="integer"
     *   ),
     *
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ClassesCollection(Classes::paginate(3));
    }

    /**
     * @SWG\Post(
     *   path="/classes",
     *   summary="Create Class",
     *   consumes={"application/x-www-form-urlencoded"},
     *   produces={"application/json"},
     *   tags={"Classes"},
     *   @SWG\Parameter(
     *     name="title",
     *     in="formData",
     *     description="Class Name",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="day",
     *     in="formData",
     *     description="Day",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="time",
     *     in="formData",
     *     description="Starting hours",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="teacher_id",
     *     in="formData",
     *     description="Teacher",
     *     required=true,
     *     type="integer"
     *   ),
     *
     *   @SWG\Response(response=201, description="successful operation"),
     *   @SWG\Response(response=422, description="validation fail"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
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
     * @SWG\Get(
     *   path="/classes/{class}",
     *   summary="Get Class by Id",
     *   tags={"Classes"},
     *   @SWG\Parameter(
     *     name="class",
     *     in="path",
     *     description="Class Id",
     *     required=true,
     *     type="integer"
     *   ),
     *
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=404, description="resource not found"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
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
     * @SWG\Put(
     *   path="/classes/{class}",
     *   summary="Update Class",
     *   consumes={"application/x-www-form-urlencoded"},
     *   produces={"application/json"},
     *   tags={"Classes"},
     *   @SWG\Parameter(
     *     name="class",
     *     in="path",
     *     description="Class Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   @SWG\Parameter(
     *     name="title",
     *     in="formData",
     *     description="Class Name",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="day",
     *     in="formData",
     *     description="Day",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="time",
     *     in="formData",
     *     description="Starting hours",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="teacher_id",
     *     in="formData",
     *     description="Teacher",
     *     required=true,
     *     type="integer"
     *   ),
     *
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=404, description="resource not found"),
     *   @SWG\Response(response=422, description="validation fail"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
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
     * @SWG\Delete(
     *   path="/classes/{class}",
     *   summary="Remove Class",
     *   consumes={"application/x-www-form-urlencoded"},
     *   produces={"application/json"},
     *   tags={"Classes"},
     *   @SWG\Parameter(
     *     name="class",
     *     in="path",
     *     description="Class Id",
     *     required=true,
     *     type="integer"
     *   ),
     *
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=404, description="resource not found"),
     *   @SWG\Response(response=422, description="validation fail"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
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

    /**
     * @SWG\Get(
     *   path="/classes/{class}/students",
     *   summary="Get students in the Class",
     *   consumes={"application/x-www-form-urlencoded"},
     *   produces={"application/json"},
     *   tags={"Classes"},
     *   @SWG\Parameter(
     *     name="class",
     *     in="path",
     *     description="Class Id",
     *     required=true,
     *     type="integer"
     *   ),
     *
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=404, description="resource not found"),
     *   @SWG\Response(response=422, description="validation fail"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     * Get students in the Class.
     *
     * @param Classes $class
     * @return void
     */
    public function getStudents(Classes $class)
    {
        return new StudentCollection($class->students);
    }

    public function getStudentsOnClassAsGroup()
    {
        // ToDo: ??
    }

    /**
     * @SWG\Get(
     *   path="/classes/schedule",
     *   summary="Get daily Classes schedule",
     *   consumes={"application/x-www-form-urlencoded"},
     *   produces={"application/json"},
     *   tags={"Classes"},
     *   @SWG\Parameter(
     *     name="page",
     *     in="query",
     *     description="Number of page.",
     *     required=false,
     *     type="integer"
     *   ),
     *
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=500, description="internal server error")
     * )
     *
     * Get Daily Schedule.
     *
     * @return void
     */
    public function getDailySchedule()
    {
        $schedule = Classes::orderBy('day', 'ASC')
            ->orderBy('time', 'ASC')
            ->paginate(3);

        return new ClassesDailyScheduleCollection($schedule);
    }
}
