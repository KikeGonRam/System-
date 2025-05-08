```html
   @extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-md">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Detalles del Grupo</h1>
       <div class="mb-4">
           <strong class="text-gray-600">Nombre:</strong> {{ $group->name }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Descripción:</strong> {{ $group->description ?? '-' }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Curso:</strong> {{ $group->course->name }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Profesor:</strong> {{ $group->teacher->name }} {{ $group->teacher->lastname }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Alumnos:</strong>
           @if ($group->students->isEmpty())
               Ninguno
           @else
               <ul class="list-disc pl-5">
                   @foreach ($group->students as $student)
                       <li>{{ $student->name }} {{ $student->lastname }}</li>
                   @endforeach
               </ul>
           @endif
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Creado:</strong> {{ $group->created_at->format('d/m/Y H:i') }}
       </div>
       <div class="text-center">
           <a href="{{ route('admin.groups.index') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Volver</a>
       </div>
   </div>
   @endsection
   ```