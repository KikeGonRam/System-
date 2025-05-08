
   <?php
   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   return new class extends Migration
   {
       public function up(): void
       {
           Schema::create('grades', function (Blueprint $table) {
               $table->id();
               $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
               $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
               $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
               $table->decimal('score', 5, 2);
               $table->text('comments')->nullable();
               $table->date('date');
               $table->timestamps();
           });
       }

       public function down(): void
       {
           Schema::dropIfExists('grades');
       }
   };
