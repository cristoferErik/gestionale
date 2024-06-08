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
            $table->integer("periodo_aggiornamento");
            $table->dateTime("data_inizio");
            $table->dateTime("date_scadenza");
            $table->boolean('status');
            $table->float("costo");
            $table->unsignedBigInteger('service_web_id')->unique();
            $table->foreign('service_web_id')->references('id')->on('service_updates');
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
