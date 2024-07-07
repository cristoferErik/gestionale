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
        Schema::create('record_updates', function (Blueprint $table) {
            $table->id();
            $table->date('record_date');
            $table->unsignedBigInteger('web_site_id');
            $table->foreign('web_site_id')->references('id')->on('web_sites')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_updates');
    }
};
