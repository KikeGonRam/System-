<?php

namespace App\Http\Controllers\Admin;

   use App\Http\Controllers\Controller;
   use App\Models\Course;
   use App\Models\Teacher;
   use Illuminate\Http\Request;

   class CourseController extends Controller
   {
       public function index()
       {
           $courses = Course::with('teacher')->get();
           return view('admin.courses.index', compact('courses'));
       }

       public function create()
       {
           $teachers = Teacher::all();
           return view('admin.courses.create', compact('teachers'));
       }

       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'description' => 'nullable|string',
               'teacher_id' => 'required|exists:teachers,id',
               'start_date' => 'required|date|after_or_equal:today',
               'end_date' => 'required|date|after:start_date',
           ]);

           Course::create($request->all());

           return redirect()->route('admin.courses.index')->with('success', 'Curso creado exitosamente.');
       }

       public function show(Course $course)
       {
           $course->load('teacher');
           return view('admin.courses.show', compact('course'));
       }

       public function edit(Course $course)
       {
           $teachers = Teacher::all();
           return view('admin.courses.edit', compact('course', 'teachers'));
       }

       public function update(Request $request, Course $course)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'description' => 'nullable|string',
               'teacher_id' => 'required|exists:teachers,id',
               'start_date' => 'required|date',
               'end_date' => 'required|date|after:start_date',
           ]);

           $course->update($request->all());

           return redirect()->route('admin.courses.index')->with('success', 'Curso actualizado exitosamente.');
       }

       public function destroy(Course $course)
       {
           $course->delete();
           return redirect()->route('admin.courses.index')->with('success', 'Curso eliminado exitosamente.');
       }
   }
