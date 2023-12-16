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
        Schema::create('departments', function (Blueprint $table) {
            $table->id('deptid');
            $table->string('deptfullname', 100);
            $table->string('deptshortname', 20)->nullable();
            $table->unsignedBigInteger('deptcollid');
            $table->timestamps();

            $table->foreign('deptcollid')->references('collid')->on('colleges');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
