<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

use App\Models\Location;


class QualityController extends Controller
{
    public function quality_indicator()
    {
        return view('quality.quality-indicator');
    }
    public function quality_indicator_daily()
    {
        return view('quality.quality-indicator-daily');
    }
    public function pre_analytical_daily_report()
    {
        $labs = Location::all();
        return view('quality.pre-analytical-daily-report', compact('labs'));
    }
    public function analytical_quality_daily_report()
    {
        $labs = Location::all();

        $master_quality = DB::table('master_quality_indicators')->where('phase', 'Examination')->get();


        return view('quality.analytical-quality-daily-report', compact('master_quality', 'labs'));
    }
    public function getMenuDescription($id)
    {
        $menu = DB::table('master_quality_indicators')
            // ->where('phase', 'Examination')
            ->where('id', $id)->first();
        // dd($menu);

        if ($menu) {
            return response()->json(['success' => true, 'description' => $menu->description]);
        } else {
            return response()->json(['success' => false, 'message' => 'Menu item not found']);
        }
    }
    public function post_analytical_daily_report()
    {
        $labs = Location::all();

        $master_qualityPost = DB::table('master_quality_indicators')->where('phase', 'Post_Examination')->get();
        return view('quality.post-analytical-daily-report', compact('master_qualityPost', 'labs'));
    }
    // public function dashboard()
    // {
    //     $labs = Location::all();

    //     $master_qualityPost = DB::table('master_quality_indicators')->where('phase', 'Post_Examination')->get();
    //     $master_quality = DB::table('master_quality_indicators')->get();
    //     $indicators = DB::table('stock_planner')
    //         ->select('row_id as id', 'title')
    //         ->distinct()
    //         ->get();

    //     // Get both initial and residual heat map data
    //     $heatMapData = $this->getRiskHeatMapData();
    //     $residualHeatMapData = $this->getResidualRiskHeatMapData();

    //     return view('dashboard.dashboard', compact(
    //         'master_qualityPost',
    //         'labs',
    //         'master_quality',
    //         'indicators',
    //         'heatMapData',
    //         'residualHeatMapData'
    //     ));
    // }


    // public function updateStockExaminationTypeValue()
    // {
    //     // dd('asdasd');

    //     $typeValues = [
    //         100,
    //         101,
    //         102,
    //         103,
    //         104,
    //         105,
    //         106,
    //         107,
    //         108,
    //         109,
    //         110,
    //         111,
    //         112,
    //         113,
    //         114,
    //         115,
    //         116,
    //         117,
    //         118,
    //         119,
    //         120,
    //         121,
    //         122,
    //         123,
    //         124,
    //         125,
    //         126,
    //         127,
    //         128,
    //         129,
    //         130
    //     ];
    //     $year = 2025;
    //     $month = 1;

    //     // updateStockExaminationTypeValue($typeValues, 2025, 5);


    //     // Get all quality indicators for Post_Examination
    //     $qualityIndicators = DB::table('master_quality_indicators')
    //         ->where('phase', 'Post_Examination')
    //         ->get();

    //     $reportMonth = "$year-" . str_pad($month, 2, '0', STR_PAD_LEFT);

    //     foreach ($qualityIndicators as $indicator) {
    //         $title = $indicator->id;
    //         $subtitle = $indicator->description;

    //         for ($rowId = 1; $rowId <= 11; $rowId++) {
    //             $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

    //             for ($day = 1; $day <= $daysInMonth; $day++) {
    //                 // You can fetch the value from array based on day, or any logic
    //                 $typeValue = $typeValues[$day - 1] ?? null; // Ensure you pass correct array

    //                 if ($typeValue !== null) {
    //                     DB::table('stock_examination')
    //                         ->where('row_id', $rowId)
    //                         ->where('day', $day)
    //                         ->where('title', $title)
    //                         ->where('report_month', $reportMonth)
    //                         // ->where('subtitle', $subtitle)
    //                         ->update([
    //                             'total_value' => $typeValue,
    //                             'updated_at' => now()
    //                         ]);
    //                 }
    //             }
    //         }
    //     }
    // }

