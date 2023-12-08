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
        Schema::create('transport_bookeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transport_id');
            $table->unsignedBigInteger('approver_id'); //id user yang menyetujui
            $table->date('booked_date');
            $table->enum('status', ['Menunggu disetujui', 'Disetujui', 'Ditolak']);
            $table->timestamps();

            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
            $table->foreign('approver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_bookeds');
    }
};
