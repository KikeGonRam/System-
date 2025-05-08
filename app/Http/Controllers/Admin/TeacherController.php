<?php

namespace App\Http\Controllers\Admin;

   use App\Http\Controllers\Controller;
   use App\Models\Teacher;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Storage;

   class TeacherController extends Controller
   {
       public function index()
       {
           $teachers = Teacher::all();
           return view('admin.teachers.index', compact('teachers'));
       }

       public function create()
       {
           return view('admin.teachers.create');
       }

       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'lastname' => 'required|string|max:255',
               'email' => 'required|email|unique:teachers,email',
               'password' => 'required|string|min:8|confirmed',
               'gender' => 'nullable|in:male,female,other',
               'date_of_birth' => 'required|date|before:today',
               'phone_number' => 'nullable|string|max:20',
               'language' => 'nullable|string|max:100',
               'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
           ]);

           $data = $request->only(['name', 'lastname', 'email', 'password', 'gender', 'date_of_birth', 'phone_number', 'language']);

           if ($request->hasFile('photo')) {
               $data['photo'] = $request->file('photo')->store('teachers', 'public');
           }

           Teacher::create($data);

           return redirect()->route('admin.teachers.index')->with('success', 'Profesor creado exitosamente.');
       }

       public function show(Teacher $teacher)
       {
           return view('admin.teachers.show', compact('teacher'));
       }

       public function edit(Teacher $teacher)
       {
           return view('admin.teachers.edit', compact('teacher'));
       }

       public function update(Request $request, Teacher $teacher)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'lastname' => 'required|string|max:255',
               'email' => 'required|email|unique:teachers,email,' . $teacher->id,
               'password' => 'nullable|string|min:8|confirmed',
               'gender' => 'nullable|in:male,female,other',
               'date_of_birth' => 'required|date|before:today',
               'phone_number' => 'nullable|string|max:20',
               'language' => 'nullable|string|max:100',
               'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
           ]);

           $data = $request->only(['name', 'lastname', 'email', 'gender', 'date_of_birth', 'phone_number', 'language']);

           if ($request->filled('password')) {
               $data['password'] = $request->password;
           }

           if ($request->hasFile('photo')) {
               if ($teacher->photo) {
                   Storage::disk('public')->delete($teacher->photo);
               }
               $data['photo'] = $request->file('photo')->store('teachers', 'public');
           }

           $teacher->update($data);

           return redirect()->route('admin.teachers.index')->with('success', 'Profesor actualizado exitosamente.');
       }

       public function destroy(Teacher $teacher)
       {
           if ($teacher->photo) {
               Storage::disk('public')->delete($teacher->photo);
           }

           $teacher->delete();
           return redirect()->route('admin.teachers.index')->with('success', 'Profesor eliminado exitosamente.');
       }
   }