    public function updateStockExaminationTypeValue()
    {
        $typeValues = [
            218,
            275,
            215,
            296,
            148,
            399,
            329,
            334,
            428,
            232,
            192,
            183,
            302,
            285,
            387,
            349,
            322,
            259,
            194,
            308,
            312,
            245,
            176,
            308,
            119,
            300,
            199,
            308,
            271
        ];

        $year = 2025;
        $month = 5;
        $reportMonth = "$year-" . str_pad($month, 2, '0', STR_PAD_LEFT);

        $qualityIndicators = DB::table('master_quality_indicators')
            ->where('phase', 'Examination')
            ->get();

        foreach ($qualityIndicators as $indicator) {
            $title = $indicator->id;
            $subtitle = $indicator->description;

            for ($rowId = 1; $rowId <= 11; $rowId++) {
                $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $typeValue = $typeValues[$day - 1] ?? null;

                    if ($typeValue !== null) {
                        DB::table('stock_examination')->insert([
                            'row_id' => $rowId,
                            'day' => $day,
                            'title' => $title,
                            'subtitle' => $subtitle,
                            'report_month' => $reportMonth,
                            'type_value' => 0,
                            'total_value' => $typeValue,
                            'daily_percentage' => 0,
                            'lab_id' => 10,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }


                }

                DB::table('stock_examination')->insert([
                    'row_id' => $rowId,
                    'day' => 0,
                    'title' => $title,
                    'subtitle' => $subtitle,
                    'report_month' => $reportMonth,
                    'type_value' => 0,
                    'total_value' => $typeValue,
                    'daily_percentage' => 0,
                    'avg_percentage' => 0,
                    'lab_id' => 10,
                    'total_misidentified' => 0,
                    'total_samples' => array_sum($typeValues),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);


            }
        }
    }
    public function indexDash(Request $request)
    {
        $data22 = DB::table('risk_mitigations')
            ->join('risk_reports', 'risk_reports.id', '=', 'risk_mitigations.risk_id')
            ->select('risk_mitigations.*', 'risk_reports.risk_name as riskName')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        if ($request->ajax()) {
            return view('dashboard.mitigation-pagination', compact('data22'));
        }

        return view('dashboard.dashboard', compact('data22'));
    }
    public function dashboard(Request $request)
    {
        $labs = Location::all();
       $labId = request('lab_id');
        $data = DB::table('risk_reports')
            ->join('locations', 'risk_reports.lab_id', '=', 'locations.id')
            ->select(
                'risk_reports.*',
                'locations.location as lab_name'
            )
            ->orderBy('risk_reports.created_at', 'desc')
            ->get();
       $data22 = DB::table('risk_mitigations')
    ->join('risk_reports', 'risk_reports.id', '=', 'risk_mitigations.risk_id')
    ->select('risk_mitigations.*', 'risk_reports.risk_name as riskName', 'lab_id')
    ->where('risk_reports.lab_id', $labId)
    ->orderBy('created_at', 'desc')
    ->paginate(5)
    ->appends(['lab_id' => $labId]); 
        // $labs = DB::table('locations')->get();
        $departments = DB::table('departments')->orderBy('name')->get();

        $severity = collect([
            (object) ['name' => 'Catastrophic (5)', 'value' => 5],
            (object) ['name' => 'Serious (4)', 'value' => 4],
            (object) ['name' => 'Major (3)', 'value' => 3],
            (object) ['name' => 'Moderate (2)', 'value' => 2],
            (object) ['name' => 'Minor (1)', 'value' => 1],
        ]);

        $likehood = collect([
            (object) ['name' => 'Very Likely (5)', 'value' => 5],
            (object) ['name' => 'Likely (4)', 'value' => 4],
            (object) ['name' => 'Possible (3)', 'value' => 3],
            (object) ['name' => 'Remote (2)', 'value' => 2],
            (object) ['name' => 'Unlikely (1)', 'value' => 1],
        ]);

        $category = DB::table('dropdown_options')->where('type', 'RiskCategory')->get();

        

$heatMapData = $this->getRiskHeatMapData($labId);
$residualHeatMapData = $this->getResidualRiskHeatMapData($labId);

        $master_qualityPost = DB::table('master_quality_indicators')->where('phase', 'Post_Examination')->get();
        $master_quality = DB::table('master_quality_indicators')->get();
        $indicators = DB::table('stock_planner')
            ->select('row_id as id', 'title')
            ->distinct()
            ->get();

        // $postIndicators = DB::table('stock_planner')
        // ->select('row_id as id', 'title')
        // ->distinct()
        // ->get();

        $postIndicators = DB::table('stock_examination')
            ->join('master_quality_indicators', 'master_quality_indicators.id', '=', 'stock_examination.title')
            ->select('master_quality_indicators.id', 'master_quality_indicators.indicator')
            ->distinct()
            ->where('phase', 'Post_Examination')
            ->get();

        $examinIndicators = DB::table('stock_examination')
            ->join('master_quality_indicators', 'master_quality_indicators.id', '=', 'stock_examination.title')
            ->select('master_quality_indicators.id', 'master_quality_indicators.indicator')
            ->distinct()
            ->where('phase', 'Examination')
            ->get();

        $year = 2025;

        $planners = DB::table('eqas_planner')
            ->where('year', $year)
            ->get();

            $selectedLabId = $request->input('lab_id'); // null if not set

        // if ($selectedLabId) {
        //     $planners = DB::table('eqas_planner')->where('lab_id', $selectedLabId)->get();
        // } else {
        //     $planners = DB::table('eqas_planner')->get();
        // }

        $submissions = DB::table('eqas_submissions')
            ->get()
            ->groupBy(function ($item) {
                $month = Carbon::parse($item->eqa_cycle)->month;
                return $item->eqa_provider . '|' . $item->eqa_program . '|' . $month . '|' . $item->lab_id . '|' . $item->department;
            });

        $months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];

        return view('dashboard.dashboard', compact(
            'master_qualityPost',
            'labs',
            'master_quality',
            'indicators',
            'heatMapData',
            'residualHeatMapData',
            'planners',
            'months',
            'submissions',
            'data',
            'departments',
            'severity',
            'likehood',
            'category',
            'data22',
            'postIndicators',
            'examinIndicators',
            'selectedLabId',
            'labId'
        ));
    }



    public function submitForm(Request $request)
    {
        $inputData = $request->all();
        // dd($request->all());
        // Debug: Log incoming data
        \Log::info('Incoming form data:', $inputData);

        // Get lab_id and month_year from the first item or use fallbacks
        $labId = $inputData[0]['lab_id'] ?? $request->input('lab_id', auth()->user()->lab_id);
        $monthYear = $inputData[0]['month'] ?? null;

        // Validate required fields
        if (empty($labId)) {
            return response()->json([
                'success' => false,
                'message' => 'No lab selected and user has no default lab'
            ], 400);
        }

        if (empty($monthYear)) {
            return response()->json([
                'success' => false,
                'message' => 'Month/year is required'
            ], 400);
        }

        foreach ($inputData as $row) {
            if (!isset($row['days'])) {
                continue;
            }

            $filteredDays = array_filter($row['days'], function ($day) {
                return is_numeric($day['type']) && is_numeric($day['total']);
            });

            foreach ($filteredDays as $day) {
                DB::table('stock_planner')->updateOrInsert(
                    [
                        'row_id' => $row['id'],
                        'day' => $day['day'],
                        'lab_id' => $labId,
                        'month_year' => $monthYear
                    ],
                    [
                        'title' => $row['title'],
                        'subtitle' => $row['subtitle'],
                        'type_value' => $day['type'],
                        'total_value' => $day['total'],
                        'daily_percentage' => $day['percentage'] ?? null,
                        'avg_percentage' => $row['average'] ?? null,
                        'total_misidentified' => $row['total_misidentified'] ?? null,
                        'total_samples' => $row['total_samples'] ?? null,
                        'lab_id' => $labId,
                        'month_year' => $monthYear,
                        'updated_at' => now(),
                        'created_at' => now()
                    ]
                );
            }
        }


        // // Store the average as a special record (day = 0)
        // if (isset($row['average']) || isset($row['total_misidentified'])) {
        //     DB::table('stock_planner')->updateOrInsert(
        //         [
        //             'row_id' => $row['id'],
        //             'day' => 0, // Using day 0 for average records
        //             'lab_id' => $labId,
        //             'month_year' => $monthYear // Include month_year in unique key
        //         ],
        //         [
        //             'title' => $row['title'],
        //             'subtitle' => $row['subtitle'],
        //             'type_value' => null,
        //             'total_value' => null,
        //             'daily_percentage' => null,
        //             'total_misidentified' => $row['total_misidentified'] ?? null,
        //             'total_samples' => $row['total_samples'] ?? null,
        //             'avg_percentage' => $row['average'],
        //             'lab_id' => $labId,
        //             'month_year' => $monthYear,
        //             'updated_at' => now(),
        //             'created_at' => $row['created_at'] ?? now(),
        //         ]
        //     );
        // }
        // }

        return response()->json([
            'success' => true,
            'message' => 'Form data saved successfully!',
            'lab_id' => $labId,
            'month_year' => $monthYear
        ]);
    }





public function externalQualityTable(Request $request)
{
    $selectedLabId = $request->input('lab_id');
    $labs = DB::table('locations')->get();
    $planners = $selectedLabId
        ? DB::table('eqas_planner')->where('lab_id', $selectedLabId)->get()
        : DB::table('eqas_planner')->get();

    $submissions = DB::table('eqas_submissions')
        ->get()
        ->groupBy(function ($item) {
            $month = \Carbon\Carbon::parse($item->eqa_cycle)->month;
            return $item->eqa_provider . '|' . $item->eqa_program . '|' . $month . '|' . $item->lab_id . '|' . $item->department;
        });

    // Use the same logic as your main blade for $months, $filteredPlanners, $grouped
    $months = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];
    $filteredPlanners = $selectedLabId ? $planners->where('lab_id', $selectedLabId) : $planners;
    $grouped = $filteredPlanners->groupBy('provider');

    return view('dashboard.partials.external_quality_table', compact(
        'months', 'filteredPlanners', 'grouped', 'submissions', 'labs', 'selectedLabId'
    ))->render();
}
    // Update getSubmittedData method
    // public function getSubmittedData($menuId, Request $request)
    // {
    //     $labId = $request->input('lab_id', auth()->user()->lab_id);
    //     $month = $request->input('month');

