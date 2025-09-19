<?php

use App\Enums\CaracteristicsEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('caracteristics', function(Blueprint $table){
            $table->id();
            $table->enum('name', array_column(CaracteristicsEnum::cases(), 'value'));
            // $table->enum('name', CaracteristicsEnum::cases());
            $table->timestamps();
        });

        Schema::create ('services', function(Blueprint $table){
            $table->id();
            $table->string('service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caracteristics');
        Schema::dropIfExists('services');
    }
};
