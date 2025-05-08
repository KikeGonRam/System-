@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto">
        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-4">
                <h1 class="text-2xl font-bold text-white text-center">Editar Profesor</h1>
            </div>
            
            <!-- Card Body -->
            <div class="p-6">
                <!-- Error Messages -->
                @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg">
                    <div class="flex">
                        <svg class="h-5 w-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-red-800">Hay problemas con los datos ingresados</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Form -->
                <form action="{{ route('admin.teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="name" id="name" 
                                   class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md @error('name') border-red-300 text-red-900 @enderror" 
                                   value="{{ old('name', $teacher->name) }}" 
                                   placeholder="Ej: Carlos" required>
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lastname Field -->
                    <div class="mb-4">
                        <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="lastname" id="lastname" 
                                   class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md @error('lastname') border-red-300 text-red-900 @enderror" 
                                   value="{{ old('lastname', $teacher->lastname) }}" 
                                   placeholder="Ej: González" required>
                        </div>
                        @error('lastname')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" 
                                   class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md @error('email') border-red-300 text-red-900 @enderror" 
                                   value="{{ old('email', $teacher->email) }}" 
                                   placeholder="Ej: profesor@escuela.com" required>
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Nueva Contraseña (opcional)</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="password" name="password" id="password" 
                                   class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md @error('password') border-red-300 text-red-900 @enderror" 
                                   placeholder="Dejar en blanco para no cambiar">
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Nueva Contraseña</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                   class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md" 
                                   placeholder="Repite la nueva contraseña">
                        </div>
                    </div>

                    <!-- Gender Field -->
                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Género</label>
                        <select name="gender" id="gender" 
                                class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-md @error('gender') border-red-300 text-red-900 @enderror">
                            <option value="">Seleccione una opción</option>
                            <option value="masculino" {{ old('gender', $teacher->gender) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="femenino" {{ old('gender', $teacher->gender) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="otro" {{ old('gender', $teacher->gender) == 'otro' ? 'selected' : '' }}>Otro</option>
                            <option value="prefiero_no_decirlo" {{ old('gender', $teacher->gender) == 'prefiero_no_decirlo' ? 'selected' : '' }}>Prefiero no decirlo</option>
                        </select>
                        @error('gender')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone Number Field -->
                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Número de Teléfono</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div>
                            <input type="tel" name="phone_number" id="phone_number" 
                                   class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md @error('phone_number') border-red-300 text-red-900 @enderror" 
                                   value="{{ old('phone_number', $teacher->phone_number) }}" 
                                   placeholder="Ej: +52 55 1234 5678">
                        </div>
                        @error('phone_number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Language Field -->
                    <div class="mb-4">
                        <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Idioma</label>
                        <select name="language" id="language" 
                                class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-md @error('language') border-red-300 text-red-900 @enderror">
                            <option value="">Seleccione un idioma</option>
                            <option value="Español" {{ old('language', $teacher->language) == 'Español' ? 'selected' : '' }}>Español</option>
                            <option value="Inglés" {{ old('language', $teacher->language) == 'Inglés' ? 'selected' : '' }}>Inglés</option>
                            <option value="Francés" {{ old('language', $teacher->language) == 'Francés' ? 'selected' : '' }}>Francés</option>
                            <option value="Alemán" {{ old('language', $teacher->language) == 'Alemán' ? 'selected' : '' }}>Alemán</option>
                            <option value="Italiano" {{ old('language', $teacher->language) == 'Italiano' ? 'selected' : '' }}>Italiano</option>
                            <option value="Portugués" {{ old('language', $teacher->language) == 'Portugués' ? 'selected' : '' }}>Portugués</option>
                            <option value="Chino Mandarín" {{ old('language', $teacher->language) == 'Chino Mandarín' ? 'selected' : '' }}>Chino Mandarín</option>
                            <option value="Japonés" {{ old('language', $teacher->language) == 'Japonés' ? 'selected' : '' }}>Japonés</option>
                            <option value="Ruso" {{ old('language', $teacher->language) == 'Ruso' ? 'selected' : '' }}>Ruso</option>
                            <option value="Árabe" {{ old('language', $teacher->language) == 'Árabe' ? 'selected' : '' }}>Árabe</option>
                            <option value="Otro" {{ old('language', $teacher->language) == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('language')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Photo Field -->
                    <div class="mb-6">
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Foto de Perfil</label>
                        
                        <!-- Current Photo -->
                        @if($teacher->photo_url)
                        <div class="flex items-center mb-4">
                            <div class="relative mr-4">
                                <img src="{{ $teacher->photo_url }}" alt="Foto actual" class="w-16 h-16 rounded-full object-cover border-2 border-blue-200">
                                <span class="absolute top-0 right-0 bg-blue-600 text-white text-xs px-1 rounded-full">Actual</span>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Si subes una nueva foto, reemplazará la actual.</p>
                            </div>
                        </div>
                        @endif
                        
                        <!-- File Input -->
                        <div class="flex items-center">
                            <label for="photo" class="cursor-pointer">
                                <div class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-blue-500 transition-colors duration-200">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="mt-2 text-sm text-gray-600">Seleccionar nueva imagen</span>
                                    <input type="file" name="photo" id="photo" class="hidden" accept="image/*">
                                </div>
                            </label>
                        </div>
                        @error('photo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3">
                        <a href="{{ route('admin.teachers.index', $teacher) }}" 
                           class="flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Actualizar Profesor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection