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
            $table->double('amount');
            $table->double('tax');
            $table->string('cpn');
            $table->integer('cpm');
            $table->string('received');
            $table->string('currency');
            $table->string('agent');
            $table->string('images');
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
