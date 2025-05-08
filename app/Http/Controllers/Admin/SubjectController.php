<?php

namespace App\Http\Controllers\Admin;

   use App\Http\Controllers\Controller;
   use App\Models\Subject;
   use App\Models\Course;
   use App\Models\Teacher;
   use Illuminate\Http\Request;

   class SubjectController extends Controller
   {
       public function index()
       {
           $subjects = Subject::with(['course', 'teacher'])->get();
           return view('admin.subjects.index', compact('subjects'));
       }

       public function create()
       {
           $courses = Course::all();
           $teachers = Teacher::all();
           return view('admin.subjects.create', compact('courses', 'teachers'));
       }

       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'description' => 'nullable|string',
               'course_id' => 'required|exists:courses,id',
               'teacher_id' => 'required|exists:teachers,id',
           ]);

           Subject::create($request->all());

           return redirect()->route('admin.subjects.index')->with('success', 'Asignatura creada exitosamente.');
       }

       public function show(Subject $subject)
       {
           $subject->load(['course', 'teacher']);
           return view('admin.subjects.show', compact('subject'));
       }

       public function edit(Subject $subject)
       {
           $courses = Course::all();
           $teachers = Teacher::all();
           return view('admin.subjects.edit', compact('subject', 'courses', 'teachers'));
       }

       public function update(Request $request, Subject $subject)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'description' => 'nullable|string',
               'course_id' => 'required|exists:courses,id',
               'teacher_id' => 'required|exists:teachers,id',
           ]);

           $subject->update($request->all());

           return redirect()->route('admin.subjects.index')->with('success', 'Asignatura actualizada exitosamente.');
       }

       public function destroy(Subject $subject)
       {
           $subject->delete();
           return redirect()->route('admin.subjects.index')->with('success', 'Asignatura eliminada exitosamente.');
       }
   }
