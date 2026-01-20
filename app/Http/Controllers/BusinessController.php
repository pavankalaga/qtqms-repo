<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgreedBusiness;
use App\Models\BusinessInfoDetails;
use App\Models\CallLog;
use App\Models\ExpectedBusiness;
use App\Models\Salesheadquarter;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BusinessController extends Controller
{
    public function index()
    {
        $reports = BusinessInfoDetails::with(['user'])->orderBy('id', 'desc')->paginate(10);
        $sales_head_quarters = Salesheadquarter::all();
        $users = User::get();
        $call_logs = CallLog::paginate(10);
        return view('business.index', compact('reports', 'users', 'sales_head_quarters','call_logs'));
    }
    public function getReports(Request $request)
    {
        $reports = BusinessInfoDetails::with(['user', 'salesheadquarters'])->orderBy('id', 'desc');
        $users = User::all(); // Fetch users here to use within addColumn
    
        return DataTables::of($reports)
            ->addColumn('action', function ($report) {
                return '
                    <a href="' . route('lead.view', $report->id) . '" class="view-link"><i class="far fa-eye"></i></a>
                    <a href="' . route('lead.edit', $report->id) . '" class="edit-link"><i class="fas fa-edit"></i></a>
                    <span class="delete-link" style="cursor:pointer;" onclick="confirmDelete(\'' . $report->id . '\')"><i class="fas fa-trash"></i></span>
                ';
            })
            ->editColumn('status', function ($report) {
                return $report->status === 'own' ? '<span class="text-green-600">' . $report->status . '</span>' : '<span class="text-red-600">' . $report->status . '</span>';
            })
            ->addColumn('headquarters', function ($report) {
                return $report->salesheadquarters ? $report->salesheadquarters->name : 'N/A';
            })
            ->addColumn('assign', function ($report) {
                return $report->user->first_name . ' ' . $report->user->last_name ?? 'N/A';
            })
            ->addColumn('change_status', function ($report) {
                return '
                    <a href="' . route('lead.business_statistics', $report->id) . '" class=""><button type="button" class="btn btn-primary">
                        View BUsiness Statistics
                    </button></a>
                    ';
            })
            
            ->rawColumns(['action', 'status', 'change_status'])
            ->make(true);
    }

    public function businessStatisctics($id){
        $expectedBusinesses = ExpectedBusiness::where('lead_id', $id)->get();
        $agreedBusinesses = AgreedBusiness::where('lead_id', $id)->get();
        return view('business.statistics',compact('expectedBusinesses','agreedBusinesses'));
    }
    
}
