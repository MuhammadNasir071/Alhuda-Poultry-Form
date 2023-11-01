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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('shed_id')->constrained('sheds')->onDelete('cascade');
            $table->foreignId('expense_type_id')->constrained('expense_types')->onDelete('cascade');
            $table->string('invoice_no');
            $table->string('expense_detail');
            $table->string('quantity')->nullable();
            $table->string('quantity_type')->nullable();
            $table->string('price');
            $table->string('date');
            $table->string('agency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
