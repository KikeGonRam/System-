
@extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-5xl">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Gestión de Horarios</h1>
       @if (session('success'))
           <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
               {{ session('success') }}
           </div>
       @endif
       @if (session('error'))
           <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
               {{ session('error') }}
           </div>
       @endif
       <div class="mb-4">
           <a href="{{ route('admin.schedules.create') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Crear Horario</a>
       </div>
       <table class="w-full border-collapse">
           <thead>
               <tr class="bg-gray-200">
                   <th class="p-3 text-left">Grupo</th>
                   <th class="p-3 text-left">Asignatura</th>
                   <th class="p-3 text-left">Profesor</th>
                   <th class="p-3 text-left">Aula</th>
                   <th class="p-3 text-left">Día</th>
                   <th class="p-3 text-left">Horario</th>
                   <th class="p-3 text-center">Acciones</th>
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
                       <td class="p-3 text-center">
                           <a href="{{ route('admin.schedules.show', $schedule) }}" class="text-blue-600 hover:underline">Ver</a>
                           <a href="{{ route('admin.schedules.edit', $schedule) }}" class="text-green-600 hover:underline ml-4">Editar</a>
                           <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST" class="inline">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="text-red-600 hover:underline ml-4" onclick="return confirm('¿Estás seguro de eliminar este horario?')">Eliminar</button>
                           </form>
                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>
   @endsection
