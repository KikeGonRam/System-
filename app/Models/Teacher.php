<?php

namespace App\Models;

   use Illuminate\Database\Eloquent\Model;
   use Illuminate\Support\Facades\Hash;
   use Carbon\Carbon;
   use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
   use Illuminate\Auth\Authenticatable;

   class Teacher extends Model implements AuthenticatableContract
   {
        use Authenticatable;

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
       public function subjects()
        {
             return $this->hasMany(Subject::class);
        }
        public function groups()
        {
            return $this->hasMany(Group::class);
        }
 
        public function schedules()
        {
            return $this->hasMany(Schedule::class);
        }
   }
