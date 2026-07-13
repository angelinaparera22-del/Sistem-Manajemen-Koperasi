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
        Schema::create('shu_distributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->integer('period_year');
            $table->integer('total_savings_point')->default(0);
            $table->integer('total_loan_point')->default(0);
            $table->bigInteger('amount_received')->default(0);
            $table->enum('status', ['Distributed', 'Pending'])->default('Pending');
            $table->date('distributed_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shu_distributions');
    }
};
