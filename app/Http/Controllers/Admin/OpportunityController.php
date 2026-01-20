<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgreedBusiness;
use App\Models\BusinessInfoDetails;
use App\Models\CallLog;
use App\Models\Salesheadquarter;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class OpportunityController extends Controller
{
    

    public function index()
    {
        $is_sales_module = true;
        $reports = BusinessInfoDetails::with(['user'])->orderBy('id', 'desc')->paginate(10);
        $sales_head_quarters = Salesheadquarter::all();
        $users = User::get();
        $call_logs = CallLog::paginate(10);
        return view('opportunity.index', compact('reports', 'users', 'sales_head_quarters','call_logs','is_sales_module'));
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#assignModal' . $report->id . '">
                        Change Status
                    </button>
                    <div class="modal fade" id="assignModal' . $report->id . '" tabindex="-1" aria-labelledby="assignModalLabel' . $report->id . '" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="assignModalLabel' . $report->id . '">Change Status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="' . route('change_status', $report->id) . '" method="POST">
                                        ' . csrf_field() . '
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-select" id="status' . $report->id . '" required onchange="toggleTable' . $report->id . '(this)">
                                                <option selected>Choose...</option>
                                                <option value="Open">Open</option>
                                                <option value="Contacted">Contacted</option>
                                                <option value="Opportunity Created">Opportunity Created</option>
                                                <option value="Follow-up saveCallLogs">Follow-up saveCallLogs</option>
                                                <option value="Pre-Agreement">Pre-Agreement</option>
                                                <option value="Agreement Completed">Agreement Completed</option>
                                                <option value="Customer">Customer</option>
                                                <option value="Opportunity Lost">Opportunity Lost</option>
                                            </select>
                                        </div>
            
                                        <div id="tableSection' . $report->id . '" style="display: none;">
                                            <label class="form-label">Agreed Business</label>
                                            <div class="overflow-auto bg-white rounded-lg shadow-md">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Test Name</th>
                                                            <th>Expected Qty Day</th>
                                                            <th>Expected L2L Price</th>
                                                            <th>Amount</th>
                                                            <th>Total</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tableBody' . $report->id . '">
                                                        <tr>
                                                            <td>1</td>
                                                            <td><input type="text" name="expected_business[0][test_name]" class="form-control"></td>
                                                            <td><input type="text" name="expected_business[0][expected_qty_day]" class="form-control"></td>
                                                            <td><input type="text" name="expected_business[0][expected_l2l_price]" class="form-control"></td>
                                                            <td><input type="number" name="expected_business[0][amount]" class="form-control"></td>
                                                            <td><input type="number" name="expected_business[0][total]" class="form-control"></td>
                                                            <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">&times;</button></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="6" class="text-right">
                                                                <button type="button" class="btn btn-success" onclick="addNewRow' . $report->id . '()">+ Add Row</button>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </div>
            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <script>
                        function toggleTable' . $report->id . '(select) {
                            var tableSection = document.getElementById("tableSection' . $report->id . '");
                            tableSection.style.display = select.value === "Agreement Completed" ? "block" : "none";
                        }
            
                        function addNewRow' . $report->id . '() {
                            var tableBody = document.getElementById("tableBody' . $report->id . '");
                            var rowCount = tableBody.rows.length;
                            var row = document.createElement("tr");
            
                            row.innerHTML = `
                                <td>${rowCount + 1}</td>
                                <td><input type="text" name="expected_business[${rowCount}][test_name]" class="form-control"></td>
                                <td><input type="text" name="expected_business[${rowCount}][expected_qty_day]" class="form-control"></td>
                                <td><input type="text" name="expected_business[${rowCount}][expected_l2l_price]" class="form-control"></td>
                                <td><input type="number" name="expected_business[${rowCount}][amount]" class="form-control"></td>
                                <td><input type="number" name="expected_business[${rowCount}][total]" class="form-control"></td>
                                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">&times;</button></td>
                            `;
            
                            tableBody.appendChild(row);
                        }
            
                        function removeRow(button) {
                            button.closest("tr").remove();
                        }
                    </script>';
            })
            
            ->rawColumns(['action', 'status', 'change_status'])
            ->make(true);
    }
    


    public function ChangeStatus(Request $request,$id)
    {
    
        $bus_info = BusinessInfoDetails::find($id);
        $bus_info->status = $request->status;
        $bus_info->save();
        if (!empty($request->expected_business)) {
            foreach ($request->expected_business as $business) {
                AgreedBusiness::create([
                    'lead_id' => $bus_info->id,
                    'test_name' => $business['test_name'],
                    'expected_qty_day' => $business['expected_qty_day'],
                    'expected_l2l_price' => $business['expected_l2l_price'],
                    'amount' => $business['amount'],
                    'total' => $business['total'],
                ]);
            }
        }
        session()->flash('message', 'User successfully added.');
       
        return redirect()->back();
    }
    public function saveCallLogs(Request $request)
    {
        $request->validate([
            'check_in' => 'required|date_format:Y-m-d\TH:i',
            'check_out' => 'required|date_format:Y-m-d\TH:i',
            'follow_up_start' => 'required|date_format:Y-m-d\TH:i',
            'call_log_remarks' => 'nullable|string|max:255',
        ]);

        // Save the data
        \DB::table('call_logs')->insert([
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'follow_up_start' => $request->follow_up_start,
            // 'follow_up_end' => $request->follow_up_end,
            'call_log_remarks' => $request->call_log_remarks,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back();
    }
}
