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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('user_id');
            //$table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('user_id')->constrained();
            $table->text('descricao')->nullable();
            $table->decimal('valor_unitario', 10, 2);
            $table->decimal('desconto', 10, 2)->default(0);
            $table->integer('quantidade')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