    //     if (empty($labId)) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Lab ID is required'
    //         ], 400);
    //     }

    //     if (empty($month)) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Month is required'
    //         ], 400);
    //     }

    //     $data = DB::table('stock_examination')
    //         ->where('title', $menuId)
    //         ->where('lab_id', $labId)
    //         ->where('report_month', $month)
    //         ->get();

    //     // Transform data to match frontend expectations
    //     $result = [];
    //     $departments = [
    //         "Bio-Chemistry",
    //         "Immunology",
    //         "Haematology",
    //         "Serology",
    //         "Micro Biology",
    //         "Molecular Biology",
    //         "Histo Pathology",
    //         "Cytology",
    //         "Clinical Pathology",
    //         "CytoGenetics",
    //         "Genetics"
    //     ];

    //     foreach ($departments as $index => $department) {
    //         $rowId = $index + 1;
    //         $rowData = [
    //             'id' => $rowId,
    //             'title' => $menuId,
    //             'subtitle' => '', // Will be filled from menu description
    //             'days' => []
    //         ];

    //         // Filter data for this specific row/department
    //         $rowRecords = $data->where('row_id', $rowId);

    //         foreach ($rowRecords as $record) {
    //             $rowData['days'][] = [
    //                 'day' => $record->day,
    //                 'type' => $record->type_value,
    //                 'total' => $record->total_value
    //             ];
    //         }

    //         $result[] = $rowData;
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'data' => $result
    //     ]);
    // }

    // In your controller

    // In your RiskReportController

    public function getSubmittedData($menuId, Request $request)
    {
        try {
            $labId = $request->input('lab_id', auth()->user()->lab_id);
            $month = $request->input('month');

            if (empty($labId)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lab ID is required'
                ], 400);
            }

