<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Subject::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Subject::create($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        return $subject;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->all());
        $subject->save();
        return $subject;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return true;
    }
}
