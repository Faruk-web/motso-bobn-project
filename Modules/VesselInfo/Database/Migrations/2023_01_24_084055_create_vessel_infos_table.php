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
        Schema::create('vessel_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('branch_id')->nullable();
            $table->integer('old_vessel_index_id')->nullable();
            $table->string('provisional_vessel_id', 100)->nullable();
            $table->integer('vessel_class_id')->nullable()->comment('FK');
            $table->string('vessel_name', 500)->nullable();
            $table->string('name_engraved',5)->nullable()->comment('Y=yes,N=no');
            $table->longText('survey_location_latitude')->nullable();
            $table->longText('survey_location_longitude')->nullable();
            $table->longText('survey_location_altitude')->nullable();
            $table->longText('survey_location_precision')->nullable();
            $table->string('registered_with_mmo',5)->nullable()->comment('Y=yes,N=no');
            $table->string('mmo_registration_no',20)->nullable();
            $table->string('date_issued', 20)->nullable();
            $table->integer('registration_certificate_image_id')->nullable()->comment('FK');
            $table->string('fishing_license',5)->nullable()->comment('Y=yes,N=no');
            $table->string('fishing_license_no', 20)->nullable();
            $table->string('license_first_issue_date', 20)->nullable();
            $table->integer('fishing_license_image_id')->nullable()->comment('FK');
            $table->string('fishing_permit',5)->nullable()->comment('Y=yes,N=no');
            $table->string('fishing_permit_no', 20)->nullable();
            $table->string('permit_first_issue_date', 20)->nullable();
            $table->integer('fishing_permit_image_id')->nullable()->comment('FK');
            $table->string('seaworthiness_certificate',5)->nullable()->comment('Y=yes,N=no');
            $table->string('seaworthiness_certificate_no', 20)->nullable();
            $table->string('seawortthiness_cert_issue_d', 20)->nullable();
            $table->integer('seaworthiness_cert_img_id')->nullable()->comment('FK');
            $table->integer('insurance_status_id')->nullable()->comment('FK');
            $table->integer('insurance_image_id')->nullable()->comment('FK');
            $table->string('ownership_type',5)->nullable()->comment('I=Individual,G=Group');
            $table->string('number_of_owners',15)->nullable();
            $table->integer('primary_owner_id')->nullable()->comment('FK');
            $table->integer('secondary_owner_id')->nullable()->comment('FK');
            $table->string('year_built',15)->nullable();
            $table->string('place_built',100)->nullable();
            $table->integer('vessel_condition_id')->nullable()->comment('FK');
            $table->integer('type_of_vessel_id')->nullable()->comment('FK');
            $table->integer('hull_material_id')->nullable()->comment('FK');
            $table->integer('vessel_image_id')->nullable()->comment('FK');
            $table->string('length_of_vessel',50)->nullable()->comment('measured in m');
            $table->string('width_of_vessel', 50)->nullable()->comment('measured in m');
            $table->string('depth_of_vessel',50)->nullable()->comment('measured in m');
            $table->string('gross_tonnage', 50)->nullable();
            $table->string('net_tonnage', 50)->nullable();
            $table->integer('color_id')->nullable()->comment('FK');
            $table->longText('other_multi_color_desc');
            $table->string('fish_hold_capacity',50)->nullable()->comment('measured in m');
            $table->string('engine_no',50)->nullable();
            $table->string('make_or_model', 50)->nullable();
            $table->string('engine_power', 50)->nullable()->comment('measured in BHP');
            $table->string('onboard_mobile_number', 50)->nullable();
            $table->string('skipper_name', 500)->nullable();
            $table->string('skipper_nid', 100)->nullable();
            $table->string('number_of_skipper_majhi',15)->nullable();
            $table->string('number_of_engine_crew',15)->nullable();
            $table->string('number_of_fishers_deckhand', 15)->nullable()->comment('number of fishers or deckhand');
            $table->string('number_of_other_crew', 15)->nullable();
            $table->string('trip_duration', 50)->nullable()->comment('measured in days');
            $table->string('trips_per_year', 15)->nullable();
            $table->string('fishing_days_per_year', 100)->nullable();
            $table->string('avg_cost_per_trip', 100)->nullable()->comment('Thousand TK');
            $table->string('min_fishing_depth',50)->nullable()->comment('measured in m');
            $table->string('max_fishing_depth', 50)->nullable()->comment('measured in m');
            $table->integer('home_port_id')->nullable()->comment('FK');
            $table->integer('landing_port_id')->nullable()->comment('FK');
            $table->string('status', 5)->default(0)->nullable()->comment('A=Active,I=Inactive');
            $table->longText('google_map_loc')->nullable();
            $table->integer('submitted_by')->nullable()->comment('FK');
            $table->dateTime('submission_time')->nullable();
            $table->string('validation_status',5)->nullable()->comment('PD=Pending,PR=Processing,AP=Approved');
            $table->integer('cross_checked_by')->nullable()->comment('FK');
            $table->dateTime('cross_check_date')->nullable();
            $table->integer('reviewed_by')->nullable()->comment('FK');
            $table->dateTime('review_date')->nullable();
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
        Schema::dropIfExists('vessel_infos');
    }
};
