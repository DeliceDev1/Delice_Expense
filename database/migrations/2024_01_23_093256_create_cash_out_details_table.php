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
            $table->double('amount');
            $table->string('purpose');
            $table->string('payment_mode');
            $table->string('pbn');
            $table->integer('pbm');
            $table->integer('tax');
            $table->string('agent');
            $table->string('currency');
            $table->string('image');
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
