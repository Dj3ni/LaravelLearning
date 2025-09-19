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
        Schema::create('estate_caracteristics', function (Blueprint $table) {

            $table->foreignId('estates_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('caracteristics_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['estates_id', 'caracteristics_id']);
        });

        Schema::create('estate_services', function (Blueprint $table) {

            $table->foreignId('services_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreignId('estates_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['estates_id', 'services_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estate_caracteristics');
        Schema::dropIfExists('estate_services');
    }
};
