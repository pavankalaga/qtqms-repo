<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgreedBusiness;
use App\Models\BusinessInfoDetails;
use App\Models\CallLog;
use App\Models\SalesCall;
use App\Models\Salesheadquarter;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SalesCallController extends Controller
{
    public function index()
    {
        $reports = BusinessInfoDetails::with(['user'])->orderBy('id', 'desc')->paginate(10);
        $sales_head_quarters = Salesheadquarter::all();
        $users = User::get();
        $call_logs = CallLog::paginate(10);
        return view('sales.index', compact('reports', 'users', 'sales_head_quarters','call_logs'));
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
            // ->addColumn('change_status', function ($report) use ($users) {
            //     return '
            //         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignModal' . $report->id . '">
            //             Change Status
            //         </button>
            //         <div class="modal fade" id="assignModal' . $report->id . '" tabindex="-1" aria-labelledby="assignModalLabel' . $report->id . '" aria-hidden="true">
            //             <div class="modal-dialog">
            //                 <div class="modal-content">
            //                     <div class="modal-header">
            //                         <h5 class="modal-title" id="assignModalLabel' . $report->id . '">Change Status</h5>
            //                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            //                     </div>
            //                     <div class="modal-body">
            //                         <form action="' . route('assign_day_plan', $report->id) . '" method="POST">
            //                             ' . csrf_field() . '
            //                             <h2 class="text-lg font-bold mb-4">Update Status</h2>
                                        
            //                             <!-- Multi-Select Dropdown -->
            //                             <div class="mb-3">
            //                                 <label for="users' . $report->id . '" class="form-label">Select Users</label>
            //                                 <select name="lead_ids[]" id="users' . $report->id . '" class="form-select" multiple data-mdb-select-init="true" required>
            //                                     ' . implode('', $users->map(function($user) {
            //                                         return '<option value="' . $user->id . '">' . htmlspecialchars($user->first_name . ' ' . $user->last_name) . '</option>';
            //                                     })->toArray()) . '
            //                                 </select>
            //                             </div>
            
            //                             <!-- Date input -->
            //                             <input type="date" name="assign_date" class="form-control mt-4 mb-4" required>
            
            //                             <div class="d-flex justify-content-end gap-3 mt-4">
            //                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            //                                     Cancel
            //                                 </button>
            //                                 <button type="submit" class="btn btn-success">
            //                                     Save
            //                                 </button>
            //                             </div>
            //                         </form>
            //                     </div>
            //                 </div>
            //             </div>
            //         </div>
            //     ';
            // })
            
            // ->rawColumns(['action', 'status', 'change_status'])
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function getCalllogs(Request $request)
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
            
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
    public function assignUsers(Request $request) {
        $request->validate([
            'lead_ids' => 'required|array|min:1',
            'assign_date' => 'required|date',
        ]);
    // dd($request->lead_ids);
        try {
            foreach ($request->lead_ids as $lead_id) {
                SalesCall::insert([
                    'lead_ids' => $lead_id,
                    'assign_date' => $request->assign_date,
                ]);
            }
    
            session()->flash('message', 'Sales calls assigned successfully.');
        } catch (\Exception $th) {
            // Handle the exception appropriately, log it or return a user-friendly message
            session()->flash('error', 'An error occurred while assigning sales calls.');
            // Optionally log the exception
            \Log::error($th);
        }
    
        return redirect()->back(); // Redirect back after processing
    }
    
    
}
