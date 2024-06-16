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
        Schema::create('service_updates', function (Blueprint $table) {
            $table->id();
            $table->integer("update_period");
            $table->date("date_ini");
            $table->date("date_end");
            $table->boolean('status');
            $table->float("costo");
            $table->unsignedBigInteger('service_grant_id');
            $table->foreign('service_grant_id')->references('id')->on('service_grants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_updates');
    }
};
