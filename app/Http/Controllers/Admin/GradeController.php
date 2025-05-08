<?php

namespace App\Http\Controllers\Admin;

   use App\Http\Controllers\Controller;
   use App\Models\Grade;
   use App\Models\Student;
   use App\Models\Subject;
   use App\Models\Group;
   use Illuminate\Http\Request;

   class GradeController extends Controller
   {
       public function index()
       {
           $grades = Grade::with(['student', 'subject', 'group'])->get();
           return view('admin.grades.index', compact('grades'));
       }

       public function create()
       {
           $students = Student::all();
           $subjects = Subject::all();
           $groups = Group::all();
           return view('admin.grades.create', compact('students', 'subjects', 'groups'));
       }

       public function store(Request $request)
       {
           $request->validate([
               'student_id' => 'required|exists:students,id',
               'subject_id' => 'required|exists:subjects,id',
               'group_id' => 'required|exists:groups,id',
               'score' => 'required|numeric|between:0,10',
               'comments' => 'nullable|string',
               'date' => 'required|date|before_or_equal:today',
           ]);

           Grade::create($request->all());

           return redirect()->route('admin.grades.index')->with('success', 'Calificación registrada exitosamente.');
       }

       public function show(Grade $grade)
       {
           $grade->load(['student', 'subject', 'group']);
           return view('admin.grades.show', compact('grade'));
       }

       public function edit(Grade $grade)
       {
           $students = Student::all();
           $subjects = Subject::all();
           $groups = Group::all();
           return view('admin.grades.edit', compact('grade', 'students', 'subjects', 'groups'));
       }

       public function update(Request $request, Grade $grade)
       {
           $request->validate([
               'student_id' => 'required|exists:students,id',
               'subject_id' => 'required|exists:subjects,id',
               'group_id' => 'required|exists:groups,id',
               'score' => 'required|numeric|between:0,10',
               'comments' => 'nullable|string',
               'date' => 'required|date|before_or_equal:today',
           ]);

           $grade->update($request->all());

           return redirect()->route('admin.grades.index')->with('success', 'Calificación actualizada exitosamente.');
       }

       public function destroy(Grade $grade)
       {
           $grade->delete();
           return redirect()->route('admin.grades.index')->with('success', 'Calificación eliminada exitosamente.');
       }
   }
