<?php

namespace Database\Seeders;

   use Illuminate\Database\Seeder;
   use App\Models\Schedule;
   use App\Models\Group;
   use App\Models\Subject;
   use App\Models\Teacher;
   use App\Models\Classroom;

   class ScheduleSeeder extends Seeder
   {
       public function run(): void
       {
           $group1 = Group::where('name', 'Grupo A - Matemáticas')->first();
           $subject1 = Subject::where('name', 'Álgebra')->first();
           $teacher1 = Teacher::where('email', 'carlos.lopez@example.com')->first();
           $classroom1 = Classroom::where('name', 'Aula 101')->first();

           if ($group1 && $subject1 && $teacher1 && $classroom1) {
               Schedule::create([
                   'group_id' => $group1->id,
                   'subject_id' => $subject1->id,
                   'teacher_id' => $teacher1->id,
                   'classroom_id' => $classroom1->id,
                   'day_of_week' => 'Lunes',
                   'start_time' => '08:00',
                   'end_time' => '09:30',
               ]);
           }

           $group2 = Group::where('name', 'Grupo B - Inglés')->first();
           $subject2 = Subject::where('name', 'Gramática Inglesa')->first();
           $teacher2 = Teacher::where('email', 'ana.martinez@example.com')->first();
           $classroom2 = Classroom::where('name', 'Aula 202')->first();

           if ($group2 && $subject2 && $teacher2 && $classroom2) {
               Schedule::create([
                   'group_id' => $group2->id,
                   'subject_id' => $subject2->id,
                   'teacher_id' => $teacher2->id,
                   'classroom_id' => $classroom2->id,
                   'day_of_week' => 'Martes',
                   'start_time' => '10:00',
                   'end_time' => '11:30',
               ]);
           }
       }
   }