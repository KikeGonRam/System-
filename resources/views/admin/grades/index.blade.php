```html
   @extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-4xl">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Gestión de Calificaciones</h1>
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
           <a href="{{ route('admin.grades.create') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Registrar Calificación</a>
       </div>
       <table class="w-full border-collapse">
           <thead>
               <tr class="bg-gray-200">
                   <th class="p-3 text-left">Alumno</th>
                   <th class="p-3 text-left">Asignatura</th>
                   <th class="p-3 text-left">Grupo</th>
                   <th class="p-3 text-left">Calificación</th>
                   <th class="p-3 text-left">Fecha</th>
                   <th class="p-3 text-center">Acciones</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($grades as $grade)
                   <tr class="border-b">
                       <td class="p-3">{{ $grade->student->name }} {{ $grade->student->lastname }}</td>
                       <td class="p-3">{{ $grade->subject->name }}</td>
                       <td class="p-3">{{ $grade->group->name }}</td>
                       <td class="p-3">{{ number_format($grade->score, 2) }}</td>
                       <td class="p-3">{{ $grade->date ? $grade->date->format('d/m/Y') : '-' }}</td>
                       <td class="p-3 text-center">
                           <a href="{{ route('admin.grades.show', $grade) }}" class="text-blue-600 hover:underline">Ver</a>
                           <a href="{{ route('admin.grades.edit', $grade) }}" class="text-green-600 hover:underline ml-4">Editar</a>
                           <form action="{{ route('admin.grades.destroy', $grade) }}" method="POST" class="inline">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="text-red-600 hover:underline ml-4" onclick="return confirm('¿Estás seguro de eliminar esta calificación?')">Eliminar</button>
                           </form>
                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>
   @endsection
   ```