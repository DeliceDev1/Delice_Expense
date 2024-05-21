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
        Schema::table('add_cash_out_categories', function (Blueprint $table) {
            //
            $table->integer('branch_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('add_cash_out_categories', function (Blueprint $table) {
            //
            $table->dropColumn('branch_id');
        });
    }
};