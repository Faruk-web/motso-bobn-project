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
        Schema::create('vessel_wise_equipment_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vessel_info_id')->nullable()->comment('FK');
            $table->string('equipment_ids')->nullable()->comment('FK');
            $table->string('type',5)->nullable()->comment('A=Active, I=Inactive');
            $table->string('status',5)->nullable()->comment('A=Active, I=Inactive');
            $table->foreignId('entry_by')->nullable()->comment('FK');
            $table->foreignId('update_by')->nullable()->comment('FK');
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
        Schema::dropIfExists('vessel_wise_equipment_infos');
    }
};
