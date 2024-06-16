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
        Schema::create('web_sites', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('url')->nullable();
            $table->float('costo')->nullable();
            $table->date('date_creation');
            $table->unsignedBigInteger('server_id');
            $table->unsignedBigInteger('service_update_id');
            $table->foreign('server_id')->references('id')->on('servers')->onDelete('cascade');
            
            $table->foreign('service_update_id')->references('id')->on('service_updates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_sites');
    }
};