            if (empty($month)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Month is required'
                ], 400);
            }

            // Get all data for this menu, lab, and month
            $data = DB::table('stock_examination')
                ->where('title', $menuId)
                ->where('lab_id', $labId)
                ->where('report_month', $month)
                ->orderBy('row_id')
                ->orderBy('day')
                ->get();

            // Organize data by row_id
            $organizedData = [];
            foreach ($data as $record) {
                $rowId = $record->row_id;

                if (!isset($organizedData[$rowId])) {
                    $organizedData[$rowId] = [
                        'id' => $rowId,
                        'title' => $record->title,
                        'subtitle' => $record->subtitle,
                        'average' => '0%',
                        'total_misidentified' => '0',
                        'total_samples' => '0',
                        'days' => []
                    ];
                }

                if ($record->day == 0) {
                    // This is the average/total record
                    $organizedData[$rowId]['average'] = $record->avg_percentage ? $record->avg_percentage . '%' : '0%';
                    $organizedData[$rowId]['total_misidentified'] = $record->total_misidentified ?? '0';
                    $organizedData[$rowId]['total_samples'] = $record->total_samples ?? '0';
                } else {
                    // This is daily data
                    $organizedData[$rowId]['days'][] = [
                        'day' => $record->day,
                        'type' => $record->type_value,
                        'total' => $record->total_value,
                        'percentage' => $record->daily_percentage ? $record->daily_percentage . '%' : '0%'
                    ];
                }
            }

            return response()->json([
                'success' => true,
                'data' => array_values($organizedData)
            ]);

        } catch (\Exception $e) {
            \Log::error('Error fetching submitted data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }



    // In your QualityFormController.php

    public function getNumeratorDetailsPost(Request $request)
    {
        try {
            $validated = $request->validate([
                'row_id' => 'required|integer',
                'day' => 'required|integer|between:1,31',
                'department' => 'required|string',
                'indicator_id' => 'required|integer',
                'lab_id' => 'required|integer',
                'month' => 'required|date_format:Y-m'
            ]);

            $details = DB::table('post_barcode_details')
                ->where('row_id', $validated['row_id'])
                ->where('day', $validated['day'])
                ->where('department', $validated['department'])
                ->where('indicator_id', $validated['indicator_id'])
                ->where('lab_id', $validated['lab_id'])
                ->where('month', $validated['month'])
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $details
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching details: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveNumeratorDetailsPost(Request $request)
    {
        try {
            $validated = $request->validate([
                'row_id' => 'required|integer',
                'day' => 'required|integer|between:1,31',
                'department' => 'required|string',
                'indicator_id' => 'required|integer',
                'lab_id' => 'required|integer',
                'month' => 'required|date_format:Y-m',
                'barcode' => 'required|string|max:255',
                'lis_ticket_number' => 'required|string|max:255'
            ]);

            $id = DB::table('post_barcode_details')->insertGetId([
                'row_id' => $validated['row_id'],
                'day' => $validated['day'],
                'department' => $validated['department'],
                'indicator_id' => $validated['indicator_id'],
                'lab_id' => $validated['lab_id'],
                'month' => $validated['month'],
                'barcode' => $validated['barcode'],
                'lis_ticket_number' => $validated['lis_ticket_number'],
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'data' => ['id' => $id]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving details: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteNumeratorDetailPost($id)
    {
        try {
            $deleted = DB::table('post_barcode_details')
                ->where('id', $id)
                ->delete();

            return response()->json([
                'success' => (bool) $deleted,
                'message' => $deleted ? 'Detail deleted successfully' : 'Detail not found'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting detail: ' . $e->getMessage()
            ], 500);
        }
    }

    // Update submitForm2 method
    public function submitForm2(Request $request)
    {
        \Log::info('submitForm2 input:', $request->all());
        $labId = $request->input('lab_id', auth()->user()->lab_id);
        $reportMonth = $request->input('report_month');
        $rows = $request->input('rows', []);

        foreach ($rows as $row) {
            // Store daily data
            foreach ($row['days'] as $day) {
                DB::table('stock_examination')->updateOrInsert(
                    [
                        'row_id' => $row['id'],
                        'title' => $row['title'],
                        'day' => $day['day'],
                        'lab_id' => $labId,
                        'report_month' => $reportMonth
                    ],
                    [
                        'subtitle' => $row['subtitle'],
                        'type_value' => $day['type'] ?? '',
                        'total_value' => $day['total'] ?? '',
                        'daily_percentage' => $day['percentage'] ?? '0',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }

            // Store average and totals as day=0 record
            DB::table('stock_examination')->updateOrInsert(
                [
                    'row_id' => $row['id'],
                    'title' => $row['title'],
                    'day' => 0, // Using day 0 for average/total records
                    'lab_id' => $labId,
                    'report_month' => $reportMonth
                ],
                [
                    'subtitle' => $row['subtitle'],
                    'avg_percentage' => $row['average'] ?? '0',
                    'total_misidentified' => $row['total_misidentified'] ?? '0',
                    'total_samples' => $row['total_samples'] ?? '0',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        return response()->json(['success' => true, 'message' => 'Form data saved successfully!']);
    }

    // public function submitForm2(Request $request)
    // {
    //     $formData = $request->all();
    //     \Log::info('Received Form Data Count:', ['count' => count($formData)]);

    //     foreach ($formData as $row) {
    //         $rowId = $row['id'];
    //         $title = $row['title']; // Use this directly as received
    //         $subtitle = $row['subtitle'];

    //         \Log::info("Processing row {$rowId} with {$title}, days count: " . count($row['days']));

    //         foreach ($row['days'] as $day) {
    //             if (empty($day['day']) || (!isset($day['type']) && !isset($day['total']))) {
    //                 continue; // Skip incomplete data
    //             }

    //             $dayNumber = $day['day'];
    //             $typeValue = $day['type'] ?? '';
    //             $totalValue = $day['total'] ?? '';

    //             \Log::info("Row {$rowId}, Day {$dayNumber}: Type={$typeValue}, Total={$totalValue}");

    //             DB::table('stock_examination')->updateOrInsert(
    //                 [
    //                     'row_id' => $rowId,
    //                     'title' => $title,
    //                     'day' => $dayNumber
    //                 ],
    //                 [
    //                     'subtitle' => $subtitle,
    //                     'type_value' => $typeValue,
    //                     'total_value' => $totalValue,
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]
    //             );
    //         }
    //     }

    //     return response()->json(['success' => true, 'message' => 'Form data saved successfully!']);
    // }

    // public function getQualityFormData(Request $request)
    // {
    //     // Fetch data from the database
    //     // $data = DB::table('stock_planner')->all();

    //     $data = DB::table('stock_planner')->get();

    //     return response()->json(['success' => true, 'data' => $data]);
    // }
// Add this method to your controller

    public function getQualityFormData(Request $request)
    {
        try {
            $labId = $request->input('lab_id', auth()->user()->lab_id);
            $month = $request->input('month');

            if (empty($labId)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Lab ID is required'
                ], 400);
            }

            $query = DB::table('stock_planner')->where('lab_id', $labId);

            if ($month) {
                $query->where('month_year', $month);
            }

            $allData = collect(); // create empty collection

            $query->orderBy('id')->chunk(1000, function ($chunk) use (&$allData) {
                $allData = $allData->concat($chunk);
            });

            return response()->json([
                'success' => true,
                'data' => $allData->values() // clean index
            ]);

        } catch (\Exception $e) {
            \Log::error('Error fetching quality form data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }



    // In your QualityFormController.php

    public function getNumeratorDetails(Request $request)
    {
        try {
            $rowId = $request->input('row_id');
            $day = $request->input('day');
            $labId = $request->input('lab_id', auth()->user()->lab_id);
            $month = $request->input('month');

            $details = DB::table('quaity_barcode_records')
                ->where('row_id', $rowId)
                ->where('day', $day)
                ->where('lab_id', $labId)
                ->when($month, function ($query) use ($month) {
                    return $query->where('month', $month);
                })
                ->get();

            return response()->json([
                'success' => true,
                'data' => $details
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching details: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveNumeratorDetails(Request $request)
    {
        try {
            $validated = $request->validate([
                'row_id' => 'required|integer',
                'day' => 'required|integer|between:1,31',
                'barcode' => 'required|string|max:255',
                'lis_ticket_number' => 'required|string|max:255',
            ]);

            $labId = auth()->user()->lab_id;
            $month = $request->input('month', date('Y-m'));

            $id = DB::table('quaity_barcode_records')->insertGetId([
                'row_id' => $validated['row_id'],
                'day' => $validated['day'],
                'barcode' => $validated['barcode'],
                'lis_ticket_number' => $validated['lis_ticket_number'],
                'lab_id' => $labId,
                'month' => $month,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'data' => ['id' => $id]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving details: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteNumeratorDetail($id)
    {
        try {
            $deleted = DB::table('quaity_barcode_records')
                ->where('id', $id)
                ->delete();

            return response()->json([
                'success' => (bool) $deleted,
                'message' => $deleted ? 'Detail deleted successfully' : 'Detail not found'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting detail: ' . $e->getMessage()
            ], 500);
        }
    }

    // public function getSubmittedData($menuId)
    // {
    //     \Log::info('Fetching data for menuId:', ['menuId' => $menuId]);

    //     // Fetch data from the database
    //     $data = DB::table('stock_examination')
    //         ->where('title', $menuId) // Use menuId directly as title
    //         ->get();

    //     \Log::info('Fetched data count:', ['count' => $data->count()]);

    //     // Group data by row_id (department)
    //     $groupedData = [];
    //     foreach ($data as $item) {
    //         $rowId = $item->row_id;
    //         if (!isset($groupedData[$rowId])) {
    //             $groupedData[$rowId] = [
    //                 'id' => $rowId,
    //                 'title' => $item->title,
    //                 'subtitle' => $item->subtitle,
    //                 'days' => []
    //             ];
    //         }
    //         $groupedData[$rowId]['days'][] = [
    //             'day' => $item->day,
    //             'type' => $item->type_value,
    //             'total' => $item->total_value
    //         ];
    //     }

    //     // Convert to indexed array
    //     $result = array_values($groupedData);

    //     \Log::info('Grouped Data:', ['count' => count($result)]);

    //     return response()->json([
    //         'success' => true,
    //         'data' => $result
    //     ]);
    // }

    // Add this method to your controller
    public function getIndicatorData(Request $request)
    {
        try {
            $indicatorId = $request->input('indicator_id');
            $monthFrom = $request->input('month_from');
            $monthTo = $request->input('month_to');
            $labId = $request->input('lab_id', auth()->user()->lab_id);

            // Validate inputs
            if (empty($indicatorId) || empty($monthFrom) || empty($monthTo) || empty($labId)) {
                return response()->json([
                    'success' => false,
                    'message' => 'All parameters are required'
                ], 400);
            }

            // Get indicator title
            $indicatorTitle = DB::table('stock_planner')
                ->where('row_id', $indicatorId)
                ->value('title');

            // Get unique monthly averages and totals for the selected indicator
            $data = DB::table('stock_planner')
                ->select('month_year', 'avg_percentage', 'total_misidentified', 'total_samples')
                ->where('row_id', $indicatorId)
                ->where('lab_id', $labId)
                ->whereBetween('month_year', [$monthFrom, $monthTo])
                ->groupBy('month_year', 'avg_percentage', 'total_misidentified', 'total_samples')
                ->orderBy('month_year')
                ->get();

            // Format data for charts
            $monthData = [];
            foreach ($data as $record) {
                $monthKey = $record->month_year;
                if (!isset($monthData[$monthKey])) {
                    $monthData[$monthKey] = [
                        'label' => date('F Y', strtotime($record->month_year . '-01')),
                        'avg_value' => (float) $record->avg_percentage,
                        'total_misidentified' => (float) $record->total_misidentified,
                        'total_samples' => (float) $record->total_samples
                    ];
                }
            }

            // Extract data for charts
            $labels = array_column($monthData, 'label');
            $avgValues = array_column($monthData, 'avg_value');
            $misidentified = array_column($monthData, 'total_misidentified');
            $samples = array_column($monthData, 'total_samples');

            return response()->json([
                'success' => true,
                'data' => [
                    'labels' => $labels,
                    'values' => $avgValues,
                    'misidentified' => $misidentified,
                    'samples' => $samples,
                    'indicator' => $indicatorTitle
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Error fetching indicator data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    private function getMonthsInRange($start, $end)
    {
        $startDate = new \DateTime($start . '-01');
        $endDate = new \DateTime($end . '-01');
        $months = [];

        while ($startDate <= $endDate) {
            $monthKey = $startDate->format('Y-m');
            $months[$monthKey] = [
                'label' => $startDate->format('F Y'),
                'avg_value' => 0,
                'total_misidentified' => 0,
                'total_samples' => 0
            ];
            $startDate->modify('+1 month');
        }

        return $months;
    }




    //     public function getPostIndicatorData(Request $request)
//     {
//         try {
//             $indicatorId = $request->input('indicator_id');
//             $monthFrom = $request->input('month_from');
//             $monthTo = $request->input('month_to');
//             $labId = $request->input('lab_id', auth()->user()->lab_id);

    //             // Validate inputs
//             if (empty($indicatorId) || empty($monthFrom) || empty($monthTo)) {
//                 return response()->json([
//                     'success' => false,
//                     'message' => 'All parameters are required'
//                 ], 400);
//             }

    //             // // Get indicator title
//             // $indicatorTitle = DB::table('stock_examination')
//             //     ->where('row_id', $indicatorId)
//             //     ->value('title');

    //             $indicatorTitle = DB::table('stock_examination')
//                 ->join('master_quality_indicators', 'master_quality_indicators.id', '=', 'stock_examination.title')
//                 ->where('stock_examination.row_id', $indicatorId)
//                 ->value('master_quality_indicators.indicator');


    //             // Get unique monthly averages and totals for the selected indicator
//             $data = DB::table('stock_examination')
//                 ->select('report_month', 'avg_percentage', 'total_misidentified', 'total_samples')
//                 ->where('row_id', $indicatorId)
//                 ->where('lab_id', $labId)
//                 ->whereBetween('report_month', [$monthFrom, $monthTo])
//                 ->groupBy('report_month', 'avg_percentage', 'total_misidentified', 'total_samples')
//                 ->orderBy('report_month')
//                 ->get();

    //             // Format data for charts
//             // Initialize months with 0s
//             $monthData = $this->getMonthsInRange($monthFrom, $monthTo);

    //             // Fetch DB data
// // $data = DB::table('stock_examination')
// //     ->select('report_month', 'avg_percentage', 'total_misidentified', 'total_samples')
// //     ->where('row_id', $indicatorId)
// //     ->where('lab_id', $labId)
// //     ->whereBetween('report_month', [$monthFrom, $monthTo])
// //     ->orderBy('report_month')
// //     ->get();

    //             // Map data to months
//             foreach ($data as $record) {
//                 $monthKey = $record->report_month;
//                 if (isset($monthData[$monthKey])) {
//                     $monthData[$monthKey] = [
//                         'label' => date('F Y', strtotime($record->report_month . '-01')),
//                         'avg_value' => (float) $record->avg_percentage,
//                         'total_misidentified' => (float) $record->total_misidentified,
//                         'total_samples' => (float) $record->total_samples
//                     ];
//                 }
//             }


    //             // Extract data for charts
//             $labels = array_column($monthData, 'label');
//             $avgValues = array_column($monthData, 'avg_value');
//             $misidentified = array_column($monthData, 'total_misidentified');
//             $samples = array_column($monthData, 'total_samples');

    //             return response()->json([
//                 'success' => true,
//                 'data' => [
//                     'labels' => $labels,
//                     'values' => $avgValues,
//                     'misidentified' => $misidentified,
//                     'samples' => $samples,
//                     'indicator1' => $indicatorTitle
//                 ]
//             ]);

    //         } catch (\Exception $e) {
//             \Log::error('Error fetching indicator data: ' . $e->getMessage());
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Error fetching data: ' . $e->getMessage()
//             ], 500);
//         }
//     }



    public function getPostIndicatorData(Request $request)
    {
        try {
            $indicatorId = $request->input('indicator_id');
            $monthFrom = $request->input('month_from');
            $monthTo = $request->input('month_to');
            $labId = $request->input('lab_id', auth()->user()->lab_id);

            // Validate inputs
            if (empty($indicatorId) || empty($monthFrom) || empty($monthTo)) {
                return response()->json([
                    'success' => false,
                    'message' => 'All parameters are required'
                ], 400);
            }

            $indicatorTitle = DB::table('stock_examination')
                ->join('master_quality_indicators', 'master_quality_indicators.id', '=', 'stock_examination.title')
                ->where('stock_examination.title', $indicatorId)
                ->value('master_quality_indicators.indicator');


            // Get unique monthly averages and totals for the selected indicator
            $data = DB::table('stock_examination')
                ->select('report_month', 'avg_percentage', 'total_misidentified', 'total_samples')
                ->where('title', $indicatorId)
                ->where('lab_id', $labId)
                ->whereBetween('report_month', [$monthFrom, $monthTo])
                ->groupBy('report_month', 'avg_percentage', 'total_misidentified', 'total_samples')
                ->orderBy('report_month')
                ->get();

            $monthData = $this->getMonthsInRange($monthFrom, $monthTo);

            // Map data to months
            foreach ($data as $record) {
                $monthKey = $record->report_month;
                if (isset($monthData[$monthKey])) {
                    $monthData[$monthKey] = [
                        'label' => date('F Y', strtotime($record->report_month . '-01')),
                        'avg_value' => (float) $record->avg_percentage,
                        'total_misidentified' => (float) $record->total_misidentified,
                        'total_samples' => (float) $record->total_samples
                    ];
                }
            }


            // Extract data for charts
            $labels = array_column($monthData, 'label');
            $avgValues = array_column($monthData, 'avg_value');
            $misidentified = array_column($monthData, 'total_misidentified');
            $samples = array_column($monthData, 'total_samples');

            return response()->json([
                'success' => true,
                'data' => [
                    'labels' => $labels,
                    'values' => $avgValues,
                    'misidentified' => $misidentified,
                    'samples' => $samples,
                    'indicator1' => $indicatorTitle
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Error fetching indicator data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getAnlyteIndicatorData(Request $request)
    {
        // dd('hello');
        try {
            $indicatorId = $request->input('indicator_id');
            $monthFrom = $request->input('month_from');
            $monthTo = $request->input('month_to');
            $labId = $request->input('lab_id', auth()->user()->lab_id);

            // Validate inputs
            if (empty($indicatorId) || empty($monthFrom) || empty($monthTo)) {
                return response()->json([
                    'success' => false,
                    'message' => 'All parameters are required'
                ], 400);
            }

            // // Get indicator title
            // $indicatorTitle = DB::table('stock_examination')
            //     ->where('row_id', $indicatorId)
            //     ->value('title');

            $indicatorTitle = DB::table('stock_examination')
                ->join('master_quality_indicators', 'master_quality_indicators.id', '=', 'stock_examination.title')
                ->where('stock_examination.title', $indicatorId)
                ->value('master_quality_indicators.indicator');


            // Get unique monthly averages and totals for the selected indicator
            $data = DB::table('stock_examination')
                ->select('report_month', 'avg_percentage', 'total_misidentified', 'total_samples')
                ->where('title', $indicatorId)
                ->where('lab_id', $labId)
                ->whereBetween('report_month', [$monthFrom, $monthTo])
                ->groupBy('report_month', 'avg_percentage', 'total_misidentified', 'total_samples')
                ->orderBy('report_month')
                ->get();

            // Format data for charts
            // Initialize months with 0s
            $monthData = $this->getMonthsInRange($monthFrom, $monthTo);

            // Fetch DB data
// $data = DB::table('stock_examination')
//     ->select('report_month', 'avg_percentage', 'total_misidentified', 'total_samples')
//     ->where('row_id', $indicatorId)
//     ->where('lab_id', $labId)
//     ->whereBetween('report_month', [$monthFrom, $monthTo])
//     ->orderBy('report_month')
//     ->get();

            // Map data to months
            foreach ($data as $record) {
                $monthKey = $record->report_month;
                if (isset($monthData[$monthKey])) {
                    $monthData[$monthKey] = [
                        'label' => date('F Y', strtotime($record->report_month . '-01')),
                        'avg_value' => (float) $record->avg_percentage,
                        'total_misidentified' => (float) $record->total_misidentified,
                        'total_samples' => (float) $record->total_samples
                    ];
                }
            }


            // Extract data for charts
            $labels = array_column($monthData, 'label');
            $avgValues = array_column($monthData, 'avg_value');
            $misidentified = array_column($monthData, 'total_misidentified');
            $samples = array_column($monthData, 'total_samples');

            return response()->json([
                'success' => true,
                'data' => [
                    'labels' => $labels,
                    'values' => $avgValues,
                    'misidentified' => $misidentified,
                    'samples' => $samples,
                    'indicator1' => $indicatorTitle
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Error fetching indicator data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getSingleMonthData(Request $request)
    {
        try {
            $indicatorId = $request->input('row_id');
            $labId = $request->input('lab_id', auth()->user()->lab_id);
            $monthYear = $request->input('month_year');

            // Validate inputs
            if (empty($indicatorId) || empty($monthYear)) {
                return response()->json([
                    'success' => false,
                    'message' => 'row_id and month_year are required'
                ], 400);
            }

            // Query the data
            $data = DB::table('stock_planner')
                ->where('row_id', $indicatorId)
                ->where('lab_id', $labId)
                ->where('month_year', $monthYear)
                ->get();

            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching single month data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }




    // Controller method to get heat map data using existing risk_rating column



    public function getRiskHeatMapDataFiltered($lab_id = null)
    {
        $query = DB::table('risk_reports')
            ->select('severity', 'likelihood')
            ->whereNotNull('severity')
            ->whereNotNull('likelihood');

        if ($lab_id) {
            $query->where('lab_id', $lab_id);
        }

        $risks = $query->get();

        // Count combinations of severity and likelihood
        $combinationCounts = [];
        foreach ($risks as $risk) {
            $severityNum = $this->convertToNumeric($risk->severity);
            $likelihoodNum = $this->convertToNumeric($risk->likelihood);

            if ($severityNum && $likelihoodNum) {
                $key = $severityNum . '_' . $likelihoodNum;
                $combinationCounts[$key] = ($combinationCounts[$key] ?? 0) + 1;
            }
        }

        // Create heat map data structure
        $heatMapData = [];

        for ($severity = 5; $severity >= 1; $severity--) {
            for ($likelihood = 1; $likelihood <= 5; $likelihood++) {
                $key = $severity . '_' . $likelihood;
                $count = $combinationCounts[$key] ?? 0;
                $rating = $severity * $likelihood;

                $heatMapData[$severity][$likelihood] = [
                    'count' => $count,
                    'rating' => $rating,
                    'css_class' => $this->getRiskCssClass($rating)
                ];
            }
        }

        return $heatMapData;
    }

    // Helper method to determine CSS class based on risk rating


    // Dashboard controller method


    // Alternative method if you want to filter by lab_id or other criteria
    // public function getRiskHeatMapDataFiltered($lab_id = null)
    // {
    //     $query = DB::table('risk_reports')
    //         ->select('risk_rating', DB::raw('count(*) as count'));

    //     if ($lab_id) {
    //         $query->where('lab_id', $lab_id);
    //     }

    //     $ratingCounts = $query->groupBy('risk_rating')
    //         ->pluck('count', 'risk_rating')
    //         ->toArray();

    //     $heatMapData = [];

    //     for ($severity = 5; $severity >= 1; $severity--) {
    //         for ($likelihood = 1; $likelihood <= 5; $likelihood++) {
    //             $rating = $severity * $likelihood;
    //             $count = isset($ratingCounts[$rating]) ? $ratingCounts[$rating] : 0;

    //             $heatMapData[$severity][$likelihood] = [
    //                 'count' => $count,
    //                 'rating' => $rating,
    //                 'css_class' => $this->getRiskCssClass($rating)
    //             ];
    //         }
    //     }

    //     return $heatMapData;
    // }

    // Method to get detailed breakdown for a specific rating
    public function getRisksByRating($rating)
    {
        return DB::table('risk_reports')
            ->where('risk_rating', $rating)
            ->get();
    }



    //  public function updateStockExaminationTypeValue()
//     {
//         // dd('asdasd');

    //        $typeValues = [
//     253,
//     222,
//     283,
//     260,
//     306,
//     262,
//     402,
//     302,
//     305,
//     386,
//     370,
//     233,
//     223,
//     186,
//     111,
//     245,
//     319,
//     392,
//     373,
//     278,
//     759,
//     583,
//     893,
//     452,
//     492,
//     455,
//     662,
//     548,
//     808,
//     633,
//     597
// ];

    //         $year = 2025;
//         $month = 1;

    //         // updateStockExaminationTypeValue($typeValues, 2025, 5);


    //         // Get all quality indicators for Post_Examination
//         $qualityIndicators = DB::table('master_quality_indicators')
//             ->where('phase', 'Examination')
//             ->get();

    //         $reportMonth = "$year-" . str_pad($month, 2, '0', STR_PAD_LEFT);

    //         foreach ($qualityIndicators as $indicator) {
//             $title = $indicator->id;
//             $subtitle = $indicator->description;

    //             for ($rowId = 1; $rowId <= 11; $rowId++) {
//                 $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

    //                 for ($day = 1; $day <= $daysInMonth; $day++) {
//                     // You can fetch the value from array based on day, or any logic
//                     $typeValue = $typeValues[$day - 1] ?? null; // Ensure you pass correct array

    //                     if ($typeValue !== null) {
//                         DB::table('stock_examination')
//                             ->where('row_id', $rowId)
//                             ->where('day', $day)
//                             ->where('title', $title)
//                             ->where('report_month', $reportMonth)
//                             // ->where('subtitle', $subtitle)
//                             ->update([
//                                 'total_value' => $typeValue,
//                                 'updated_at' => now()
//                             ]);
//                     }
//                 }
//             }
//         }
//     }


    public function getRiskHeatMapData($labId)
    {
        $risks = DB::table('risk_reports')
            ->select('severity', 'likelihood', 'risk_rating')
            ->whereNotNull('severity')
            ->whereNotNull('likelihood')
            ->where('lab_id', $labId)
            ->get();

        // Initialize the heatmap structure with all possible combinations
        $heatMapData = [];
        $ratingCounts = [];

        for ($severity = 5; $severity >= 1; $severity--) {
            for ($likelihood = 1; $likelihood <= 5; $likelihood++) {
                $rating = $severity * $likelihood;
                $heatMapData[$severity][$likelihood] = [
                    'count' => 0,
                    'rating' => $rating,
                    'css_class' => $this->getRiskCssClass($rating)
                ];
                if (!isset($ratingCounts[$rating])) {
                    $ratingCounts[$rating] = 0;
                }
            }
        }

        // Count actual occurrences
        foreach ($risks as $risk) {
            $severityNum = $this->convertToNumeric($risk->severity);
            $likelihoodNum = $this->convertToNumeric($risk->likelihood);

            if ($severityNum && $likelihoodNum) {
                $rating = $severityNum * $likelihoodNum;
                $heatMapData[$severityNum][$likelihoodNum]['count']++;
                $ratingCounts[$rating]++;
            }
        }

        return [
            'heatMapData' => $heatMapData,
            'ratingCounts' => $ratingCounts
        ];
    }

    public function getResidualRiskHeatMapData($labId)
    {
        $risks = DB::table('risk_reports')
            ->select('residual_severity', 'residual_likelihood', 'residual_risk_rating')
            ->whereNotNull('residual_severity')
            ->whereNotNull('residual_likelihood')
            ->where('lab_id', $labId)
            ->get();

        // Initialize the heatmap structure with all possible combinations
        $heatMapData = [];
        $ratingCounts = [];

        for ($severity = 5; $severity >= 1; $severity--) {
            for ($likelihood = 1; $likelihood <= 5; $likelihood++) {
                $rating = $severity * $likelihood;
                $heatMapData[$severity][$likelihood] = [
                    'count' => 0,
                    'rating' => $rating,
                    'css_class' => $this->getRiskCssClass($rating)
                ];
                if (!isset($ratingCounts[$rating])) {
                    $ratingCounts[$rating] = 0;
                }
            }
        }

        // Count actual occurrences
        foreach ($risks as $risk) {
            $severityNum = $this->convertToNumeric($risk->residual_severity);
            $likelihoodNum = $this->convertToNumeric($risk->residual_likelihood);

            if ($severityNum && $likelihoodNum) {
                $rating = $severityNum * $likelihoodNum;
                $heatMapData[$severityNum][$likelihoodNum]['count']++;
                $ratingCounts[$rating]++;
            }
        }

        return [
            'heatMapData' => $heatMapData,
            'ratingCounts' => $ratingCounts
        ];
    }



    private function convertToNumeric($value)
    {
        // Handle numeric values directly
        if (is_numeric($value)) {
            return (int) $value;
        }

        // Handle null or empty values
        if (empty($value)) {
            return null;
        }

        // Handle text values with mappings
        $mappings = [
            // Severity mappings
            'catastrophic (5)' => 5,
            'serious (4)' => 4,
            'major (3)' => 3,
            'moderate (2)' => 2,
            'minor (1)' => 1,

            // Likelihood mappings
            'very likely (5)' => 5,
            'likely (4)' => 4,
            'possible (3)' => 3,
            'remote (2)' => 2,
            'unlikely (1)' => 1,

            // Handle values with/without parentheses
            'catastrophic' => 5,
            'serious' => 4,
            'major' => 3,
            'moderate' => 2,
            'minor' => 1,
            'very likely' => 5,
            'likely' => 4,
            'possible' => 3,
            'remote' => 2,
            'unlikely' => 1
        ];

        $lowerValue = strtolower(trim($value));
        return $mappings[$lowerValue] ?? null;
    }
    private function getRiskCssClass($rating)
    {
        if ($rating >= 16)
            return 'high';
        if ($rating >= 6)
            return 'medium';
        return 'low';
    }

    public function getExaminationNumeratorDetails(Request $request)
    {
        try {
            $validated = $request->validate([
                'row_id' => 'required|integer',
                'day' => 'required|integer|between:1,31',
                'department' => 'required|string',
                'indicator_id' => 'required|integer',
                'lab_id' => 'required|integer',
                'month' => 'required|date_format:Y-m'
            ]);

            $details = DB::table('examination_barcode_details')
                ->where('row_id', $validated['row_id'])
                ->where('day', $validated['day'])
                ->where('department', $validated['department'])
                ->where('indicator_id', $validated['indicator_id'])
                ->where('lab_id', $validated['lab_id'])
                ->where('month', $validated['month'])
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $details
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching details: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveExaminationNumeratorDetails(Request $request)
    {
        try {
            $validated = $request->validate([
                'row_id' => 'required|integer',
                'day' => 'required|integer|between:1,31',
                'department' => 'required|string',
                'indicator_id' => 'required|integer',
                'lab_id' => 'required|integer',
                'month' => 'required|date_format:Y-m',
                'barcode' => 'required|string|max:255',
                'lis_ticket_number' => 'required|string|max:255'
            ]);

            $id = DB::table('examination_barcode_details')->insertGetId([
                'row_id' => $validated['row_id'],
                'day' => $validated['day'],
                'department' => $validated['department'],
                'indicator_id' => $validated['indicator_id'],
                'lab_id' => $validated['lab_id'],
                'month' => $validated['month'],
                'barcode' => $validated['barcode'],
                'lis_ticket_number' => $validated['lis_ticket_number'],
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'data' => ['id' => $id]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving details: ' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteExaminationNumeratorDetail($id)
    {
        try {
            $deleted = DB::table('examination_barcode_details')
                ->where('id', $id)
                ->delete();

            return response()->json([
                'success' => (bool) $deleted,
                'message' => $deleted ? 'Detail deleted successfully' : 'Detail not found'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting detail: ' . $e->getMessage()
            ], 500);
        }
    }


}
