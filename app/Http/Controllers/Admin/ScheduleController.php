<?php

namespace App\Http\Controllers\Admin;

   use App\Http\Controllers\Controller;
   use App\Models\Schedule;
   use App\Models\Group;
   use App\Models\Subject;
   use App\Models\Teacher;
   use App\Models\Classroom;
   use Illuminate\Http\Request;

   class ScheduleController extends Controller
   {
       public function index()
       {
           $schedules = Schedule::with(['group', 'subject', 'teacher', 'classroom'])->get();
           return view('admin.schedules.index', compact('schedules'));
       }

       public function create()
       {
           $groups = Group::all();
           $subjects = Subject::all();
           $teachers = Teacher::all();
           $classrooms = Classroom::all();
           return view('admin.schedules.create', compact('groups', 'subjects', 'teachers', 'classrooms'));
       }

       public function store(Request $request)
       {
           $request->validate([
               'group_id' => 'required|exists:groups,id',
               'subject_id' => 'required|exists:subjects,id',
               'teacher_id' => 'required|exists:teachers,id',
               'classroom_id' => 'required|exists:classrooms,id',
               'day_of_week' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
               'start_time' => 'required|date_format:H:i',
               'end_time' => 'required|date_format:H:i|after:start_time',
           ]);

           Schedule::create($request->all());

           return redirect()->route('admin.schedules.index')->with('success', 'Horario creado exitosamente.');
       }

       public function show(Schedule $schedule)
       {
           $schedule->load(['group', 'subject', 'teacher', 'classroom']);
           return view('admin.schedules.show', compact('schedule'));
       }

       public function edit(Schedule $schedule)
       {
           $groups = Group::all();
           $subjects = Subject::all();
           $teachers = Teacher::all();
           $classrooms = Classroom::all();
           return view('admin.schedules.edit', compact('schedule', 'groups', 'subjects', 'teachers', 'classrooms'));
       }

       public function update(Request $request, Schedule $schedule)
       {
           $request->validate([
               'group_id' => 'required|exists:groups,id',
               'subject_id' => 'required|exists:subjects,id',
               'teacher_id' => 'required|exists:teachers,id',
               'classroom_id' => 'required|exists:classrooms,id',
               'day_of_week' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
               'start_time' => 'required|date_format:H:i',
               'end_time' => 'required|date_format:H:i|after:start_time',
           ]);

           $schedule->update($request->all());

           return redirect()->route('admin.schedules.index')->with('success', 'Horario actualizado exitosamente.');
       }

       public function destroy(Schedule $schedule)
       {
           $schedule->delete();
           return redirect()->route('admin.schedules.index')->with('success', 'Horario eliminado exitosamente.');
       }
   }
