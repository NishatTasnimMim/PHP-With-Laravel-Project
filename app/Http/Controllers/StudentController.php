<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $students, $student;
    public function index()
    {
        $this->students = Student::all();
        return view('front.student.index', [
            'students' => $this->students
        ]);
    }

    public function create ()
    {
        return view('front.student.create');
    }

    public function store (Request $request)
    {
        Student::createS($request);
        return back()->with('success', 'Student Created Successfully');
    }

    public function destroy($studentId)
    {
        $this->student = Student::find($studentId);
        if (file_exists($this->student->image))
        {
            unlink($this->student->image);
        }
        $this->student->delete();
        return back()->with('success', 'Student deleted successfully');
    }

    public function edit($Id)
    {
        $this->student = Student::find($Id);

        return view('front.student.edit', [
            'student' => $this->student,
        ]);
    }

    public function update (Request $request, $id)
    {

        Student::updateS($request, $id);
        return redirect('/manage-student')->with('success', 'Student Updated Successfully');
//        return view('front.student.update');
    }

    public function details ($id)
    {
        $this->student = Student::find($id);
        return view('front.student.details', [
            'student' => $this->student
        ]);
    }
}
