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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->text('content');
            $table->text('desc');
            $table->string('website');
            $table->unsignedBigInteger('file_id')->nullable();
            $table->string('city');
            $table->string('workload');
            $table->double('salary_min');
            $table->double('salary_max');
            $table->date('deadline');
            $table->timestamps();
            
            $table->foreign('file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
