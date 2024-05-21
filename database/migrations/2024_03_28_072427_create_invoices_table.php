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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('branch')->nullable();
            // from
            $table->string('sender_name')->nullable();
            $table->string('sender_designation')->nullable();
            $table->text('sender_address')->nullable();
            $table->string('sender_country')->nullable();
            $table->string('sender_mobile')->nullable();
            //to
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('mobile')->nullable(); // Storing mobile number as a string
            $table->text('address')->nullable();
            $table->string('country')->nullable();

            $table->string('partner_code')->nullable();
            $table->date('date')->nullable();
            $table->string('invoice_type')->nullable();

            $table->string('activity_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('rate', 10, 2)->nullable();
            $table->decimal('amount', 10, 2)->nullable();

            //bank related fields.
            $table->string('account_name')->nullable();
            $table->bigInteger('account_no')->nullable();
            $table->string('bank_name')->nullable();
            $table->date('transaction_date')->nullable();
            $table->string('reference_code')->nullable();
            $table->string('initiator')->nullable();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('vat', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
