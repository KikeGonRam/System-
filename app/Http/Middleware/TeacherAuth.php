<?php

namespace App\Http\Middleware;

   use Closure;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Auth;

   class TeacherAuth
   {
       public function handle(Request $request, Closure $next)
       {
           if (!Auth::guard('teacher')->check()) {
               return redirect()->route('teacher.auth.login')->with('error', 'Por favor, inicia sesión como profesor.');
           }

           return $next($request);
       }
   }