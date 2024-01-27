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
        Schema::create('cash_out_details', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->date('date');
            $table->decimal('amount', 14, 4);
            $table->string('purpose')->nullable();
            $table->string('payment_mode');
            $table->string('pbn')->nullable();
            $table->string('pbm')->nullable();
            $table->decimal('tax', 14, 4)->nullable();
            $table->string('agent')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_out_details');
    }
};
