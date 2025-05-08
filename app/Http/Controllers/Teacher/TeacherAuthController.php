<?php

namespace App\Http\Controllers\Teacher;

   use App\Http\Controllers\Controller;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Auth;

   class TeacherAuthController extends Controller
   {
       public function showLoginForm()
       {
           return view('teacher.auth.login');
       }

       public function login(Request $request)
       {
           $credentials = $request->validate([
               'email' => 'required|email',
               'password' => 'required',
           ]);

           if (Auth::guard('teacher')->attempt($credentials)) {
               $request->session()->regenerate();
               return redirect()->route('teacher.dashboard');
           }

           return back()->withErrors([
               'email' => 'Las credenciales no coinciden.',
           ])->onlyInput('email');
       }

       public function logout(Request $request)
       {
           Auth::guard('teacher')->logout();
           $request->session()->invalidate();
           $request->session()->regenerateToken();
           return redirect()->route('teacher.login');
       }
   }
