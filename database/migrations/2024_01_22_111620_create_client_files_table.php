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
        Schema::create('client_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_detail_id'); // Foreign key to link to ClientDetail
            $table->string('name');
            $table->string('passport');
            $table->string('nationality');
            $table->string('appliedCountry');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('client_detail_id')
                ->references('id')
                ->on('client_details')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_files');
    }
};
