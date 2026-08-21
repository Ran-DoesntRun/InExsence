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
            $table->integer('id_exp')->primary();
            $table->integer('amount');
            $table->dateTime('date');
            $table->enum("type",['cash','bank','ewallet']);
            $table->enum("category",['housing','food','transportation','utilities','health']);
            $table->foreignId('id_user');
        });
    }

    /**s
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
