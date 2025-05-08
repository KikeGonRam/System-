<?php

namespace App\Models;

   use Illuminate\Database\Eloquent\Model;
   use Illuminate\Support\Facades\Hash;
   use Carbon\Carbon;

   class Teacher extends Model
   {
       protected $fillable = [
           'name', 'lastname', 'email', 'password', 'gender', 'date_of_birth', 'edad', 'phone_number', 'language', 'photo'
       ];

       protected $hidden = [
           'password', 'remember_token',
       ];

       public function setPasswordAttribute($value)
       {
           if ($value) {
               $this->attributes['password'] = Hash::make($value);
           }
       }

       public function setDateOfBirthAttribute($value)
       {
           $this->attributes['date_of_birth'] = $value;
           $this->attributes['edad'] = Carbon::parse($value)->age;
       }

       public function getPhotoUrlAttribute()
       {
           return $this->photo ? asset('storage/' . $this->photo) : asset('images/default-teacher.png');
       }
       public function courses()
       {
           return $this->hasMany(Course::class);
       }
   }
