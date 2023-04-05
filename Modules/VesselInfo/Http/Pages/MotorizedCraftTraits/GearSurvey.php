<?php

namespace Modules\VesselInfo\Http\Pages\MotorizedCraftTraits;

trait GearSurvey
{
    public $old_vessel_index_id;
    public $provisional_vessel_id;
    public $user_id;
    public $name;
    public $vessel_class_id;
    public $vessel_sub_class_id;
    public $type_of_vessel_id;
    public $name_engraved;
    public $survey_location_latitude;
    public $survey_location_longitude;
    public $survey_location_altitude;
    public $survey_location_precision;
    public $archive_data;
    public $upazilla_id;
    public function gearSurveyValidation()
    {
        # Validation @request
        $this->validate([
            'old_vessel_index_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'vessel_class_id' => ['required', 'integer'],
            'name_engraved' => ['required', 'integer'],
            'survey_location_latitude' => ['required', 'string'],
            'survey_location_longitude' => ['required', 'string'],
            'survey_location_altitude' => ['required', 'string'],
            'survey_location_precision' => ['required', 'string'],
        ]);

    }

    public function gearSurveyStore($VesselInfo)
    {
        $VesselInfo->name = $this->name;
        $VesselInfo->vessel_class_id = $this->vessel_class_id;
        $VesselInfo->type_of_vessel_id = $this->type_of_vessel_id;
        $VesselInfo->name_engraved = $this->name_engraved;
        $VesselInfo->survey_location_latitude = $this->survey_location_latitude;
        $VesselInfo->survey_location_longitude = $this->survey_location_longitude;
        $VesselInfo->survey_location_altitude = $this->survey_location_altitude;
        $VesselInfo->survey_location_precision = $this->survey_location_precision;
        $VesselInfo->upazilla_id = $this->upazilla_id;
        $VesselInfo->archive_data ='0';
        
        $VesselInfo->save();

        return $VesselInfo;
    }

    public function gearSurveyEdit($VesselInfo)
    {
        $this->name = $VesselInfo->name;
        $this->vessel_class_id = $VesselInfo->vessel_class_id;
        $this->type_of_vessel_id = $VesselInfo->type_of_vessel_id;
        $this->name_engraved = $VesselInfo->name_engraved;
        $this->survey_location_latitude = $VesselInfo->survey_location_latitude;
        $this->survey_location_longitude = $VesselInfo->survey_location_longitude;
        $this->survey_location_altitude = $VesselInfo->survey_location_altitude;
        $this->survey_location_precision = $VesselInfo->survey_location_precision;
        $this->upazilla_id = $VesselInfo->upazilla_id;
    }


}
