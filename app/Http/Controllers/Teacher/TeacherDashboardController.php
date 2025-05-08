<?php

namespace App\Http\Controllers\Teacher;

   use App\Http\Controllers\Controller;
   use Illuminate\Support\Facades\Auth;

   class TeacherDashboardController extends Controller
   {
       public function index()
       {
           $teacher = Auth::guard('teacher')->user();
           $groups = $teacher->groups()->with('course', 'students')->get();
           $schedules = $teacher->schedules()->with('group', 'subject', 'classroom')->get();
           $grades = \App\Models\Grade::whereIn('group_id', $teacher->groups->pluck('id'))
               ->with('student', 'subject', 'group')
               ->get();

           return view('teacher.dashboard', compact('teacher', 'groups', 'schedules', 'grades'));
       }
   }
