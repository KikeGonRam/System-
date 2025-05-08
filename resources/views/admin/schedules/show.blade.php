```html
   @extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-md">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Detalles del Horario</h1>
       <div class="mb-4">
           <strong class="text-gray-600">Grupo:</strong> {{ $schedule->group->name }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Asignatura:</strong> {{ $schedule->subject->name }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Profesor:</strong> {{ $schedule->teacher->name }} {{ $schedule->teacher->lastname }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Aula:</strong> {{ $schedule->classroom->name }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Día:</strong> {{ $schedule->day_of_week }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Horario:</strong> {{ $schedule->start_time }} - {{ $schedule->end_time }}
       </div>
       <div class="mb-4">
           <strong class="text-gray-600">Creado:</strong> {{ $schedule->created_at->format('d/m/Y H:i') }}
       </div>
       <div class="text-center">
           <a href="{{ route('admin.schedules.index') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Volver</a>
       </div>
   </div>
   @endsection
   ```