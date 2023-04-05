<?php

namespace Modules\VesselInfo\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\VesselInfo\Models\VesselInfo;
use Modules\VesselInfo\Models\FishingAreaInfo;
use Modules\VesselInfo\Models\FishingSpeciesInfo;
use Modules\VesselInfo\Models\PortInfo;
use Modules\VesselInfo\Models\VesselSetupInfo;
use Modules\VesselInfo\Models\VesselWiseGearInfo;
use Illuminate\Support\Facades\DB;

// use \Mpdf\Mpdf as PDF;  
use PDF;
use Illuminate\Support\Facades\Storage;
class VesselInfoReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable

     * Show the form for creating a new resource.
     * @return Renderable
     * 
     */
    public function exportPDF($id) {
        
        $p = VesselInfo::with('VesselWiseGearInfo','VesselOwnerInfosecondery','VesselOwnerInfo','VesselWiseEquipmentneq.VesselSetupequevment','VesselWiseEquipmentlse.VesselSetupequevment','VesselWiseEquipmentfse.VesselSetupequevment','VesselWiseEquipmentceq.VesselSetupequevment','OfficeInfo','VesselSetupInfo','VesselSetupins','VesselSetupvcl','VesselSetupneq','VesselSetupflm','VesselSetupvst','UserInfo','VesselWiseFishingSpeciesInfoprimaery.FishingSpeciesInfo','VesselWiseFishingSpeciesInfoother.FishingSpeciesInfo','VesselWiseFishingSpeciesInfosecondery.FishingSpeciesInfo')->find($id);
        // dd($p);
        // $invoice_date = date('jS F Y', strtotime($p->created_at)); 
        // return view('user::pages.export_pdf',[
        //     'p'=>$p
        // ]);
  
        $pdf = PDF::loadView('user::pages.export_pdf',array('p'=>$p,'logo' =>url('backend/images/logo.png') ));
        return $pdf->download('p-'.$p->name.'.pdf');
    }
    public function exportPDFView($id) {
        
        $p = VesselInfo::with('VesselWiseGearInfo','VesselOwnerInfosecondery','VesselOwnerInfo','VesselWiseEquipmentneq.VesselSetupequevment','VesselWiseEquipmentlse.VesselSetupequevment','VesselWiseEquipmentfse.VesselSetupequevment','VesselWiseEquipmentceq.VesselSetupequevment','OfficeInfo','VesselSetupInfo','VesselSetupins','VesselSetupvcl','VesselSetupneq','VesselSetupflm','VesselSetupvst','UserInfo','VesselWiseFishingSpeciesInfoprimaery.FishingSpeciesInfo','VesselWiseFishingSpeciesInfoother.FishingSpeciesInfo','VesselWiseFishingSpeciesInfosecondery.FishingSpeciesInfo')->find($id);
        return view('vesselinfo::pages.all.report_view',compact('p'));
    }
    public function fishingAreaexportPDF($id){
        $p = FishingAreaInfo::find($id);
        $pdf = PDF::loadView('vesselinfo::pages.fishing_area_export_pdf',array('p'=>$p,'logo' =>url('backend/images/logo.jpg') ));
        return $pdf->download('p-'.$p->name.'.pdf');
    }
    public function fishingSpeciesexportPDF($id){
        $p = FishingSpeciesInfo::find($id);
        $pdf = PDF::loadView('vesselinfo::pages.fishing_species_export_pdf',array('p'=>$p,'logo' =>url('backend/images/logo.jpg') ));
        return $pdf->download('p-'.$p->name.'.pdf');
    }
    public function fishingPortexportPDF($id){
        $p = PortInfo::find($id);
        $pdf = PDF::loadView('vesselinfo::pages.fishing_port_export_pdf',array('p'=>$p,'logo' =>url('backend/images/logo.jpg') ));
        return $pdf->download('p-'.$p->name.'.pdf');
    }
    public function vesselSetupexportPDF($id){
        $p = VesselSetupInfo::find($id);
        $pdf = PDF::loadView('vesselinfo::pages.vessel_setup_export_pdf',array('p'=>$p,'logo' =>url('backend/images/logo.jpg') ));
        return $pdf->download('p-'.$p->name.'.pdf');
    }
    ///////////////////////////////////////////
    public function fishingAreaexportPDFAll(){
        $variable = VesselSetupInfo::get();
        $pdf = PDF::loadView('vesselinfo::pages.all.fishing_area_export_pdf',array('variable'=>$variable,'logo' =>url('backend/images/logo.jpg') ));
        return $pdf->download('variable-','.pdf');
    }
    public function fishingSpeciesexportPDFAll(){
        $variable = FishingSpeciesInfo::get();
        $pdf = PDF::loadView('vesselinfo::pages.all.fishing_species_export_pdf',array('variable'=>$variable,'logo' =>url('backend/images/logo.jpg') ));
        return $pdf->download('variable-','.pdf');
    }
    public function fishingPortexportPDFAll(){
        $variable = PortInfo::get();
        $pdf = PDF::loadView('vesselinfo::pages.all.fishing_port_export_pdf',array('variable'=>$variable,'logo' =>url('backend/images/logo.jpg') ));
        return $pdf->download('variable-','.pdf');
    }
    public function vesselSetupexportPDFAll(){
        $variable = VesselSetupInfo::get();
        $pdf = PDF::loadView('vesselinfo::pages.all.vessel_setup_export_pdf',array('variable'=>$variable,'logo' =>url('backend/images/logo.jpg') ));
        return $pdf->download('variable-','.pdf');
    }
    public function adv(){
        return view('vesselinfo::pages.all.adv');
    }
    public function document()
    {
        // Setup a filename 
        $documentFileName = "fun.pdf";
        // Create the mPDF document
        $document = new PDF( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);     
 
        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];
 
        // Write some simple Content
        $document->WriteHTML('<h1 style="color:blue">TheCodingJack</h1>');
        // $document->WriteHTML('<p>Write something, just for fun!</p>');
        // $document->WriteHTML(view('frontend.create-cv.pdf', compact('data'));
        // Use Blade if you want
        $variable = VesselSetupInfo::get();
        $document->WriteHTML(view('vesselinfo::pages.all.vessel_setup_export_pdf',compact('variable')));
         
        // Save PDF on your public storage 
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));
         
        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header); //
    }

  public function faruk($id){
    $p=VesselInfo::find($id);
    $p->archive_data = 'N';
    $p->update();
    return redirect()->back()->with('status',' Delete Successfully');
  }
  public function DoughnutChartOne()
  {
      $ESBN=VesselWiseGearInfo::where('gear_id','42')->sum('gear_count');
      $Set_Back_Net=VesselWiseGearInfo::where('gear_id','43')->sum('gear_count');
      $Trammel_net=VesselWiseGearInfo::where('gear_id','45')->sum('gear_count');
      $Line_hook=VesselWiseGearInfo::where('gear_id','46')->sum('gear_count');
      $Pole_hook=VesselWiseGearInfo::where('gear_id','47')->sum('gear_count');
      $doughnutChart = [$ESBN, $Set_Back_Net,$Trammel_net,$Line_hook,$Pole_hook];
      return response($doughnutChart);
  }

 // chart ..pie chart
 public function pieChart()
 {
     $categorywiseproduct = VesselSetupInfo::withCount('gearType')->where('type','ger')->where('status','A')->get();
    //  dd($categorywiseproduct);
     return response($categorywiseproduct);
 }

    public function create()
    {
        return view('vesselinfo::create');
    }
    
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('vesselinfo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('vesselinfo::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
