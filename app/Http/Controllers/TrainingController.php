<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Location;
use App\Models\User;

use App\Models\TrainingCompletion;
use App\Models\TrainingCompletionEmployee;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function training_list()
    {
        $data = DB::table('trainings')->orderBy('created_at', 'desc')->get();
        return view('training.training-list', compact('data'));
    }

    public function calendar()
    {
        return view('training.calendar');
    }

    public function fetchTrainingDates()
    {
        // Get all training records (no date range limitation)
        $trainings = DB::table('trainings')
            ->orderBy('training_date', 'asc') // optional: to sort by date
            ->get(['training_date', 'training_name']);

        // Format as calendar events
        $events = $trainings->map(function ($training) {
            return [
                'title' => $training->training_name,
                'start' => $training->training_date,
                'color' => '#28a745',
            ];
        });

        return response()->json($events);
    }

    public function employee_attendance()
    {
        $labs = Location::all();
        $employees = User::where('role', '!=', 1)->get();
        $data = DB::table('trainings')->orderBy('created_at', 'desc')->get();
        foreach ($data as $item) {
            $item->employees = json_decode($item->employees, true);
        }
        return view('training.employee-attendance', compact('labs', 'employees', 'data'));
    }

    public function storeCompletion(Request $request)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'course_id' => 'required|exists:trainings,id',
            'employees' => 'required|array',
            'employees.*.name' => 'required|string',
            'employees.*.present' => 'nullable|in:1',
            'employees.*.absent' => 'nullable|in:1',
            'employees.*.pre_training_score' => 'nullable|string|max:255',
            'employees.*.post_training_score' => 'nullable|string|max:255',
            'employees.*.trainer_feedback' => 'nullable|string|max:255',
            'employees.*.trainee_feedback' => 'nullable|string|max:255',
            'employees.*.pre_training_doc' => 'nullable|file|mimes:pdf,jpg,png,doc,docx',
            'employees.*.post_training_doc' => 'nullable|file|mimes:pdf,jpg,png,doc,docx',
            'employees.*.trainer_feedback_doc' => 'nullable|file|mimes:pdf,jpg,png,doc,docx',
            'employees.*.trainee_feedback_doc' => 'nullable|file|mimes:pdf,jpg,png,doc,docx',
            'additional_doc' => 'nullable|file|mimes:pdf,jpg,png,doc,docx',
            'photo' => 'nullable|file|mimes:jpg,png,jpeg',
        ]);

        $employeeData = [];

        foreach ($request->employees as $index => $employee) {
            $emp = [
                'name' => $employee['name'],
                'present' => $employee['present'] ?? 0,
                'absent' => $employee['absent'] ?? 0,
                'pre_training_score' => $employee['pre_training_score'] ?? null,
                'post_training_score' => $employee['post_training_score'] ?? null,
                'trainer_feedback' => $employee['trainer_feedback'] ?? null,
                'trainee_feedback' => $employee['trainee_feedback'] ?? null,
            ];

            foreach (['pre_training_doc', 'post_training_doc', 'trainer_feedback_doc', 'trainee_feedback_doc'] as $field) {
                if ($request->hasFile("employees.$index.$field")) {
                    $file = $request->file("employees.$index.$field");
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $path = "trainingFiles/employee_docs";
                    $file->move(public_path($path), $filename);
                    $emp[$field] = "$path/$filename";
                } else {
                    $emp[$field] = null;
                }
            }

            $employeeData[] = $emp;
        }

        // Handle additional doc
        $additionalDocPath = null;
        if ($request->hasFile('additional_doc')) {
            $file = $request->file('additional_doc');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = "trainingFiles/training_docs";
            $file->move(public_path($path), $filename);
            $additionalDocPath = "$path/$filename";
        }

        // Handle photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = "trainingFiles/training_photos";
            $file->move(public_path($path), $filename);
            $photoPath = "$path/$filename";
        }

        TrainingCompletion::create([
            'location_id' => $request->location_id,
            'course_id' => $request->course_id,
            'employees' => $employeeData,
            'additional_doc' => $additionalDocPath,
            'photo' => $photoPath,
        ]);

        return redirect()->back()->with('success', 'Training completion submitted successfully.');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'lab_id' => 'required|exists:locations,id',
            'course' => 'required',
            'employees' => 'required|array',
            'employees.*.present' => 'sometimes|boolean',
            'employees.*.absent' => 'sometimes|boolean',
            'employees.*.pre_training_score' => 'nullable|string',
            'employees.*.pre_training_doc' => 'nullable|file',
            'employees.*.post_training_score' => 'nullable|string',
            'employees.*.post_training_doc' => 'nullable|file',
            'employees.*.trainer_feedback' => 'nullable|string',
            'employees.*.trainer_feedback_doc' => 'nullable|file',
            'employees.*.trainee_feedback' => 'nullable|string',
            'employees.*.trainee_feedback_doc' => 'nullable|file',
            'additional_doc' => 'nullable|file',
            'photo' => 'nullable|image',
        ]);

        // Store additional documents
        $additionalDocPath = $request->hasFile('additional_doc')
            ? $request->file('additional_doc')->store('training-docs')
            : null;

        $photoPath = $request->hasFile('photo')
            ? $request->file('photo')->store('training-photos')
            : null;

        foreach ($validated['employees'] as $employeeId => $employeeData) {
            $record = new TrainingRecord([
                'lab_id' => $validated['lab_id'],
                'course' => $validated['course'],
                'employee_id' => $employeeId,
                'present' => $employeeData['present'] ?? false,
                'absent' => $employeeData['absent'] ?? false,
                'pre_training_score' => $employeeData['pre_training_score'] ?? null,
                'post_training_score' => $employeeData['post_training_score'] ?? null,
                'trainer_feedback' => $employeeData['trainer_feedback'] ?? null,
                'trainee_feedback' => $employeeData['trainee_feedback'] ?? null,
                'additional_doc_path' => $additionalDocPath,
                'photo_path' => $photoPath,
            ]);

            // Store employee-specific documents
            if (isset($employeeData['pre_training_doc'])) {
                $record->pre_training_doc_path = $employeeData['pre_training_doc']->store('training-docs');
            }

            if (isset($employeeData['post_training_doc'])) {
                $record->post_training_doc_path = $employeeData['post_training_doc']->store('training-docs');
            }

            if (isset($employeeData['trainer_feedback_doc'])) {
                $record->trainer_feedback_doc_path = $employeeData['trainer_feedback_doc']->store('training-docs');
            }

            if (isset($employeeData['trainee_feedback_doc'])) {
                $record->trainee_feedback_doc_path = $employeeData['trainee_feedback_doc']->store('training-docs');
            }

            $record->save();
        }

        return redirect()->back()->with('success', 'Training records saved successfully!');
    }


    public function create()
    {

        $locations = DB::table('locations')->orderBy('location', 'asc')->get();
        return view('training.create', [
            'locations' => $locations,
            'training' => null,
        ]);
    }
    public function edit($id)
    {
        $training = DB::table('trainings')->where('id', $id)->first();
        $locations = DB::table('locations')->orderBy('location', 'asc')->get();
        
        return view('training.create', [
            'locations' => $locations,
            'training' => $training,
        ]);
    }
    public function update(Request $request, $id)
    {
        $employeesJson = $request->input('employees_json');
        $employees = $employeesJson ? json_decode($employeesJson, true) : [];

        DB::table('trainings')->where('id', $id)->update([
            'training_date' => $request->training_date,
            'training_name' => $request->training_name,
            'training_type' => $request->training_type,
            'department' => $request->department,
            'location' => $request->location,
            'participants' => $request->participants,
            'status' => $request->status,
            'trainer_name' => $request->trainer_name,
            'employees' => json_encode($employees),
            'updated_at' => now(),
        ]);

        return redirect()->route('training.training_list')->with('success', 'Training updated successfully');
    }

    public function training_library()
    {
        return view('training.training-library');
    }

    public function TrainingsStore(Request $request)
    {
        $request->validate([
            'training_date' => 'required|date',
            'training_name' => 'required|string|max:255',
            'training_type' => 'required|string',
            'department' => 'required|string',
            'location' => 'required|string',
            'participants' => 'required|integer|min:1',
            'status' => 'required|string',
            'trainer_name' => 'required|string|max:255',
        ]);

        $employeesJson = $request->input('employees_json');
        $employees = $employeesJson ? json_decode($employeesJson, true) : [];


        $data = DB::table('trainings')->insert([
            'training_date' => $request->training_date,
            'training_name' => $request->training_name,
            'training_type' => $request->training_type,
            'department' => $request->department,
            'location' => $request->location,
            'other_location' => $request->other_location ?? null,
            'participants' => $request->participants,
            'status' => $request->status,
            'trainer_name' => $request->trainer_name,
            'employees' => json_encode($employees),
            'created_at' => Carbon::now(),
        ]);

        if ($data) {
            return redirect()->back()->with('success', 'Submitted successfully!');
        } else {
            return redirect()->back()->with('error', 'Can not submit!');

        }
    }




    public function completion_store(Request $request)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'course_id' => 'required|exists:trainings,id', // Adjust table name as needed
            'additional_doc' => 'nullable|file|max:10240', // 10MB max
            'photo' => 'nullable|image|max:5120', // 5MB max
            'employees' => 'nullable|array',
            'employees.*.present' => 'nullable|boolean',
            'employees.*.absent' => 'nullable|boolean',
            'employees.*.pre_training_score' => 'nullable|string|max:255',
            'employees.*.pre_training_doc' => 'nullable|file|max:10240',
            'employees.*.post_training_score' => 'nullable|string|max:255',
            'employees.*.post_training_doc' => 'nullable|file|max:10240',
            'employees.*.trainer_feedback' => 'nullable|in:Satisfied,Need Improvement,Not Satisfied',
            'employees.*.trainer_feedback_doc' => 'nullable|file|max:10240',
            'employees.*.trainee_feedback' => 'nullable|in:Satisfied,Need Improvement,Not Satisfied',
            'employees.*.trainee_feedback_doc' => 'nullable|file|max:10240',
        ]);

        DB::beginTransaction();

        try {
            // Handle main file uploads
            $additionalDocPath = null;
            $photoPath = null;

            if ($request->hasFile('additional_doc')) {
                $additionalDocPath = $request->file('additional_doc')->store('training-completions/documents', 'public');
            }

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('training-completions/photos', 'public');
            }

            // Create main training completion record
            $trainingCompletion = TrainingCompletion::create([
                'location_id' => $request->location_id,
                'course_id' => $request->course_id,
                'additional_doc' => $additionalDocPath,
                'photo' => $photoPath,
            ]);

            // Handle employee data
            if ($request->has('employees')) {
                foreach ($request->employees as $employeeId => $employeeData) {
                    // Skip if no data is provided for this employee
                    if (!$this->hasEmployeeData($employeeData)) {
                        continue;
                    }

                    // Handle employee file uploads
                    $preTrainingDocPath = null;
                    $postTrainingDocPath = null;
                    $trainerFeedbackDocPath = null;
                    $traineeFeedbackDocPath = null;

                    if (isset($employeeData['pre_training_doc']) && $employeeData['pre_training_doc']) {
                        $preTrainingDocPath = $employeeData['pre_training_doc']->store('training-completions/employee-docs', 'public');
                    }

                    if (isset($employeeData['post_training_doc']) && $employeeData['post_training_doc']) {
                        $postTrainingDocPath = $employeeData['post_training_doc']->store('training-completions/employee-docs', 'public');
                    }

                    if (isset($employeeData['trainer_feedback_doc']) && $employeeData['trainer_feedback_doc']) {
                        $trainerFeedbackDocPath = $employeeData['trainer_feedback_doc']->store('training-completions/feedback-docs', 'public');
                    }

                    if (isset($employeeData['trainee_feedback_doc']) && $employeeData['trainee_feedback_doc']) {
                        $traineeFeedbackDocPath = $employeeData['trainee_feedback_doc']->store('training-completions/feedback-docs', 'public');
                    }

                    // Create employee training completion record
                    TrainingCompletionEmployee::create([
                        'training_completion_id' => $trainingCompletion->id,
                        'employee_id' => $employeeId,
                        'present' => isset($employeeData['present']) ? (bool) $employeeData['present'] : false,
                        'absent' => isset($employeeData['absent']) ? (bool) $employeeData['absent'] : false,
                        'pre_training_score' => $employeeData['pre_training_score'] ?? null,
                        'pre_training_doc' => $preTrainingDocPath,
                        'post_training_score' => $employeeData['post_training_score'] ?? null,
                        'post_training_doc' => $postTrainingDocPath,
                        'trainer_feedback' => $employeeData['trainer_feedback'] ?? null,
                        'trainer_feedback_doc' => $trainerFeedbackDocPath,
                        'trainee_feedback' => $employeeData['trainee_feedback'] ?? null,
                        'trainee_feedback_doc' => $traineeFeedbackDocPath,
                    ]);
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Training completion data saved successfully!');

        } catch (\Exception $e) {
            DB::rollback();

            // Clean up uploaded files if transaction fails
            if ($additionalDocPath && Storage::disk('public')->exists($additionalDocPath)) {
                Storage::disk('public')->delete($additionalDocPath);
            }
            if ($photoPath && Storage::disk('public')->exists($photoPath)) {
                Storage::disk('public')->delete($photoPath);
            }

            return redirect()->back()->with('error', 'Error saving training completion data: ' . $e->getMessage());
        }
    }

    private function hasEmployeeData($employeeData)
    {
        return !empty($employeeData['present']) ||
            !empty($employeeData['absent']) ||
            !empty($employeeData['pre_training_score']) ||
            !empty($employeeData['pre_training_doc']) ||
            !empty($employeeData['post_training_score']) ||
            !empty($employeeData['post_training_doc']) ||
            !empty($employeeData['trainer_feedback']) ||
            !empty($employeeData['trainer_feedback_doc']) ||
            !empty($employeeData['trainee_feedback']) ||
            !empty($employeeData['trainee_feedback_doc']);
    }

}
