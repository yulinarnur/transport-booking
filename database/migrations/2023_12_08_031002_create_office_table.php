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
        Schema::create('office', function (Blueprint $table) {
            $table->id();
            $table->string('office_type');
            $table->string('address');
            $table->unsignedBigInteger('region_id');
            $table->timestamps();
    
            // foreign key
            $table->foreign('region_id')->references('id')->on('region')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office');
    }
};
