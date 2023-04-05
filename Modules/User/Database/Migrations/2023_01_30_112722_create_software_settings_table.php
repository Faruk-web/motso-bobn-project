<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_settings', function (Blueprint $table) {
            $table->id();
            $table->string('copyright')->nullable();
            $table->string('developer_by')->nullable();
            $table->text('header_logo')->nullable();
            $table->text('company_logo')->nullable();
            $table->string('header_title')->nullable();
            $table->longText('login_page')->nullable();
            $table->longText('otp_page')->nullable();
            $table->longText('reset_page')->nullable();
            $table->string('faceboack')->nullable();
            $table->string('twitter')->nullable();
            $table->string('website')->nullable();
            $table->text('website_logo')->nullable();
            $table->text('background_imag')->nullable();
            $table->text('footer_logo')->nullable();
            $table->longText('confiremation_page')->nullable();
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
        Schema::dropIfExists('software_settings');
    }
};
