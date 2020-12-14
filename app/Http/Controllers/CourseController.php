<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::all()->where('suspended', false);
        return view('courses.create', compact('courses'));
    }


    public function create()
    {
        $courses = Course::all()->where('suspended', false);
        return view('courses.create', compact('courses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses'
        ]);

        $course = new Course([
            'name' => $request->get('name')
        ]);
        $course->save();
        return redirect('/courses/create')->with('success', 'Course saved!');
    }

    
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->suspended = true;
        $course->save();
        return redirect('/courses/create')->with('success', $course->name . ' deleted successfully');
    }
}
