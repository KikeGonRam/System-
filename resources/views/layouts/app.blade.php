```html
   <!DOCTYPE html>
   <html lang="es">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Sistema Escolar</title>
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
   <body class="bg-gray-100">
       @yield('content')
   </body>
   </html>
   ```