<?php

namespace App\Http\Controllers\Student;

   use App\Http\Controllers\Controller;
   use Illuminate\Support\Facades\Auth;
   
   class StudentDashboardController extends Controller
   {
       public function index()
       {
           $student = Auth::guard('student')->user();
           $groups = $student->groups()->with('course', 'teacher')->get();
           $grades = $student->grades()->with('subject', 'group')->get();
           $schedules = $student->groups()->with(['schedules' => function ($query) {
               $query->with('subject', 'teacher', 'classroom');
           }])->get()->pluck('schedules')->flatten();

           return view('student.dashboard', compact('student', 'groups', 'grades', 'schedules'));
       }
   }
