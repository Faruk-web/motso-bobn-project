<?php
namespace Modules\User\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Carbon;
use Modules\User\Models\Branch;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Support\Renderable;
use Modules\VesselInfo\Models\VesselInfo;
use PDF;
class EmployeeController extends Controller {
    // Display user data in view
    public function showEmployees(){
      $employee = Employee::all();
      return view('index', compact('employee'));
    }
    // Export to PDF
    public function exportPDF($id) {
        
      $p = Employee::find($id);

      // $invoice_date = date('jS F Y', strtotime($p->created_at)); 

      $pdf = PDF::loadView('user::pages.export_pdf',array('p'=>$p));
      return $pdf->download('p-'.$p->name.'.pdf');


  }
}
