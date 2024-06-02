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
            $table->string("tipo");
            $table->dateTime("data_inizio");
            $table->dateTime("date_scadenza");
            $table->boolean("status")->default(true);
            $table->float("costo");
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
        Schema::dropIfExists('service_updates');
    }
};
