<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id(); # ID PRIMARY_KEY AUTOINCREMENT UNIQUE NON NUL
            $table->string('name'); #VARCHAR NON NULL
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('phone', 15);
            $table->text('adresse')->nullable();
            $table->date('birth_date');
            $table->boolean('is_active')->default(1);

            // relation
            $table->foreignId('department_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
