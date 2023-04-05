<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishing_species_infos', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->string('code', 150)->nullable();
            $table->string('species_image', 255)->nullable();
            $table->string('status', 5)->nullable()->comment('A=Active,I=Inactive');
            $table->integer('entry_by')->nullable()->comment('FK');
            $table->integer('update_by')->nullable()->comment('FK');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fishing_species_infos');
    }
};
