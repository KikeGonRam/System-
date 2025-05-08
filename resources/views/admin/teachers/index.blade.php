@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">

    <div class="max-w-7xl mx-auto">
        <!-- Header with title and create button -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            <h1 class="text-3xl font-bold">
                <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">Gestión de Profesores</span>
            </h1>
            <a href="{{ route('admin.teachers.create') }}" 
               class="flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-medium py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:from-blue-700 hover:to-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Nuevo Profesor
            </a>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg shadow-sm">
            <div class="flex items-center">
                <svg class="h-5 w-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <p class="text-green-700 font-medium">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        @if (session('error'))
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg shadow-sm">
            <div class="flex items-center">
                <svg class="h-5 w-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                <p class="text-red-700 font-medium">{{ session('error') }}</p>
            </div>
        </div>
        @endif

        <!-- Table Container -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="w-full min-w-max">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 uppercase tracking-wider">Foto</th>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 uppercase tracking-wider">Nombre</th>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 uppercase tracking-wider">Apellido</th>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 uppercase tracking-wider">Género</th>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 uppercase tracking-wider">Edad</th>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 uppercase tracking-wider">Teléfono</th>
                            <th class="py-3 px-6 text-left font-semibold text-gray-700 uppercase tracking-wider">Idioma</th>
                            <th class="py-3 px-6 text-center font-semibold text-gray-700 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($teachers as $teacher)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <!-- Photo -->
                            <td class="py-4 px-6">
                                <div class="flex-shrink-0 h-12 w-12">
                                    <img class="h-12 w-12 rounded-full object-cover border-2 border-gray-200" 
                                         src="{{ $teacher->photo_url ?? asset('images/default-teacher.png') }}" 
                                         alt="{{ $teacher->name }} {{ $teacher->lastname }}">
                                </div>
                            </td>
                            
                            <!-- Name -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $teacher->name }}</div>
                            </td>
                            
                            <!-- Lastname -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $teacher->lastname }}</div>
                            </td>
                            
                            <!-- Email -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="text-sm text-gray-600">{{ $teacher->email }}</div>
                            </td>
                            
                            <!-- Gender -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($teacher->gender == 'masculino') bg-blue-100 text-blue-800
                                    @elseif($teacher->gender == 'femenino') bg-pink-100 text-pink-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $teacher->gender ? ucfirst($teacher->gender) : 'N/A' }}
                                </span>
                            </td>
                            
                            <!-- Age -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="text-sm text-gray-600">{{ $teacher->edad }} años</div>
                            </td>
                            
                            <!-- Phone -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="text-sm text-gray-600">{{ $teacher->phone_number ?? '-' }}</div>
                            </td>
                            
                            <!-- Language -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $teacher->language ?? '-' }}
                                </span>
                            </td>
                            
                            <!-- Actions -->
                            <td class="py-4 px-6 whitespace-nowrap text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.teachers.show', $teacher) }}" 
                                       class="text-blue-500 hover:text-blue-700 p-1 rounded-full hover:bg-blue-50 transition-colors duration-200"
                                       title="Ver detalles">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.teachers.edit', $teacher) }}" 
                                       class="text-green-500 hover:text-green-700 p-1 rounded-full hover:bg-green-50 transition-colors duration-200"
                                       title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50 transition-colors duration-200"
                                                onclick="return confirm('¿Estás seguro de eliminar este profesor?')"
                                                title="Eliminar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="py-8 px-6 text-center text-gray-500">
                                No se encontraron profesores registrados
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>
@endsection