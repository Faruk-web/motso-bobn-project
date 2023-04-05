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
        Schema::create('vessel_setup_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name',500)->nullable();
            $table->string('code',150)->nullable();
            $table->string('type',10)->nullable()->comment('vcl=vessel_class,ins=insurance,vcn=vessel_cond,vst=vessel_type,hul=hull,clr=color,neq=navigation_equipment,lse=life_saving_equipment,ceq=communication_equipment,ger=gear,flm=fillament');
            $table->string('status',5)->nullable()->comment('A=Active,I=Inactive');
            $table->integer('entry_by')->nullable()->comment('FK');
            $table->integer('update_by')->nullable();
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
        Schema::dropIfExists('vessel_setup_infos');
    }
};
