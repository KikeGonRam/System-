<?php

namespace App\Models;

   use Illuminate\Database\Eloquent\Model;

   class Grade extends Model
   {
       protected $fillable = [
           'student_id', 'subject_id', 'group_id', 'score', 'comments', 'date'
       ];

       protected $casts = [
           'date' => 'date',
       ];

       public function student()
       {
           return $this->belongsTo(Student::class);
       }

       public function subject()
       {
           return $this->belongsTo(Subject::class);
       }

       public function group()
       {
           return $this->belongsTo(Group::class);
       }
   }
