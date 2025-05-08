```html
   @extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-md">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Detalles de la Calificación</h1>
       <div class="mb-4">
           <strong class="text-gray-600">Alumno:</strong> {{ $grade->student->name }} {{ $grade->student->lastname }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Asignatura:</strong> {{ $grade->subject->name }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Grupo:</strong> {{ $grade->group->name }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Calificación:</strong> {{ number_format($grade->score, 2) }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Comentarios:</strong> {{ $grade->comments ?? '-' }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Fecha:</strong> {{ $grade->date ? $grade->date->format('d/m/Y') : '-' }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Creado:</strong> {{ $grade->created_at->format('d/m/Y H:i') }}
       </div>
       <div class="text-center">
           <a href="{{ route('admin.grades.index') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Volver</a>
       </div>
   </div>
   @endsection
   ```