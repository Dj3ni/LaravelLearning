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
        Schema::create('estates', function(Blueprint $table)
        {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->unsignedInteger('square_meters');
            $table->unsignedInteger('price');
            $table->text('description')->nullable();
            $table->string('localisation');
            $table->boolean('sold')->default(false);
            $table->timestamps();

            // NB: Si je veux faire des valeurs max, je dois faire un 'Check' manuellement

            // ex: DB::statement('ALTER TABLE estates ADD CONSTRAINT check_square_meters CHECK (square_meters >= 0 AND square_meters <= 10000)');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('estates');
    }
};
