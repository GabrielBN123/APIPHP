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
        Schema::create('pessoa_endereco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pes_id');
            $table->foreign('pes_id')->references('pes_id')->on('pessoa');
            $table->unsignedBigInteger('end_id');
            $table->foreign('end_id')->references('end_id')->on('endereco');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoa_endereco');
    }
};
