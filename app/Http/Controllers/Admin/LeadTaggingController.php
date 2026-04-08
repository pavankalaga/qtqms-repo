<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{BusinessInteligence, ExpectedBusiness, BusinessInfoDetails};
use App\Models\ContactDetail;
use App\Models\User;
use App\Models\Salesheadquarter;
use Yajra\DataTables\Facades\DataTables;

class LeadTaggingController extends Controller
{
    public function index()
    {
        $reports = BusinessInfoDetails::with(['user'])->orderBy('id', 'desc')->paginate(10);
        $sales_head_quarters = Salesheadquarter::all();
        $users = User::get();
        return view('leadtagging.index', compact('reports', 'users', 'sales_head_quarters'));
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
                return $report->user->first_name . $report->user->last_name ?? 'N/A';
            })
            ->addColumn('assign_user', function ($report) use ($users) {
                $userOptions = '';
                foreach ($users as $user) {
                    $userOptions .= '<option value="' . $user->id . '">' . $user->first_name . ' ' . $user->last_name . '</option>';
                }
    
                return '
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignModal' . $report->id . '">
                        Assign User
                    </button>
                    <div class="modal fade lead-tagging-modal" id="assignModal' . $report->id . '" tabindex="-1" aria-labelledby="assignModalLabel' . $report->id . '" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="assignModalLabel' . $report->id . '">Assign User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="' . route('leads.assign_user', $report->id) . '" method="POST">
                                        ' . csrf_field() . '
                                        <div class="mb-3">
                                            <select name="assign_user" class="form-select">
                                                <option value="" selected>Choose...</option>
                                                ' . $userOptions . '
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success">Assign</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
            })
            ->rawColumns(['action', 'status', 'assign_user'])
            ->make(true);
    }


    


    public function leadTagging(Request $request, $id)
    {
        $request->validate([
            'assign_user' => 'required|exists:users,id',
        ]);

        $assignUserId = $request->input('assign_user');
        $businessInfo = BusinessInfoDetails::findOrFail($id);

        // Update assigned user
        $businessInfo->assign_user = $assignUserId;
        $businessInfo->save();

        // Emit success response or redirect with success message
        // return response()->json(['message' => 'User successfully assigned to report'], 200);
        return redirect()->back();
    }

    public function example_company(){

        $sales_head_quarters = \App\Models\Salesheadquarter::all();
        $expected_business[] = ['test_name' => '', 'expected_qty_day' => '', 'expected_l2l_price' => '', 'amount' => '', 'total' => ''];
        //return view('lead.create', compact('sales_head_quarters', 'expected_business'));
         return view('leadtagging.example', compact('sales_head_quarters', 'expected_business'));
    }

}
