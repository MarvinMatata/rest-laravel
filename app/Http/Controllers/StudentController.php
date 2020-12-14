<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::all()->where('suspended', 'false');
        $courses = Course::all()->where('suspended', 'false');
        return view('students.create', ['students' => $students, 'courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Student::with('course')->get());
        $students = Student::all()->where('suspended', 'false');
        $courses = Course::all()->where('suspended', 'false');
        return view('students.create', ['students' => $students, 'courses' => $courses]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students',
            'full_name' => 'required',
            'email' => 'required|unique:students',
            'phone' => 'required|unique:students',
            'address' => 'required',
            'entry_points' => 'required',
            'course_id' => '',
        ]);

        $student = new Student([
            'student_id' => $request->get('student_id'),
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'entry_points' => $request->get('entry_points'),
            'course_id' => $request->get('course_id'),
        ]);

        $student->save();

        return redirect('/students/create')->with('success', $request->get('full_name') . ' registered successfully');
    }


    public function destroy($id)
    {
        $student = Student::find($id);
        $student->suspended = true;
        $student->save();
        return redirect('/students/create')->with('success', $student->full_name . ' deleted successfully');
    }
}
