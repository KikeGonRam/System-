
   <?php
   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   return new class extends Migration
   {
       public function up(): void
       {
           Schema::create('teachers', function (Blueprint $table) {
               $table->id();
               $table->string('name');
               $table->string('lastname');
               $table->string('email')->unique();
               $table->string('password');
               $table->enum('gender', ['male', 'female', 'other'])->nullable();
               $table->date('date_of_birth');
               $table->integer('edad')->nullable();
               $table->string('phone_number')->nullable();
               $table->string('language')->nullable();
               $table->string('photo')->nullable();
               $table->timestamps();
           });
       }

       public function down(): void
       {
           Schema::dropIfExists('teachers');
       }
   };
