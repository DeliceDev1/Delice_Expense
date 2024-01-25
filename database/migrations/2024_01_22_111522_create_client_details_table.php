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
        Schema::create('client_details', function (Blueprint $table) {

            $table->id();
            $table->string('category');
            $table->date('date');
            $table->decimal('amount', 10, 2);
            $table->decimal('tax', 10, 2)->nullable();
            $table->string('cpn')->nullable();
            $table->bigInteger('cpm')->nullable();
            $table->string('received');
            $table->string('agent')->nullable();
            $table->string('currency')->nullable();
            $table->string('image_path')->nullable(); // Assuming you store the image path in the database
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_details');
    }
};
