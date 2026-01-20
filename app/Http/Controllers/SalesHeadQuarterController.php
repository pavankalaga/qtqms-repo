<?php

namespace App\Http\Controllers;

use App\Models\Salesheadquarter;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SalesHeadQuarterController extends Controller
{
    public function index()
    {
        return view('headquarters.index');
    }
    public function getReports(Request $request)
    {
        $query = Salesheadquarter::orderBy('id', 'desc');
    
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $query->where('name', 'LIKE', "%{$search}%");
        }
    
        return DataTables::of($query)
            ->addColumn('action', function ($report) {
                return '
                <i class="far fa-edit" data-bs-toggle="modal" data-bs-target="#assignModal' . $report->id . '"></i>
                <div class="modal fade" id="assignModal' . $report->id . '" tabindex="-1" aria-labelledby="assignModalLabel' . $report->id . '" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignModalLabel' . $report->id . '">Assign User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="' . route('sales_headquarters.update', $report->id) . '" method="POST">
                                    ' . csrf_field() . '
                                    <div class="form-group">
                                        <label for="name' . $report->id . '" class="col-form-label">Name</label>
                                        <input type="text" class="form-control" id="name' . $report->id . '" name="name" value="' . htmlspecialchars($report->name) . '" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="delete-link" style="cursor:pointer;" onclick="confirmDelete(' . $report->id . ')"><i class="fas fa-trash"></i></span>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    


    public function save(Request $request)
    {
        $request->validate(['name' => 'required']);
        Salesheadquarter::create(['name' => $request->name]);
        return redirect()->back();
    }


    public function update(Request $request , $id)
    {
        $request->validate(['name' => 'required']);

      $record =   Salesheadquarter::find($id);
     $record->update(['name' => $request->name]);
      return redirect()->back();
    }

    public function destroy($id)
    {
        $report = Salesheadquarter::find($id);
        $report->delete();
    
        return response()->json(['success' => 'Record deleted successfully.']);
    }
    
}
