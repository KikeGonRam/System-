```html
   @extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-md">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Detalles del Curso</h1>
       <div class="mb-4">
           <strong class="text-gray-600">Nombre:</strong> {{ $course->name }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Descripción:</strong> {{ $course->description ?? '-' }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Profesor:</strong> {{ $course->teacher->name }} {{ $course->teacher->lastname }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Fecha de Inicio:</strong> {{ $course->start_date->format('d/m/Y') }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Fecha de Fin:</strong> {{ $course->end_date->format('d/m/Y') }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Creado:</strong> {{ $course->created_at->format('d/m/Y H:i') }}
       </div>
       <div class="text-center">
           <a href="{{ route('admin.courses.index') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Volver</a>
       </div>
   </div>
   @endsection
   ```