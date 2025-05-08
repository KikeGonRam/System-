```html
   @extends('layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-4xl">
       <h1 class="text-4xl font-bold text-blue-700 mb-4 animate-title text-center">Panel del Alumno</h1>
       <p class="text-lg text-gray-600 text-center mb-6">¡Bienvenido, {{ $student->name }} {{ $student->lastname }}!</p>

       <h2 class="text-2xl font-semibold text-blue-600 mb-4">Mis Grupos</h2>
       @if ($groups->isEmpty())
           <p class="text-gray-600">No estás inscrito en ningún grupo.</p>
       @else
           <table class="w-full border-collapse mb-6">
               <thead>
                   <tr class="bg-gray-200">
                       <th class="p-3 text-left">Grupo</th>
                       <th class="p-3 text-left">Curso</th>
                       <th class="p-3 text-left">Profesor</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($groups as $group)
                       <tr class="border-b">
                           <td class="p-3">{{ $group->name }}</td>
                           <td class="p-3">{{ $group->course->name }}</td>
                           <td class="p-3">{{ $group->teacher->name }} {{ $group->teacher->lastname }}</td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
       @endif

       <h2 class="text-2xl font-semibold text-blue-600 mb-4">Mis Calificaciones</h2>
       @if ($grades->isEmpty())
           <p class="text-gray-600">No tienes calificaciones registradas.</p>
       @else
           <table class="w-full border-collapse mb-6">
               <thead>
                   <tr class="bg-gray-200">
                       <th class="p-3 text-left">Asignatura</th>
                       <th class="p-3 text-left">Grupo</th>
                       <th class="p-3 text-left">Calificación</th>
                       <th class="p-3 text-left">Fecha</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($grades as $grade)
                       <tr class="border-b">
                           <td class="p-3">{{ $grade->subject->name }}</td>
                           <td class="p-3">{{ $grade->group->name }}</td>
                           <td class="p-3">{{ number_format($grade->score, 2) }}</td>
                           <td class="p-3">{{ $grade->date ? $grade->date->format('d/m/Y') : '-' }}</td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
       @endif

       <h2 class="text-2xl font-semibold text-blue-600 mb-4">Mis Horarios</h2>
       @if ($schedules->isEmpty())
           <p class="text-gray-600">No tienes horarios registrados.</p>
       @else
           <table class="w-full border-collapse mb-6">
               <thead>
                   <tr class="bg-gray-200">
                       <th class="p-3 text-left">Grupo</th>
                       <th class="p-3 text-left">Asignatura</th>
                       <th class="p-3 text-left">Profesor</th>
                       <th class="p-3 text-left">Aula</th>
                       <th class="p-3 text-left">Día</th>
                       <th class="p-3 text-left">Horario</th>
                   </tr>
               </thead>
               <tbody>
                   @foreach ($schedules as $schedule)
                       <tr class="border-b">
                           <td class="p-3">{{ $schedule->group->name }}</td>
                           <td class="p-3">{{ $schedule->subject->name }}</td>
                           <td class="p-3">{{ $schedule->teacher->name }} {{ $schedule->teacher->lastname }}</td>
                           <td class="p-3">{{ $schedule->classroom->name }}</td>
                           <td class="p-3">{{ $schedule->day_of_week }}</td>
                           <td class="p-3">{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                       </tr>
                   @endforeach
               </tbody>
           </table>
       @endif

       <div class="text-center">
           <form action="{{ route('student.logout') }}" method="POST">
               @csrf
               <button type="submit" class="inline-block bg-red-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-red-700 transition duration-300">Cerrar Sesión</button>
           </form>
       </div>
   </div>
   @endsection
   ```