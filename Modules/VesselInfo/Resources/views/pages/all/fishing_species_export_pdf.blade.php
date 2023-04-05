
<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  font-size:14px;
  line-height:-3px;
}

.header_fau{
    text-align: right;
    margin-top: -120px
}
.footer_fau{
    text-align: right;
    margin-top: -30px
}
.header_image{
    margin-top:-85px;
    height:90px;

}

.header {
margin-top:10px;
  text-align: center;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width:33%;
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
.footer_hr {
    margin-top:82%;
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
  font-size: 11px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  /* background-color: #dddddd; */
}
</style>
</head>
<body>
<div class="header" style="margin-top: 5px">
    <div class="text-sm-center">
        <h2>Sustainable Coastal and Marine Fisheries Project</h2>
        <h5 class=" font-size-14">Departments: Ministry of Fisheries And livestock, Dhaka, Bangladesh</h5>
        <h5 class=" font-size-14">Address: 13, Shohid Captain Moonsur, Haider Ali Sarani St, Dhaka 1000</h5>
        <h6  class=" font-size-14">Phone : 01711-091118</h6>
    </div>
</div>
{{-- <img class="header_image" style="text-align:left;" src="{{$logo}}" alt="{{$logo}}"> --}}
<img class="header_image" style="text-align:left;" src="http://dof.leotechbd.com/backend/images/favi_mots.jpg" alt="Logo"> 
<div>
    <h4 style="color:#02061a;text-align:center" class=" font-size-20">Fishing Vessel and Gear Database</h4>
     <h6 class="header_fau">Date:2/8/2023</h6>
</div>
<hr>
<div class="text-sm-center">
    <h3 style="color:#040a31;text-align:center" class=" font-size-16">Information Of Fishing Species</h3> 
</div>
<table>
  <tr>
    <th>Species Name</th>
    <th>Species Code </th>
    <th>Species Status </th>
    <th>Divisions </th>
    <th>District</th>
    <th>Upazila</th>
    <th>Date</th>
    <th>Image</th>
  </tr>
  @foreach($variable as $key => $value)
  <tr>
  <td>{{$value->name}}</td>
  <td>{{$value->code}}</td>
  <td> 
      @if($value->status=='1')
      <p style="margin-left:5%">Active</p> 
      @endif
  </td>
  <td>
   
  </td>
  <td></td>
  <td></td>
  <td>{{$value->created_at->format('Y-m-d')}}</td>
  <td><img style="text-align:center;width:30px;" src="http://dof.leotechbd.com/storage/{{$value->species_image}}" alt="Logo"></td> 
</tr>
  @endforeach
</table>

  <hr class="footer_hr">
  <div class="footer">
    <div class="column">
        {{-- <img style="height:30px" src="http://dof.leotechbd.com/storage/photos/s1yQC0tn5v07OGi8kt6k9JlEBvMdGPC9cZCTZJ9Q.png" alt="Logo"> --}}
        <h6 style="text-align:left">Fishing Vessel and Gear Database</h6> 
      </div>
      <div class="column">
        <h6 style="text-align:center">1 of 1 page</h6> 
      </div>
      <div class="column">
        <h6 style="text-align:right">Powered by LeoTech</h6> 
      </div>
</div>
</body>
</html>
