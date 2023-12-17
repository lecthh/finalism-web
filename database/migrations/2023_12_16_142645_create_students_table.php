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
        Schema::create('students', function (Blueprint $table) {
            $table->id('studid');
            $table->string('studfirstname', 50);
            $table->string('studlastname', 50);
            $table->string('studmidname', 50)->nullable();
            $table->foreignId('studprogid')->constrained('programs', 'progid')->onDelete('cascade');;
            $table->foreignId('studcollid')->constrained('colleges', 'collid')->onDelete('cascade');;
            $table->integer('studyear');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
