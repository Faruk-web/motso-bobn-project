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
        Schema::create('vessel_wise_fishing_area_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('vessel_info_id')->nullable()->comment('FK');
            $table->string('fishing_area_ids', 200)->nullable()->comment('FK');
            $table->string('status',5)->nullable()->comment('A=Active, I=Inactive');
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
        Schema::dropIfExists('vessel_wise_fishing_area_infos');
    }
};
