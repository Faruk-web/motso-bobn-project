<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  line-height:-3px;
}

.header_fau{
    text-align: right;margin-top: -26px;
}
.footer_fau{
    text-align: right;
    margin-top: -30px
}
.header_image{
    margin-top: -32%;
    height: 67%;
    margin-left: 6%;

}

.header {
margin-top:1% !important;
  text-align: center;
  font-size: 20px;
  line-height: 3px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width:33%;
  font-size: 150%;
  /* height:600px; Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
.footer {
    /* margin-top:10%; */
}
.footer_hr{
    margin-top:9%;
}
.footer_midd {
    margin-top:17%;
}
.footer_last{
  margin-top:34%;
}
/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
  .column {
    width: 100%;
  }
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 15px;
}
h4{
  font-size: 15px;
}
h3{
  font-size: 18px;
}
u{
  font-size: 20px;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 4px;
  width: 30%;
  height: 10px;
}

tr:nth-child(even) {
  /* background-color: #dddddd; */
}
</style>

<style>
  .container {
    width: 80%;
    margin: 0 auto;
    background-color: #f6f6f6;
    padding: 20px;
    box-sizing: border-box;
  }
  .row {
	display: flex;
	flex-wrap: wrap;
	margin: -10px;
}
.col-md-6 {
	flex-basis: 50%;
	max-width: 50%;
	padding: 10px;
	box-sizing: border-box;
}
.col-md-12 {
	flex-basis: 100%;
	max-width: 100%;
	padding: 10px;
	box-sizing: border-box;
}
.card {
			width: 300px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
			overflow: hidden;
			margin: 20px auto;
		}
		.card-header {
			background-color: #f0f0f0;
			padding: 10px;
			font-weight: bold;
			text-align: center;
		}
		.card-body {
			padding: 10px;
			text-align: justify;
			line-height: 1.5;
		}
    .button {
			display: inline-block;
			padding: 10px 20px;
			background-color: #4CAF50;
			color: #fff;
			font-size: 16px;
			font-weight: bold;
			border-radius: 5px;
			text-decoration: none;
			text-align: center;
			cursor: pointer;
			transition: all 0.3s ease-in-out;
		}
		.button:hover {
			background-color: #3e8e41;
		}
    .print-icon {
			border: none;
			color: #000;
			cursor: pointer;
			font-size: 24px;
			margin: 0;
			padding: 0;
			text-align: center;
			width: 40px;
			height: 40px;
			border-radius: 50%;
		}
		.print-icon::before {
			content: "\f02f";
			font-family: "Font Awesome 5 Free";
			font-weight: 900;
			font-size: 20px;
			line-height: 40px;
		}
