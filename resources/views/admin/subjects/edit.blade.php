```html
   @extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-md">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Editar Asignatura</h1>
       @if ($errors->any())
           <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
       <form action="{{ route('admin.subjects.update', $subject) }}" method="POST">
           @csrf
           @method('PUT')
           <div class="mb-4">
               <label for="name" class="block text-gray-600 mb-2">Nombre de la Asignatura</label>
               <input type="text" name="name" id="name" class="w-full p-2 border rounded @error('name') border-red-500 @enderror" value="{{ old('name', $subject->name) }}" required>
               @error('name')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-4">
               <label for="description" class="block text-gray-600 mb-2">Descripción</label>
               <textarea name="description" id="description" class="w-full p-2 border rounded @error('description') border-red-500 @enderror" rows="4">{{ old('description', $subject->description) }}</textarea>
               @error('description')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-4">
               <label for="course_id" class="block text-gray-600 mb-2">Curso</label>
               <select name="course_id" id="course_id" class="w-full p-2 border rounded @error('course_id') border-red-500 @enderror" required>
                   <option value="">Seleccione un curso</option>
                   @foreach ($courses as $course)
                       <option value="{{ $course->id }}" {{ old('course_id', $subject->course_id) == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                   @endforeach
               </select>
               @error('course_id')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-6">
               <label for="teacher_id" class="block text-gray-600 mb-2">Profesor</label>
               <select name="teacher_id" id="teacher_id" class="w-full p-2 border rounded @error('teacher_id') border-red-500 @enderror" required>
                   <option value="">Seleccione un profesor</option>
                   @foreach ($teachers as $teacher)
                       <option value="{{ $teacher->id }}" {{ old('teacher_id', $subject->teacher_id) == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }} {{ $teacher->lastname }}</option>
                   @endforeach
               </select>
               @error('teacher_id')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Actualizar Asignatura</button>
       </form>
   </div>
   @endsection
   ```