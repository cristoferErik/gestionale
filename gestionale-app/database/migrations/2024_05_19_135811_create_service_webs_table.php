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
        Schema::create('service_webs', function (Blueprint $table) {

            $table->id();
            /*foreign key*/
            $table->unsignedBigInteger('service_grants_id');
            $table->foreign('service_grants_id')->references('id')->on('service_grants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_webs');
    }
};