</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="header" >
            <div class="text-sm-center" style="margin-top:12px:">
                <h2>Sustainable Coastal and Marine Fisheries Project</h2>
                <h5 class="">Departments: Ministry of Fisheries And livestock, Dhaka, Bangladesh</h5>
                <h5 class="">Address: 13, Shohid Captain Moonsur, Haider Ali Sarani St, Dhaka 1000</h5>
                <h6  class="">Phone : 01711-091118</h6>
                <h4 style="font-size: 98%;" >Fishing Vessel and Gear Database</h4>
                <h6 class="header_fau" style="margin-right: ;font-size: 90%;">Date: {{now('Asia/Dhaka')->format('Y-d-m h:i A')}}</h6>
            </div>
        </div>
        <img class="header_image" style="text-align:left;margin-bottom: 5%;margin-left: 10%;border-radius: 43%;" src="http://dof.leotechbd.com/backend/images/favi_mots.jpg" alt="Logo"> 
        {{-- <img class="header_image" style="text-align:left;" src="{{$logo}}" alt="{{$logo}}"> --}}
      </div>
    </div>
    <div class="row" style="margin: -35px;">
      <div class="col-md-12">
        <hr>
      </div>
    </div>
    <div class="container">
      <div class="row">
          <div class="col-md-6">
            <div class="text-sm-center">
              <h3 style="color:#040a31;text-align:center" ><u> Vessel Survey</u></h3> 
            </div>
            <table>
              @if($p->user_id)
              <tr>
                <td> <h4>Enumerator ID</h4> </td>
                <td>  {{$p->user_id}} </td>
              </tr>
              @else
              <tr>
                <td> <h4>Enumerator ID</h4> </td>
                <td>  {{$p->old_enuminator_id}} </td>
              </tr>
              @endif
          
            <tr>
              <td> <h4>Vessel Name</h4> </td>
              <td> {{$p->name}} </td>
            </tr>
            <tr>
              <td> <h4>Name Engraved</h4></td>
              <td>  @if($p->name_engraved=='2')
                <p > Yes</p>
                @endif 
              </td>
              <tr>
                <td> <h4>Vessel Class</h4></td>
                <td> {{optional($p->VesselSetupvcl)->name}} </td>
              </tr>
              <tr>
                <td><h4>Survey Location Latitude</h4> </td>
                <td> {{$p->survey_location_latitude}} </td>
              </tr>
              <tr>
                <td><h4>Survey Location Longitude</h4></td>
                <td> {{$p->survey_location_longitude}}</td>
              </tr>
              <tr>
                <td><h4>Survey Location Altitude</h4></td>
                <td> {{$p->survey_location_altitude}}</td>
              </tr>
              <tr>
                <td><h4>Survey Location Precision</h4></td>
                <td> {{$p->survey_location_precision}}</td>
              </tr>
            </tr>
            </table>
          </div>
          <div class="col-md-6">
            <div class="text-sm-center">
              <h3 style="color:#040a31;text-align:center" > <u> Legal Status</u></h3> 
            </div>
            <table>
            <tr>
              <td> <h4>Registered With MMO</h4></td>
              <td>  @if($p->registered_with_mmo=='2')
                <p>Yes</p>
                @endif
               </td>
            </tr>
            <tr>
              <td> <h4>MMO Registration</h4></td>
              <td>  {{$p->mmo_registration_no}} </td>
            </tr>
            <tr>
              <td> <h4>Fishing License</h4></td>
              <td>  @if($p->fishing_license=='2')
                <p >Yes</p>
                @endif
               </td>
            </tr>
            <tr>
              <td><h4>License no</h4> </td>
              <td>  {{$p->fishing_license_no}}</td>
            </tr>
            <tr>
              <td><h4>Fishing Permit</h4></td>
              <td> @if($p->fishing_permit=='2')
                <p >Yes</p>
                @endif
              </td>
            </tr>
            {{-- <tr>
              <td><h4>Date 1st issued</h4> </td>
              <td>{{$p->date_issued}}</td>
            </tr> --}}
            <tr>
              <td><h4>Fishing Permit No</h4></td>
              <td> {{$p->fishing_permit_no}}</td>
            </tr>
            <tr>
              <td><h4>Seaworthiness Certificate</h4></td>
              <td> @if($p->seaworthiness_certificate=='2')
                <p >Yes</p>
                @endif
              </td>
            </tr>
            <tr>
              <td><h4>Seaworthiness Certificate No</h4> </td>
              <td>{{$p->seaworthiness_certificate_no}}</td>
            </tr>
            {{-- <tr>
              <td><h4>Date issued</h4></td>
              <td>{{$p->date_issued}}</td>
            </tr> --}}
            </table>
          </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <div class="text-sm-center">
            <h3 style="color:#040a31;text-align:center" ><u>GEAR</u></h3> 
          </div>
          <table>
          <tr>
            <td> <h4>Gear Name</h4></td>
            <td>{{optional($p->VesselSetupInfo)->name}}</td>
          </tr>
          <tr>
            <td> <h4>Gear count</h4></td>
            <td>  {{optional($p->VesselWiseGearInfo)->gear_count}} </td>
          </tr>
          <tr>
            <td><h4>Avg gear length (m)</h4></td>
            <td> {{optional($p->VesselWiseGearInfo)->avg_gear_length}}</td>
          </tr>
          <tr>
            <td><h4>Avg gear width (m)</h4></td>
            <td> {{optional($p->VesselWiseGearInfo)->avg_gear_width}}</td>
          </tr>
          <tr>
            <td><h4>Mesh size (cm)</h4></td>
            <td> {{optional($p->VesselWiseGearInfo)->mesh_size}}</td>
          </tr>
          <tr>
            <td><h4>Number of hooks per line</h4></td>
            <td>{{optional($p->VesselWiseGearInfo)->number_of_hook_per_line}}</td>
          </tr>
          <tr>
            <td><h4>Filament</h4></td>
            <td> {{optional($p->VesselSetupflm)->name}}</td>
          </tr>
          </table>
        </div>
        <div class="col-md-6">
          <div class="text-sm-center">
            <h3 style="color:#040a31;text-align:center" ><u>Vessel Owner Info</u></h3> 
        </div>
        <table>
          <tr>
            <td><h4>Principal owner's name</h4></td>
            <td>{{optional($p->VesselOwnerInfo)->name}}</td>
          </tr>
          <tr>
            <td><h4>Principal owner's address</h4></td>
            <td>{{optional($p->VesselOwnerInfo)->address}}</td>
          </tr>
          <tr>
            <td><h4>Principal owner's phone</h4></td>
            <td>{{optional($p->VesselOwnerInfo)->phone}}</td>
          </tr>
          <tr>
            <td><h4>Principal owner's NID </h4></td>
            <td>{{optional($p->VesselOwnerInfo)->nid}}</td>
          </tr>
          <tr>
            <td><h4>Principal owner's FID </h4> </td>
            <td>{{optional($p->VesselOwnerInfo)->fid}}</td>
          </tr>
          <tr>
            <td><h4>Co-owner's name </h4></td>
            <td>{{optional($p->VesselOwnerInfosecondery)->name}}</td>
          </tr>
          <tr>
            <td><h4>Co-owner's NID </h4></td>
            <td>{{optional($p->VesselOwnerInfosecondery)->nid}}</td>
          </tr>
          {{-- <tr>
            <td><h4>Co-owner's phone </h4> </td>
            <td>{{optional($p->VesselOwnerInfosecondery)->phone}}</td>
          </tr> --}}
          {{-- <tr>
            <td>Co-owner's FID </td>
            <td>{{optional($p->VesselOwnerInfosecondery)->fid}}</td>
          </tr> --}}
        </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <div class="text-sm-center">
            <h3 style="color:#040a31;text-align:center" ><u>Vessel Description</u></h3> 
          </div>
          <table>
          <tr>
            <td><h4>Year Built</h4></td>
            <td> {{$p->year_built}}</td>
          </tr>
          <tr>
            <td><h4>Place Built</h4></td>
            <td>  {{$p->place_built}}</td>
          </tr>
          <tr>
            <td><h4>Onboard Mobile Number</h4></td>
            <td>{{$p->onboard_mobile_number}}</td>
          </tr>
          <tr>
            <td><h4>Type of vessel</h4></td>
            <td>{{optional($p->VesselSetupvst)->name}}</td>
          </tr>
          <tr>
            <td><h4>Vessel Condition</h4> </td>
            <td></td>
          </tr>
          <tr>
            <td><h4>Hull Material</h4> </td>
            <td></td>
          </tr>
          <tr>
            <td><h4>Color</h4> </td>
            <td></td>
          </tr>
          <tr>
            <td><h4>Other (multi) color description</h4> </td>
            <td></td>
          </tr>
          <tr>
            <td><h4>Length (m) of vessel</h4>  </td>
            <td>{{$p->length_of_vessel}} </td>
          </tr>
          <tr>
            <td><h4>Width (m) of vessel </h4> </td>
            <td>{{$p->width_of_vessel}}</td>
          </tr>
          <tr>
            <td><h4>Depth (m) of vessel </h4> </td>
            <td> {{$p->depth_of_vessel}}</td>
          </tr>
          <tr>
            <td><h4>Gross Tonnage </h4></td>
            <td> {{$p->gross_tonnage}}</td>
          </tr>
          <tr>
            <td><h4>Net Tonnage </h4></td>
            <td>{{$p->net_tonnage}}</td>
          </tr>
          <tr>
            <td><h4>Fish hold capacity (MT)</h4> </td>
            <td>  {{$p->fish_hold_capacity}}</td>
          </tr>
          <tr>
            <td><h4>Engine</h4></td>
            <td>{{$p->engine_no }}</td>
          </tr>
          <tr>
            <td><h4>Make/model</h4></td>
            <td>{{$p->make_or_model}}</td>
          </tr>
          <tr>
            <td><h4>Power (BHP)</h4> </td>
            <td> {{$p->engine_power}}</td>
          </tr>
          </table>
        </div>
        <div class="col-md-6">
          <div class="text-sm-center">
            <h3 style="color:#040a31;text-align:center" ><u>Crew/Staff</u></h3> 
          </div>
          <table>
          <tr>
            <td> <h4>Skipper Name</h4></td>
            <td>{{$p->skipper_name}}</td>
          </tr>
          <tr>
            <td><h4>Onboard Mobile Number</h4> </td>
            <td> {{$p->onboard_mobile_number}}</td>
          </tr>
          <tr>
            <td><h4>Skipper NID </h4></td>
            <td> {{$p->skipper_nid}}</td>
          </tr>
          <tr>
            <td><h4>Number of engine crew</h4></td>
            <td>  {{$p->number_of_engine_crew}}</td>
          </tr>
          <tr>
            <td><h4>Number Of Skipper Majhi</h4></td>
            <td>{{$p->number_of_skipper_majhi}}</td>
          </tr>
          <tr>
            <td><h4>Number of fishers/deckhand</h4></td>
            <td>{{$p->number_of_fishers_deckhand}}</td>
          </tr>
          <tr>
            <td><h4>Number of other crew</h4></td>
            <td>{{$p->number_of_other_crew}}</td>
          </tr>
          </table>
          <div class="text-sm-center">
            <h3 style="color:#040a31;text-align:center" > <u>Fishing Speciess</u> </h3> 
          </div>
          <table>
          <tr>
            <td><h4> Primary species</h4></td>
            {{-- <td>  {{optional($p->VesselWiseFishingSpeciesInfoprimaery->FishingSpeciesInfo)->name}} </td> --}}
            <td> Bombay duck </td>
          </tr>
          <tr>
            <td><h4> Secondary species</h4></td>
            {{-- <td>  {{optional($p->VesselWiseFishingSpeciesInfosecondery->FishingSpeciesInfo)->name}} </td> --}}
            <td>  Gold-spotted grenadier anchovy </td>
          </tr>
          <tr>
            <td> <h4>Other species</h4></td>
            {{-- <td>  {{optional($p->VesselWiseFishingSpeciesInfoother->FishingSpeciesInfo)->name}} </td> --}}
            <td>  Paradise threadfin </td>
          </tr>
          </table>
          <div class="text-sm-center">
            <h3 style="color:#040a31;text-align:center" ><u>Equipment</u></h3> 
          </div>
          <table>
          <tr>
            <td><h4> Navigation Equipment</h4></td>
            {{-- <td>{{optional($p->VesselWiseEquipmentneq->VesselSetupequevment)->name}}</td> --}}
            <td> AIS</td>
          </tr>
          <tr>
            <td><h4>Life saving equipment</h4></td>
            {{-- <td>  {{optional($p->VesselWiseEquipmentlse->VesselSetupequevment)->name}} </td> --}}
            <td> Life buoy </td>
          </tr>
          <tr>
            <td><h4>Communication Equipment</h4> </td>
            {{-- <td> {{optional($p->VesselWiseEquipmentceq->VesselSetupequevment)->name}}</td> --}}
            <td> Comminication radio </td>
          </tr>
          <tr>
            <td><h4>Fire Safety Equipment</h4></td>
            {{-- <td>{{optional($p->VesselWiseEquipmentfse->VesselSetupequevment)->name}}</td> --}}
            <td>Fire pump</td>
          </tr>
          </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <div class="text-sm-center">
            <h3 style="color:#040a31;text-align:center" > <u>Trip Information</u> </h3> 
          </div>
          <table>
          <tr>
            <td> <h4>Trip Duration (days)</h4></td>
            <td>{{$p->trip_duration}}</td>
          </tr>
          <tr>
            <td><h4>Trips per year</h4></td>
            <td> {{$p->trips_per_year}}</td>
          </tr>
          <tr>
            <td><h4>Fishing Days Per Year</h4></td>
            <td>{{$p->fishing_days_per_year}}</td>
          </tr>
          <tr>
            <td><h4>Avg Cost Of A Trip</h4> </td>
            <td>{{$p->avg_cost_per_trip}}</td>
          </tr>
          <tr>
            <td><h4>Min Fishing Depth</h4></td>
            <td>{{$p->min_fishing_depth}}</td>
          </tr>
          <tr>
            <td><h4>Max Fishing Depth</h4></td>
            <td>{{$p->max_fishing_depth}}</td>
          </tr>
          <tr>
            <td><h4>Home Port</h4></td>
            <td>{{$p->max_fishing_depth}}</td>
          </tr>
          <tr>
            <td><h4>Landing Port</h4></td>
            <td>{{$p->max_fishing_depth}}</td>
          </tr>
          <tr>
            <td><h4>Frequent fishing areas</h4></td>
            <td>{{$p->max_fishing_depth}}</td>
          </tr>
          
          </table>
        </div>
        <div class="col-md-6">
          <div class="text-sm-center">
            <h3 style="color:#040a31;text-align:center" > <u>Office Info</u> </h3> 
          </div>
          <table>
          <tr>
            <td><h4>Name</h4></td>
            <td>{{optional($p->OfficeInfo)->name}}</td>
          </tr>
          <tr>
            <td><h4>Phone</h4></td>
            <td>{{optional($p->VesselOwnerInfo)->phone_no}}</td>
          </tr>
          <tr>
            <td><h4>Email</h4></td>
            <td>{{optional($p->VesselOwnerInfo)->email_add}}</td>
          </tr>
          {{-- <tr>
            <td><h4>Registration Code</h4></td>
            <td>{{optional($p->VesselOwnerInfo)->reg_code}}</td>
          </tr> --}}
          <tr>
            <td><h4>Contact Person </h4></td>
            <td>{{optional($p->VesselOwnerInfo)->contact_person}}</td>
          </tr>
          <tr>
            <td><h4>Contact Person Mobile</h4> </td>
            <td>{{optional($p->VesselOwnerInfo)->contact_person_mobile}}</td>
          </tr>
          <tr>
            <td><h4>Contact Email</h4> </td>
            <td>{{optional($p->VesselOwnerInfo)->contact_email}}</td>
          </tr>
          </table> 
          <div class="text-sm-center">
            <h3 style="color:#040a31;background-color:#fff;text-align:center" class=" font-size-16"> <u>Non-compliance</u> </h3> 
          </div>
          <table>
          <tr>
            <td style="width:50%;"><h4>Remark Of Legal Action</h4></td>
            <td style="width:50%;">{{$p->legal_action}}</td>
          </tr>
          <tr>
            <td><h4>Remark Of Punishment</h4></td>
            <td>{{$p->pinishment}}</td>
          </tr>
          </table> 
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <hr>
          <div class="column ">
              {{-- <img style="height:30px" src="http://dof.leotechbd.com/storage/photos/s1yQC0tn5v07OGi8kt6k9JlEBvMdGPC9cZCTZJ9Q.png" alt="Logo"> --}}
              <h6 style="text-align:left">Fishing Vessel and Gear Database</h6> 
            </div>
            <div class="column">
              <h6 style="text-align:center">4 of 4 page</h6> 
            </div>
            <div class="column">
              <h6 style="text-align:right">Powered by Leotech</h6> 
            </div>
            <a class="button" style="float: right;" href="{{route('vesselinfo.report.mpdf.index',$p->id)}}"><i class="print-icon"></i> Print</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>