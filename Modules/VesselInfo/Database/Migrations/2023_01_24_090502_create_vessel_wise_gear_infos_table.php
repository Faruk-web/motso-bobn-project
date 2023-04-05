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
        Schema::create('vessel_wise_gear_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('vessel_info_id')->nullable()->comment('FK');
            $table->integer('gear_id')->nullable()->comment('FK');
            $table->string('gear_count', 50)->nullable();
            $table->string('avg_gear_length', 50)->nullable()->comment('measured in m');
            $table->string('avg_gear_width', 50)->nullable()->comment('measured in m');
            $table->string('mesh_size', 50)->nullable()->comment('measured in cm');
            $table->integer('filament_id')->nullable()->comment('FK');
            $table->string('number_of_hook_per_line',50)->nullable();
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
        Schema::dropIfExists('vessel_wise_gear_infos');
    }
};
