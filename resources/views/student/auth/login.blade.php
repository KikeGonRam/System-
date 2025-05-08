```html
   <!DOCTYPE html>
   <html lang="es">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Iniciar Sesión - Alumno</title>
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <style>
           .animate-title {
               animation: slideIn 0.5s ease-in-out;
           }
           @keyframes slideIn {
               from { transform: translateY(-20px); opacity: 0; }
               to { transform: translateY(0); opacity: 1; }
           }
       </style>
   </head>
   <body class="bg-gray-100 flex items-center justify-center min-h-screen">
       <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
           <h1 class="text-3xl font-bold text-blue-700 mb-6 animate-title text-center">Iniciar Sesión - Alumno</h1>
           @if (session('error'))
               <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                   {{ session('error') }}
               </div>
           @endif
           @if ($errors->any())
               <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <form action="{{ route('student.login.post') }}" method="POST">
               @csrf
               <div class="mb-4">
                   <label for="email" class="block text-gray-600 mb-2">Correo Electrónico</label>
                   <input type="email" name="email" id="email" class="w-full p-2 border rounded @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                   @error('email')
                       <span class="text-red-500 text-sm">{{ $message }}</span>
                   @enderror
               </div>
               <div class="mb-6">
                   <label for="password" class="block text-gray-600 mb-2">Contraseña</label>
                   <input type="password" name="password" id="password" class="w-full p-2 border rounded @error('password') border-red-500 @enderror" required>
                   @error('password')
                       <span class="text-red-500 text-sm">{{ $message }}</span>
                   @enderror
               </div>
               <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Iniciar Sesión</button>
           </form>
       </div>
   </body>
   </html>
   ```