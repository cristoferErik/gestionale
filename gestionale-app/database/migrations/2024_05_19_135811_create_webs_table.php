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
        Schema::create('webs', function (Blueprint $table) {

            $table->id();
            $table->float('costo_annuale');
            $table->dateTime('aggiornamento');
            $table->dateTime('ultimo_bk');
            $table->dateTime('scadenza');
            $table->string('gestito');

            $table->unsignedBigInteger('service_id');

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webs');
    }
};
