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
        Schema::create('vessel_owner_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 500)->nullable();
            $table->longText('address');
            $table->string('phone', 50)->nullable();
            $table->string('nid',100)->nullable();
            $table->string('fid',100)->nullable();
            $table->integer('image_id')->nullable();
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
        Schema::dropIfExists('vessel_owner_infos');
    }
};
