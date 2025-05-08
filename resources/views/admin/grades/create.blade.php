```html
   @extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-md">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Registrar Calificación</h1>
       @if ($errors->any())
           <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
       <form action="{{ route('admin.grades.store') }}" method="POST">
           @csrf
           <div class="mb-4">
               <label for="student_id" class="block text-gray-600 mb-2">Alumno</label>
               <select name="student_id" id="student_id" class="w-full p-2 border rounded @error('student_id') border-red-500 @enderror" required>
                   <option value="">Seleccione un alumno</option>
                   @foreach ($students as $student)
                       <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>{{ $student->name }} {{ $student->lastname }}</option>
                   @endforeach
               </select>
               @error('student_id')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-4">
               <label for="subject_id" class="block text-gray-600 mb-2">Asignatura</label>
               <select name="subject_id" id="subject_id" class="w-full p-2 border rounded @error('subject_id') border-red-500 @enderror" required>
                   <option value="">Seleccione una asignatura</option>
                   @foreach ($subjects as $subject)
                       <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                   @endforeach
               </select>
               @error('subject_id')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-4">
               <label for="group_id" class="block text-gray-600 mb-2">Grupo</label>
               <select name="group_id" id="group_id" class="w-full p-2 border rounded @error('group_id') border-red-500 @enderror" required>
                   <option value="">Seleccione un grupo</option>
                   @foreach ($groups as $group)
                       <option value="{{ $group->id }}" {{ old('group_id') == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                   @endforeach
               </select>
               @error('group_id')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-4">
               <label for="score" class="block text-gray-600 mb-2">Calificación (0-10)</label>
               <input type="number" name="score" id="score" step="0.01" min="0" max="10" class="w-full p-2 border rounded @error('score') border-red-500 @enderror" value="{{ old('score') }}" required>
               @error('score')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-4">
               <label for="comments" class="block text-gray-600 mb-2">Comentarios</label>
               <textarea name="comments" id="comments" class="w-full p-2 border rounded @error('comments') border-red-500 @enderror" rows="4">{{ old('comments') }}</textarea>
               @error('comments')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-6">
               <label for="date" class="block text-gray-600 mb-2">Fecha</label>
               <input type="date" name="date" id="date" class="w-full p-2 border rounded @error('date') border-red-500 @enderror" value="{{ old('date') }}" required>
               @error('date')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Registrar Calificación</button>
       </form>
   </div>
   @endsection
   ```