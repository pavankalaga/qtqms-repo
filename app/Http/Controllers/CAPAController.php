<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class CAPAController extends Controller
{
    public function root_cause_analysis_form()
    {
        return view('capa.root-cause-analysis-form');
    }
    public function root_cause_analysis_list()
    {
        $rcas = DB::table('capa_rcas')->orderBy('incident_date', 'desc')->get();
        return view('capa.root-cause-analysis-list',compact('rcas'));
    }
    public function getDetails($incidentId) {
        $rca = DB::table('capa_rcas')->where('incident_id', $incidentId)->first();
        return response()->json($rca);
    }
    public function store(Request $request)
    {
        $request->validate([
            'incident-id' => 'required|unique:capa_rcas,incident_id',
            'incident-date' => 'required|date',
            'reported-by' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'problem-title' => 'required|string|max:255',
            'problem-description' => 'required|string',
            'impact' => 'required|string',
            'location' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'affected-systems' => 'required|string',
            'root-cause' => 'required|string',
            'analysis-method' => 'required|string|max:255',
            'assigned-to' => 'required|string|max:255',
            'completion-date' => 'required|date',
            'status' => 'required|in:not-started,in-progress,completed',
            'actions' => 'required|string',
        ]);

        DB::table('capa_rcas')->insert([
            'incident_id' => $request->input('incident-id'),
            'incident_date' => $request->input('incident-date'),
            'reported_by' => $request->input('reported-by'),
            'department' => $request->input('department'),
            'problem_title' => $request->input('problem-title'),
            'problem_description' => $request->input('problem-description'),
            'impact' => $request->input('impact'),
            'location' => $request->input('location'),
            'priority' => $request->input('priority'),
            'affected_systems' => $request->input('affected-systems'),
            'root_cause' => $request->input('root-cause'),
            'analysis_method' => $request->input('analysis-method'),
            'assigned_to' => $request->input('assigned-to'),
            'completion_date' => $request->input('completion-date'),
            'status' => $request->input('status'),
            'actions' => $request->input('actions'),
            'created_at'=>Carbon::now()
        ]);

        return redirect()->back()->with('success', 'RCA submitted successfully!');
    }
}
