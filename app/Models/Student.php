<?php

    namespace App\Models;

   use Illuminate\Database\Eloquent\Model;
   use Illuminate\Support\Facades\Hash;
   use Carbon\Carbon;
   use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
   use Illuminate\Auth\Authenticatable;
   
   class Student extends Model implements AuthenticatableContract
   {
        
        use Authenticatable;
       
        protected $fillable = [
           'name', 'email', 'password', 'photo', 'date_of_birth', 'matricula', 'edad'
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
           return $this->photo ? asset('storage/' . $this->photo) : asset('images/default-student.png');
       }
       public function groups()
       {
           return $this->belongsToMany(Group::class, 'group_student');
       }
       public function grades()
        {
            return $this->hasMany(Grade::class);
        }
   }
