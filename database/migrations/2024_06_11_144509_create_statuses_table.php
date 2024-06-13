<?php

use App\Models\Status;
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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });

        // Define the statuses to insert
        $statuses = [
            ['status' => 'pending'],
            ['status' => 'accepted'],
            ['status' => 'denied'],
        ];

        // Insert the statuses into the table
        foreach ($statuses as $status) {
            Status::create($status);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
