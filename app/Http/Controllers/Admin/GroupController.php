<?php

namespace App\Http\Controllers\Admin;

   use App\Http\Controllers\Controller;
   use App\Models\Group;
   use App\Models\Course;
   use App\Models\Teacher;
   use App\Models\Student;
   use Illuminate\Http\Request;

   class GroupController extends Controller
   {
       public function index()
       {
           $groups = Group::with(['course', 'teacher', 'students'])->get();
           return view('admin.groups.index', compact('groups'));
       }

       public function create()
       {
           $courses = Course::all();
           $teachers = Teacher::all();
           $students = Student::all();
           return view('admin.groups.create', compact('courses', 'teachers', 'students'));
       }

       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'description' => 'nullable|string',
               'course_id' => 'required|exists:courses,id',
               'teacher_id' => 'required|exists:teachers,id',
               'students' => 'nullable|array',
               'students.*' => 'exists:students,id',
           ]);

           $group = Group::create($request->only(['name', 'description', 'course_id', 'teacher_id']));

           if ($request->has('students')) {
               $group->students()->sync($request->input('students'));
           }

           return redirect()->route('admin.groups.index')->with('success', 'Grupo creado exitosamente.');
       }

       public function show(Group $group)
       {
           $group->load(['course', 'teacher', 'students']);
           return view('admin.groups.show', compact('group'));
       }

       public function edit(Group $group)
       {
           $courses = Course::all();
           $teachers = Teacher::all();
           $students = Student::all();
           return view('admin.groups.edit', compact('group', 'courses', 'teachers', 'students'));
       }

       public function update(Request $request, Group $group)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'description' => 'nullable|string',
               'course_id' => 'required|exists:courses,id',
               'teacher_id' => 'required|exists:teachers,id',
               'students' => 'nullable|array',
               'students.*' => 'exists:students,id',
           ]);

           $group->update($request->only(['name', 'description', 'course_id', 'teacher_id']));

           $group->students()->sync($request->input('students', []));

           return redirect()->route('admin.groups.index')->with('success', 'Grupo actualizado exitosamente.');
       }

       public function destroy(Group $group)
       {
           $group->students()->detach();
           $group->delete();
           return redirect()->route('admin.groups.index')->with('success', 'Grupo eliminado exitosamente.');
       }
   }
