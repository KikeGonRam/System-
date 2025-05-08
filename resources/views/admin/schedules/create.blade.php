```html
   @extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-md">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Crear Horario</h1>
       @if ($errors->any())
           <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
       <form action="{{ route('admin.schedules.store') }}" method="POST">
           @csrf
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
               <label for="teacher_id" class="block text-gray-600 mb-2">Profesor</label>
               <select name="teacher_id" id="teacher_id" class="w-full p-2 border rounded @error('teacher_id') border-red-500 @enderror" required>
                   <option value="">Seleccione un profesor</option>
                   @foreach ($teachers as $teacher)
                       <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }} {{ $teacher->lastname }}</option>
                   @endforeach
               </select>
               @error('teacher_id')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-4">
               <label for="classroom_id" class="block text-gray-600 mb-2">Aula</label>
               <select name="classroom_id" id="classroom_id" class="w-full p-2 border rounded @error('classroom_id') border-red-500 @enderror" required>
                   <option value="">Seleccione un aula</option>
                   @foreach ($classrooms as $classroom)
                       <option value="{{ $classroom->id }}" {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>{{ $classroom->name }} (Capacidad: {{ $classroom->capacity }})</option>
                   @endforeach
                   <option value="nueva">OPCIONAL</option>
               </select>
               @error('classroom_id')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-4">
               <label for="day_of_week" class="block text-gray-600 mb-2">Día de la semana</label>
               <select name="day_of_week" id="day_of_week" class="w-full p-2 border rounded @error('day_of_week') border-red-500 @enderror" required>
                   <option value="">Seleccione un día</option>
                   @foreach (['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'] as $day)
                       <option value="{{ $day }}" {{ old('day_of_week') == $day ? 'selected' : '' }}>{{ $day }}</option>
                   @endforeach
               </select>
               @error('day_of_week')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-4">
               <label for="start_time" class="block text-gray-600 mb-2">Hora de inicio</label>
               <input type="time" name="start_time" id="start_time" class="w-full p-2 border rounded @error('start_time') border-red-500 @enderror" value="{{ old('start_time') }}" required>
               @error('start_time')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <div class="mb-6">
               <label for="end_time" class="block text-gray-600 mb-2">Hora de fin</label>
               <input type="time" name="end_time" id="end_time" class="w-full p-2 border rounded @error('end_time') border-red-500 @enderror" value="{{ old('end_time') }}" required>
               @error('end_time')
                   <span class="text-red-500 text-sm">{{ $message }}</span>
               @enderror
           </div>
           <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Crear Horario</button>
       </form>
   </div>
   @endsection
   ```