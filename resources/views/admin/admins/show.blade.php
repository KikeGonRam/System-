@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <!-- Card Header with Gradient -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-white">Detalles del Administrador</h1>
                    <div class="bg-blue-700 text-white rounded-full w-10 h-10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Card Body -->
            <div class="p-6">
                <!-- Admin Info -->
                <div class="flex flex-col md:flex-row gap-6 mb-8">
                    <!-- Avatar -->
                    <div class="flex-shrink-0">
                        <div class="bg-blue-100 text-blue-600 rounded-full w-24 h-24 flex items-center justify-center text-4xl font-bold mx-auto">
                            {{ substr($admin->name, 0, 1) }}
                        </div>
                    </div>
                    
                    <!-- Details -->
                    <div class="flex-grow">
                        <div class="space-y-4">
                            <!-- Name -->
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Nombre Completo</h3>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $admin->name }}</p>
                            </div>
                            
                            <!-- Email -->
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Correo Electrónico</h3>
                                <p class="mt-1 text-lg text-gray-900 break-all">{{ $admin->email }}</p>
                            </div>
                            
                            <!-- Creation Date -->
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Fecha de Creación</h3>
                                <p class="mt-1 text-lg text-gray-900">
                                    {{ $admin->created_at->format('d/m/Y H:i') }}
                                    <span class="text-sm text-gray-500 ml-2">({{ $admin->created_at->diffForHumans() }})</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Info Section -->
                <div class="border-t border-gray-200 pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Información Adicional</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Last Update -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Última Actualización</h4>
                            <p class="mt-1 text-gray-900">
                                {{ $admin->updated_at->format('d/m/Y H:i') }}
                                <span class="text-sm text-gray-500 ml-2">({{ $admin->updated_at->diffForHumans() }})</span>
                            </p>
                        </div>
                        
                        <!-- Status -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-500">Estado</h4>
                            <p class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3" />
                                    </svg>
                                    Activo
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row justify-end gap-3">
                    <a href="{{ route('admin.admins.index') }}" 
                       class="flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Volver al Listado
                    </a>
                    <a href="{{ route('admin.admins.edit', $admin) }}" 
                       class="flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Editar Administrador
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection