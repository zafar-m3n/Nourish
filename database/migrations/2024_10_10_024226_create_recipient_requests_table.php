<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipient_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipient_id')->constrained('users')->onDelete('cascade'); // Link to recipient (user)
            $table->foreignId('donation_id')->nullable()->constrained('donations')->onDelete('cascade');
            $table->string('food_type');
            $table->integer('quantity_requested');
            $table->enum('status', ['pending', 'approved', 'fulfilled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipient_requests');
    }
};
