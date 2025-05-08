<?php

   namespace App\Models;

   use Illuminate\Database\Eloquent\Model;

   class Course extends Model
   {
       protected $fillable = [
           'name', 'description', 'teacher_id', 'start_date', 'end_date'
       ];

       protected $casts = [
            'start_date' => 'date',
            'end_date' => 'date',
        ];

       public function teacher()
       {
           return $this->belongsTo(Teacher::class);
       }

       public function subjects()
       {
           return $this->hasMany(Subject::class);
       }
   };