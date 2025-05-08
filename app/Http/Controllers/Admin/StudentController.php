<?php

    namespace App\Http\Controllers\Admin;

   use App\Http\Controllers\Controller;
   use App\Models\Student;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Storage;

   class StudentController extends Controller
   {
       public function index()
       {
           $students = Student::all();
           return view('admin.students.index', compact('students'));
       }

       public function create()
       {
           return view('admin.students.create');
       }

       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:students,email',
               'password' => 'required|string|min:8|confirmed',
               'date_of_birth' => 'required|date|before:today',
               'matricula' => 'required|string|unique:students,matricula',
               'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
           ]);

           $data = $request->only(['name', 'email', 'password', 'date_of_birth', 'matricula']);

           if ($request->hasFile('photo')) {
               $data['photo'] = $request->file('photo')->store('students', 'public');
           }

           Student::create($data);

           return redirect()->route('admin.students.index')->with('success', 'Alumno creado exitosamente.');
       }

       public function show(Student $student)
       {
           return view('admin.students.show', compact('student'));
       }

       public function edit(Student $student)
       {
           return view('admin.students.edit', compact('student'));
       }

       public function update(Request $request, Student $student)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:students,email,' . $student->id,
               'password' => 'nullable|string|min:8|confirmed',
               'date_of_birth' => 'required|date|before:today',
               'matricula' => 'required|string|unique:students,matricula,' . $student->id,
               'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
           ]);

           $data = $request->only(['name', 'email', 'date_of_birth', 'matricula']);

           if ($request->filled('password')) {
               $data['password'] = $request->password;
           }

           if ($request->hasFile('photo')) {
               // Eliminar la foto anterior si existe
               if ($student->photo) {
                   Storage::disk('public')->delete($student->photo);
               }
               $data['photo'] = $request->file('photo')->store('students', 'public');
           }

           $student->update($data);

           return redirect()->route('admin.students.index')->with('success', 'Alumno actualizado exitosamente.');
       }

       public function destroy(Student $student)
       {
           if ($student->photo) {
               Storage::disk('public')->delete($student->photo);
           }

           $student->delete();
           return redirect()->route('admin.students.index')->with('success', 'Alumno eliminado exitosamente.');
       }
   }
