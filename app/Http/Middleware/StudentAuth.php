<?php

namespace App\Http\Middleware;

   use Closure;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Auth;

   class StudentAuth
   {
       public function handle(Request $request, Closure $next)
       {
           if (!Auth::guard('student')->check()) {
               return redirect()->route('student.login')->with('error', 'Por favor, inicia sesión como alumno.');
           }

           return $next($request);
       }
   }
