```html
   @extends('admin.layouts.app')
   @section('content')
   <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-4xl">
       <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Gestión de Grupos</h1>
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
           <a href="{{ route('admin.groups.create') }}" class="inline-block bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Crear Grupo</a>
       </div>
       <table class="w-full border-collapse">
           <thead>
               <tr class="bg-gray-200">
                   <th class="p-3 text-left">Nombre</th>
                   <th class="p-3 text-left">Curso</th>
                   <th class="p-3 text-left">Profesor</th>
                   <th class="p-3 text-left">Alumnos</th>
                   <th class="p-3 text-center">Acciones</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($groups as $group)
                   <tr class="border-b">
                       <td class="p-3">{{ $group->name }}</td>
                       <td class="p-3">{{ $group->course->name }}</td>
                       <td class="p-3">{{ $group->teacher->name }} {{ $group->teacher->lastname }}</td>
                       <td class="p-3">{{ $group->students->count() }}</td>
                       <td class="p-3 text-center">
                           <a href="{{ route('admin.groups.show', $group) }}" class="text-blue-600 hover:underline">Ver</a>
                           <a href="{{ route('admin.groups.edit', $group) }}" class="text-green-600 hover:underline ml-4">Editar</a>
                           <form action="{{ route('admin.groups.destroy', $group) }}" method="POST" class="inline">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="text-red-600 hover:underline ml-4" onclick="return confirm('¿Estás seguro de eliminar este grupo?')">Eliminar</button>
                           </form>
                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>
   @endsection
   ```