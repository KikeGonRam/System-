<?php
   namespace App\Models;

   use Illuminate\Database\Eloquent\Model;

   class Group extends Model
   {
       protected $fillable = [
           'name', 'description', 'course_id', 'teacher_id'
       ];

       public function course()
       {
           return $this->belongsTo(Course::class);
       }

       public function teacher()
       {
           return $this->belongsTo(Teacher::class);
       }

       public function students()
       {
           return $this->belongsToMany(Student::class, 'group_student');
       }
       public function schedules()
       {
           return $this->hasMany(Schedule::class);
       }
   }
