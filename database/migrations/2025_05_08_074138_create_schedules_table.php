
   <?php
   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   return new class extends Migration
   {
       public function up(): void
       {
           Schema::create('schedules', function (Blueprint $table) {
               $table->id();
               $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
               $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
               $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
               $table->foreignId('classroom_id')->constrained('classrooms')->onDelete('cascade');
               $table->string('day_of_week');
               $table->time('start_time');
               $table->time('end_time');
               $table->timestamps();
           });
       }

       public function down(): void
       {
           Schema::dropIfExists('schedules');
       }
   };
