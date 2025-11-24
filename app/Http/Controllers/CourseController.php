<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // GET /api/courses
    public function index()
    {
        return response()->json(Course::all());
    }

    // POST /api/courses
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'price' => 'required|integer',
        ]);

        $course = Course::create($data);

        return response()->json($course, 201);
    }

    // GET /api/courses/{id}
    public function show($id)
    {
        return response()->json(Course::findOrFail($id));
    }

    // PUT / PATCH /api/courses/{id}
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $course->update($request->all());

        return response()->json($course);
    }

    // DELETE /api/courses/{id}
    public function destroy($id)
    {
        Course::destroy($id);

        return response()->json(['message' => 'Course deleted successfully']);
    }
}
