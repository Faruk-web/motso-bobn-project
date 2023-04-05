<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('type', 5)->nullable()->comment('B=Branch');
            $table->integer('pid')->nullable()->comment('Call ID From "brance_setup" Table');
            $table->string('name', 20)->nullable();
            $table->string('reg_code', 20)->nullable();
            $table->string('establish_year', 5)->nullable();
            $table->string('phone_no', 20)->nullable();
            $table->string('inst_br_type', 100)->nullable();
            $table->string('web_address', 100)->nullable();
            $table->string('email_add', 100)->nullable();
            $table->string('contact_person', 100)->nullable();
            $table->string('contact_person_mobile', 20)->nullable();
            $table->string('contact_email', 200)->nullable();
            $table->string('tin_no', 50)->nullable();
            $table->string('address', 500)->nullable();
            $table->integer('division_id')->nullable()->comment('This Id Call From "br_country" table');
            $table->integer('district_id')->nullable()->comment('This Id Call From "br_country" table');
            $table->integer('thana_id')->nullable()->comment('This Id Call From "br_country" table');
            $table->string('zip_code', 10)->nullable();
            $table->integer('logo_id')->nullable();
            $table->longText('map_url')->nullable();
            $table->date('service_start_date')->nullable();
            $table->string('remarks', 200)->nullable();
            $table->integer('entry_by')->nullable();
            $table->dateTime('entry_date')->nullable();
            $table->integer('update_by')->nullable();
            $table->timestamp('update_date')->useCurrentOnUpdate()->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
