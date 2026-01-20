<?php

use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\LeadProfileController;
use App\Http\Controllers\Admin\LeadTaggingController;
use App\Http\Controllers\Admin\OpportunityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\SalesCallController;
use App\Http\Controllers\MyDataController;
use App\Http\Controllers\SalesHeadQuarterController;
use App\Http\Controllers\SalesProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\NewFormsController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CAPAController;
use App\Http\Controllers\IQCController;
use App\Http\Controllers\EQASController;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\AuditController;
use App\Http\Livewire\AnalyticsTab;
use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\BusinessIntelligence;
use App\Http\Livewire\BusinessStatistics;
use App\Http\Livewire\BusinessTab;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\ContactDetails;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\LeadTagging;
use App\Http\Livewire\Opportunity;
use App\Http\Livewire\Remarks;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\SalesCallLog;
use App\Http\Livewire\SalesCallTab;
use App\Http\Livewire\SalesFunnel;
use App\Http\Livewire\SalesHeadQuarters;
use App\Http\Livewire\SalesProfile;
use App\Http\Livewire\SearchReports;
use App\Http\Livewire\Transactions;
use App\Http\Livewire\ViewLeadRecord;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;
use App\Http\Livewire\Reports;
use App\Http\Livewire\EditReport;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GeneralFormsNextController;
use App\Http\Livewire\BusinessInfo;
use App\Http\Livewire\EditBusinessInfo;
use App\Http\Controllers\GeneralFormsController;
use App\Http\Controllers\AS\AsFormController;
use App\Http\Controllers\BE\BEFormsController;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

Route::get('/register', Register::class)->name('register');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.attempt'); // Changed name here
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');
Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');



Route::middleware('auth')->group(callback: function () {
  Route::post('/logoutprofile', [AuthController::class, 'logout'])->name('logoutprofile');
  Route::get('/lead', [LeadController::class, 'index'])->name('lead.index');

  Route::get('/document-manager/agreement', [DocumentController::class, 'agreement'])->name('document.agreement');
  Route::get('/document-manager/view/{id}', [DocumentController::class, 'view'])->name('document.view');
  Route::get('/document-manager/sales', [DocumentController::class, 'sales'])->name('document.sales');
  Route::get('/document-manager/sales/{foldername}', [DocumentController::class, 'folder_view'])->name('document.folder_view');

  Route::get('/forms/accessioning', [FormsController::class, 'forms_accessioning'])->name('forms.accessioning');
  Route::get('/forms/biochemistry', [FormsController::class, 'forms_biochemistry'])->name('forms.biochemistry');
  Route::get('/forms/clinical-pathology', [FormsController::class, 'forms_clinical_pathology'])->name('forms.clinical_pathology');
  Route::get('/forms/hematology', [FormsController::class, 'forms_hematology'])->name('forms.hematology');
  Route::get('/forms/it', [FormsController::class, 'forms_it'])->name('forms.it');
  Route::get('/forms/mol-bio', [FormsController::class, 'forms_mol_bio'])->name('forms.mol_bio');
  Route::get('/forms/microbiology', [FormsController::class, 'forms_microbiology'])->name('forms.microbiology');
  Route::get('/forms/checklist', [FormsController::class, 'forms_checklist'])->name('forms.checklist');

  Route::get('/newforms/TDPL_AS', [NewFormsController::class, 'NewformsTDPL_AS'])->name('forms.newFormsTDPL_AS');
  Route::get('/newforms/TDPL_BE', [NewFormsController::class, 'NewformsTDPL_BE'])->name('forms.newFormsTDPL_BE');
  Route::get('/newforms/TDPL_CG', [NewFormsController::class, 'NewformsTDPL_CG'])->name('forms.newFormsTDPL_CG');
  Route::get('/newforms/TDPL_CP', [NewFormsController::class, 'NewformsTDPL_CP'])->name('forms.newFormsTDPL_CP');
  Route::get('/newforms/TDPL_CY', [NewFormsController::class, 'NewformsTDPL_CY'])->name('forms.newFormsTDPL_CY');
  Route::get('/newforms/TDPL_GE', [NewFormsController::class, 'NewformsTDPL_GE'])->name('forms.newFormsTDPL_GE');
  Route::get('/newforms/TDPL_HM', [NewFormsController::class, 'NewformsTDPL_HM'])->name('forms.newFormsTDPL_HM');
  Route::get('/newforms/TDPL_HP', [NewFormsController::class, 'NewformsTDPL_HP'])->name('forms.newFormsTDPL_HP');
  Route::get('/newforms/TDPL_IT', [NewFormsController::class, 'NewformsTDPL_IT'])->name('forms.newFormsTDPL_IT');
  Route::get('/newforms/TDPL_LO', [NewFormsController::class, 'NewformsTDPL_LO'])->name('forms.newFormsTDPL_LO');
  Route::get('/newforms/TDPL_MB', [NewFormsController::class, 'NewformsTDPL_MB'])->name('forms.newFormsTDPL_MB');
  Route::get('/newforms/TDPL_MG', [NewFormsController::class, 'NewformsTDPL_MG'])->name('forms.newFormsTDPL_MG');
  Route::get('/newforms/TDPL_MI', [NewFormsController::class, 'NewformsTDPL_MI'])->name('forms.newFormsTDPL_MI');
  Route::get('/newforms/TDPL_PR', [NewFormsController::class, 'NewformsTDPL_PR'])->name('forms.newFormsTDPL_PR');
  Route::get('/newforms/TDPL_QA', [NewFormsController::class, 'NewformsTDPL_QA'])->name('forms.newFormsTDPL_QA');
  Route::get('/newforms/TDPL_SM', [NewFormsController::class, 'NewformsTDPL_SM'])->name('forms.newFormsTDPL_SM');

  Route::get('/forms/histopathology', [FormsController::class, 'forms_histopathology'])->name('forms.histopathology');
  Route::get('/forms/safety', [FormsController::class, 'forms_safety'])->name('forms.safety');
  Route::get('/forms/general', [FormsController::class, 'forms_general'])->name('forms.general');
  Route::get('/training/training-list', [TrainingController::class, 'training_list'])->name('training.training_list');
  Route::get('/training/calendar', [TrainingController::class, 'calendar'])->name('training.calendar');
  Route::get('/training/employee-attendance', [TrainingController::class, 'employee_attendance'])->name('training.employee_attendance');
  Route::get('/training/create', [TrainingController::class, 'create'])->name('training.create');
  Route::post('/trainings/store', [TrainingController::class, 'TrainingsStore'])->name('trainings.store');
  Route::get('/trainings/dates', [TrainingController::class, 'fetchTrainingDates'])->name('trainings.dates');
  // Route::post('/training-completion', [TrainingCompletionController::class, 'store'])->name('training-completion.store');
  Route::get('/training/edit/{id}', [TrainingController::class, 'edit'])->name('training.edit');
  Route::put('/training/update/{id}', [TrainingController::class, 'update'])->name('trainings.update');
  Route::get('/training/training-library', [TrainingController::class, 'training_library'])->name('training.training_library');
  Route::get('/capa/root-cause-analysis-form', [CAPAController::class, 'root_cause_analysis_form'])->name('capa.root_cause_analysis_form');
  Route::get('/capa/root-cause-analysis-list', [CAPAController::class, 'root_cause_analysis_list'])->name('capa.root_cause_analysis_list');
  Route::post('/submit-rca', [CAPAController::class, 'store'])->name('rca.store');
  Route::get('/rca/details/{incidentId}', [CAPAController::class, 'getDetails'])->name('rca.details');

  Route::post('/add-employee', [TrainingController::class, 'storeEmployee'])->name('add.employeeTraining');
  Route::post('/training-completion/store', [TrainingController::class, 'storeCompletion'])->name('training-completion.store2');
  Route::delete('/employees/set/{id}', [DocumentController::class, 'destroySet'])->name('employees.destroySet');

  Route::get('/add-manual-data', [QualityController::class, 'updateStockExaminationTypeValue'])->name('quality.updateStockExaminationTypeValue');

  Route::get('/risk-mitigationsDash', [QualityController::class, 'indexDash'])->name('risk-mitigations.index');

  Route::get('/eqas/submission', [EQASController::class, 'submission'])->name('eqas.submission');
  Route::post('/eqas-submission/store', [EQASController::class, 'formSubmit'])->name('eqas.store');
  Route::post('/ilc-submission/store', [EQASController::class, 'formSubmitILC'])->name('ilc.store');

  Route::get('/eqas/planner', [EQASController::class, 'planner'])->name('eqas.planner');
  Route::post('/eqas/plannerstore', [EqasController::class, 'storeEquasPlnr'])->name('eqasplnr.store');
  Route::get('/eqas/calendar/dates', [EqasController::class, 'getEqasByYear'])->name('eqas.calendarDates');
  Route::get('/ilc/calendar/dates', [EqasController::class, 'getILCByYear'])->name('ilc.calendarDates');

  Route::get('/eqas/calendar', [EQASController::class, 'calendar'])->name('eqas.calendar');
  Route::get('/eqas/list', [EQASController::class, 'table'])->name('eqas.table');
  Route::get('/get-eqas-data/{id}', [EQASController::class, 'getEqasData']);
  Route::get('/get-ilc-data/{id}', [EQASController::class, 'getILCData']);
  Route::get('/risk-mitigations/{riskId}', [IQCController::class, 'getRiskMitigations']);

  Route::get('/ilc/setup', [EQASController::class, 'ilc_setup'])->name('ilc.ilc_setup');
  Route::get('/ilc/planner', [EQASController::class, 'ilc_planner'])->name('ilc.ilc_planner');
  Route::post('/ILC/plannerstore', [EqasController::class, 'storeILCPlnr'])->name('ILCplnr.store');

  // Route::get('/risk/{id}', [IQCController::class, 'shows']);

  Route::get('/debug-risk-data', function () {
    // Check what's in your risk_reports table
    $sampleRisks = DB::table('risk_reports')
      ->select('severity', 'likelihood', 'risk_rating', 'residual_severity', 'residual_likelihood', 'residual_risk_rating')
      ->take(10)
      ->get();

    $severityValues = DB::table('risk_reports')
      ->select('severity')
      ->distinct()
      ->whereNotNull('severity')
      ->pluck('severity');

    $likelihoodValues = DB::table('risk_reports')
      ->select('likelihood')
      ->distinct()
      ->whereNotNull('likelihood')
      ->pluck('likelihood');

    $totalCount = DB::table('risk_reports')->count();

    return response()->json([
      'total_risks' => $totalCount,
      'sample_risks' => $sampleRisks,
      'unique_severity_values' => $severityValues,
      'unique_likelihood_values' => $likelihoodValues,
      'severity_count' => $severityValues->count(),
      'likelihood_count' => $likelihoodValues->count()
    ]);
  });

  // Or add this method to your controller for debugging


  Route::post('/fetch-ilc-data', function (Request $request) {
    $validated = $request->validate([
      'lab_id' => 'required|integer',
      // 'department' => 'required|string',
      'year' => 'required|integer'
    ]);

    $data = DB::table('ILC_planner')
      ->where('lab_id', $validated['lab_id'])
      // ->where('department', $validated['department'])
      ->where('year', $validated['year'])
      ->get()
      ->map(function ($item) {
        return [
          'provider' => $item->provider,
          'ilc_name' => $item->ilc_name,
          'department' => $item->department,
          'months_selected' => json_decode($item->months_selected, true) ?? []
        ];
      });

    return response()->json($data);
  });


  Route::post('/fetch-eqas-data', function (Request $request) {
    $validated = $request->validate([
      'lab_id' => 'required|integer',
      // 'department' => 'required|string',
      'year' => 'required|integer'
    ]);

    $data = DB::table('eqas_planner')
      ->where('lab_id', $validated['lab_id'])
      // ->where('department', $validated['department'])
      ->where('year', $validated['year'])
      ->get()
      ->map(function ($item) {
        return [
          'provider' => $item->provider,
          'eqas_name' => $item->eqas_name,
          'department' => $item->department,
          'months_selected' => json_decode($item->months_selected, true) ?? []
        ];
      });

    return response()->json($data);
  });
  Route::get('/get-eqas-months', [EQASController::class, 'getEqasMonths']);

  Route::get('/eqas-options', function () {
    $providers = DB::table('eqa_data')->pluck('eqa_provider')->unique()->values();
    $eqas_names = DB::table('eqa_data')->pluck('eqa_program')->unique()->values();

    return response()->json([
      'providers' => $providers,
      'eqas_names' => $eqas_names
    ]);
  });

  Route::get('/ilc-options', function () {
    $providers = DB::table('ilc_data')->pluck('ilc_provider')->unique()->values();
    $eqas_names = DB::table('ilc_data')->pluck('ilc_program')->unique()->values();

    return response()->json([
      'providers' => $providers,
      'eqas_names' => $eqas_names
    ]);
  });

  // Add this temporarily to your web.php routes file
  Route::get('/debug-risk', [QualityController::class, 'debugRiskData']);
  Route::get('/get-ilc-data-by-lab/{labId}', [EQASController::class, 'getILCDataByLab']);
  Route::get('/get-eqas-data-by-lab/{labId}', [EQASController::class, 'getEQAS22ataByLab']);

  Route::get('/ilc/table', [EQASController::class, 'ilc_table'])->name('ilc.ilc_table');
  Route::get('/ilc/calendar', [EQASController::class, 'ilc_calendar'])->name('ilc.ilc_calendar');
  Route::get('/audit/audit-list', [AuditController::class, 'audit_list'])->name('audit.audit_list');
  Route::get('/audit/audit-details', [AuditController::class, 'audit_details'])->name('audit.audit_details');
  Route::post('/audit-findings/store', [AuditController::class, 'auditFinding_store'])->name('auditFindings.store');
  Route::post('/post-audit-activities/store', [AuditController::class, 'auditPostAct_store'])->name('postAuditActivities.store');
  Route::get('/audit/mrm', [AuditController::class, 'management_review'])->name('audit.management_review');
  Route::get('/get-departments/{auditId}', [AuditController::class, 'getDepartments'])->name('get.departments');
  Route::get('/get-audit-details/{id}', [AuditController::class, 'getAuditDetails']);
  Route::get('/get-audit-findings/{auditId}', [AuditController::class, 'getAuditFindings']);

  Route::post('/management-review/submit', [AuditController::class, 'mrmStore'])->name('management.review.submit');

  // Routes for Management Review
  Route::prefix('management/review')->name('management.review.')->group(function () {
    Route::get('/{id}/edit', [AuditController::class, 'edit'])->name('edit');
    Route::put('/update', [AuditController::class, 'update'])->name('update');
  });


  // routes/web.php
  // routes/web.php
  Route::get(
    '/download/audit-document/{filePath}',
    [\App\Http\Controllers\AuditController::class, 'downloadAuditDocument']
  )
    ->where('filePath', '.*')
    ->name('audit.document.download');

  Route::get('/get-post-indicator-data', [QualityController::class, 'getPostIndicatorData'])->name('indicator.data');
  Route::get('/get-analyte-indicator-data', [QualityController::class, 'getAnlyteIndicatorData'])->name('analyte.indicator.data');
  Route::get('/get-single-month-data', [QualityController::class, 'getSingleMonthData']);

  Route::get('/audit/mrm-list', [AuditController::class, 'management_review_list'])->name('audit.management_review_list');
  Route::get('/quality/quality-indicator', [QualityController::class, 'quality_indicator'])->name('quality.quality_indicator');
  Route::get('/quality-indicator-daily', [QualityController::class, 'quality_indicator_daily'])->name('quality.quality_indicator_daily');
  Route::get('/quality/pre-analytical-daily-report', [QualityController::class, 'pre_analytical_daily_report'])->name('quality.pre_analytical_daily_report');
  Route::post('/api/submit-quality-form', [QualityController::class, 'submitForm']);
  Route::post('/api/submit-quality-form2', [QualityController::class, 'submitForm2']);

  // Route::post('/save-stock-planner', [QualityController::class, 'submitForm']);
  Route::get('/api/get-quality-form-data', [QualityController::class, 'getQualityFormData']);
  Route::get('/api/get-submitted-data/{menuId}', [QualityController::class, 'getSubmittedData']);



  Route::get('/get-numerator-details-post', [QualityController::class, 'getNumeratorDetailsPost']);
  Route::post('/save-numerator-details-post', [QualityController::class, 'saveNumeratorDetailsPost']);
  Route::delete('/delete-numerator-detail-post/{id}', [QualityController::class, 'deleteNumeratorDetailPost']);

  // routes/api.php
  // Route::get('/get-indicator-data', [QualityController::class, 'getIndicatorData']);
  // routes/web.php
  Route::get('/get-indicator-data', [QualityController::class, 'getIndicatorData'])->name('indicator.data');

  Route::get('/quality/analytical-quality-daily-report', [QualityController::class, 'analytical_quality_daily_report'])->name('quality.analytical_quality_daily_report');
  Route::get('/quality/post-analytical-daily-report', [QualityController::class, 'post_analytical_daily_report'])->name('quality.post_analytical_daily_report');
  Route::get('/dashboard', [QualityController::class, 'dashboard'])->name('quality.dashboard');
  Route::get('/dashboard/welcome', [AuthController::class, 'welcomeDashboard'])->name('welcome.dashboard');

// search externalQualityAMnagemt

Route::get('/dashboard/external-quality-management/table', [QualityController::class, 'externalQualityTable'])->name('external-quality.table');

Route::get('/get-examination-numerator-details', [QualityController::class, 'getExaminationNumeratorDetails']);
  Route::post('/save-examination-numerator-details', [QualityController::class, 'saveExaminationNumeratorDetails']);
  Route::delete('/delete-examination-numerator-detail/{id}', [QualityController::class, 'deleteExaminationNumeratorDetail']);


  Route::get('/api/get-menu-description/{id}', [QualityController::class, 'getMenuDescription']);
  // audit forms..................

  Route::post('/audit-schedule/store', [AuditController::class, 'auditScheduleStore'])->name('audit.schedule.store');

  // Route::get('/training-completion', [TrainingController::class, 'index'])->name('training-completion.index');
  // Route::post('/training-completion', [TrainingController::class, 'completion_store'])->name('training-completion.store');


  Route::get('/get-numerator-details', [QualityController::class, 'getNumeratorDetails']);
  Route::post('/save-numerator-details', [QualityController::class, 'saveNumeratorDetails']);
  Route::delete('/delete-numerator-detail/{id}', [QualityController::class, 'deleteNumeratorDetail']);

  Route::get('/iqc/validation-list', [IQCController::class, 'validation_list'])->name('iqc.validation_list');
  Route::get('/iqc/add-validation', [IQCController::class, 'add_validation'])->name('iqc.add_validation');
  Route::get('/iqc/calibration-protocol', [IQCController::class, 'calibration_protocol'])->name('iqc.calibration_protocol');
  Route::get('/iqc/calibration-list', [IQCController::class, 'calibration_list'])->name('iqc.calibration_list');
  Route::post('/calibration-parameter-tagging/store', [IQCController::class, 'CalibrationParameterStore']);
  Route::post('/control-parameter-tagging/store', [IQCController::class, 'controlParameterStore']);
  Route::post('/save-control-protocol', [IQCController::class, 'saveControlProtocol']);

  Route::post('/rest-room-cleanliness-logs', [GeneralFormsController::class, 'store14']);
  Route::get('/rest-room-cleanliness-logs', [GeneralFormsController::class, 'getByMonthYear14']);
  Route::post('/sodium-hypochlorite-logs', [GeneralFormsController::class, 'store15']);
  Route::get('/sodium-hypochlorite-logs', [GeneralFormsController::class, 'getByMonthYear15']);


  Route::get('/all-instruments', [GeneralFormsController::class, 'getInstruments']);
  Route::post('/refrigeration-temperature-logs', [GeneralFormsController::class, 'store16']);
  Route::get('/refrigeration-temperature-logs', [GeneralFormsController::class, 'getByMonthYear16']);
  Route::post('/instruments-setups', [GeneralFormsController::class, 'instrumentStore'])->name('instrument.store');

  Route::post('/deefrigeration-temperature-logs', [GeneralFormsController::class, 'store17']);
  Route::get('/deefrigeration-temperature-logs', [GeneralFormsController::class, 'getByMonthYear17']);
  Route::post('/transcription-check-logs', [GeneralFormsController::class, 'store18']);
  Route::get('/transcription-check-logs', [GeneralFormsController::class, 'getByMonthYear18']);
  Route::post('/instrument-breakdown-records', [GeneralFormsController::class, 'store19']);
  Route::get('/instrument-breakdown-records', [GeneralFormsController::class, 'getByMonthYear19']);

  Route::post('/non-conformity-logs-store', [GeneralFormsController::class, 'store20']);
  Route::get('/non-conformity-logs', [GeneralFormsController::class, 'getByMonthYear20']);

  Route::post('/sample-discard-logs-store', [GeneralFormsController::class, 'store21']);
  Route::get('/sample-discard-logs', [GeneralFormsController::class, 'getByMonthYear21']);

  Route::post('/lis-interface-logs-store', [GeneralFormsController::class, 'storeIT1']);
  Route::get('/lis-interface-logs', [GeneralFormsController::class, 'fetchIT1']);

  Route::post('/lis-validation-records', [GeneralFormsController::class, 'storeIT3']);
  Route::get('/lis-validation-records/latest', [GeneralFormsController::class, 'fetchIT3']);



  Route::get('/api/instruments', [GeneralFormsController::class, 'instrumentsFetch']);

  Route::post('/bio-safety-log', [GeneralFormsController::class, 'storeMolBio1']);
  Route::get('/fetch-bio-safety-logs', [GeneralFormsController::class, 'fetchMolBio1']);
  Route::post('/cooling-centrifuge-maintenance/store', [GeneralFormsController::class, 'storeMolBio2']);
  Route::get('/cooling-centrifuge-maintenance/fetch', [GeneralFormsController::class, 'fetchMolBio2']);

  Route::post('/bio-safety-maintenance/store', [GeneralFormsController::class, 'storeMicro1']);
  Route::get('/bio-safety-maintenance/fetch', [GeneralFormsController::class, 'fetchMicro1']);
  Route::post('/bio-safety-maintenance/store/two', [GeneralFormsController::class, 'storeMicro2']);
  Route::get('/bio-safety-maintenance-two/fetch', [GeneralFormsController::class, 'fetchMicro2']);

  Route::post('/oven-temperature-monitoring/store', [GeneralFormsController::class, 'storeMicro3'])->name('oven-temperature.store');
  Route::get('/oven-temperature-monitoring/fetch', [GeneralFormsController::class, 'fetchMicro3'])->name('oven-temperature.fetch');



  Route::get('/fetchMicro4', [GeneralFormsController::class, 'fetchMicro4']);
  Route::post('/storeMicro4', [GeneralFormsController::class, 'storeMicro4']);

  Route::get('/fetchMicro5', [GeneralFormsController::class, 'fetchMicro5']);
  Route::post('/storeMicro5', [GeneralFormsController::class, 'storeMicro5']);

  Route::get('/incubator-maintenance/fetch', [GeneralFormsController::class, 'fetchMicro6']);
  Route::post('/incubator-maintenance/store', [GeneralFormsController::class, 'storeMicro6']);


  Route::get('/fetchMicro8', [GeneralFormsController::class, 'fetchMicro8']);
  Route::post('/storeMicro8', [GeneralFormsController::class, 'storeMicro8']);
  Route::get('/fetchMicro9', [GeneralFormsController::class, 'fetchMicro9']);
  Route::post('/storeMicro9', [GeneralFormsController::class, 'storeMicro9']);

  Route::get('/fetchMicro10', [GeneralFormsController::class, 'fetchMicro10']);
  Route::post('/storeMicro10', [GeneralFormsController::class, 'storeMicro10']);
  // Route::post('/hot-plate-maintenance-logs', [GeneralFormsController::class, 'storeHisto1']);
  // Route::get('/hot-plate-maintenance-logs', [GeneralFormsController::class, 'getLogHisto1']);
  Route::get('/fetchMicro11', [FormsController::class, 'fetchMicro11']);
  Route::post('/storeMicro11', [FormsController::class, 'storeMicro11']);

  Route::get('/autoclave-biological/fetch', [FormsController::class, 'fetchMicro12']);
  Route::post('/autoclave-biological/store', [FormsController::class, 'storeMicro12']);

  Route::post('/hot-plate-maintenance/store', [GeneralFormsController::class, 'storeHisto1'])->name('hot-plate.store');
  Route::get('/hot-plate-maintenance/fetch', [GeneralFormsController::class, 'getLogHisto1'])->name('hot-plate.fetch');

  Route::post('/tissue-processor-logs/store', [FormsController::class, 'storeHisto2']);
  Route::get('/tissue-processor-logs/fetch', [FormsController::class, 'fetchHisto2']);


  Route::post('/tissue-processor-log/store', [GeneralFormsNextController::class, 'storeHisto3'])->name('tissue-processor.store');
  Route::post('/tissue-processor-log/fetch', [GeneralFormsNextController::class, 'fetchHisto3'])->name('tissue-processor.fetch');
  // Route::post('/lis-user-requests', [GeneralFormsController::class, 'storeIT2']);
  // Route::get('/lis-user-requests/latest', [GeneralFormsController::class, 'getLatest']);

  Route::post('/iqc-data/store', [GeneralFormsNextController::class, 'store31'])->name('iqc-data.store');
  Route::post('/iqc-data/fetch', [GeneralFormsNextController::class, 'fetch31'])->name('iqc-data.fetch');

  Route::post('/iqc-sample/log', [GeneralFormsNextController::class, 'store32'])->name('iqc.sample.logstore');


  Route::post('/outlier-log/store', [GeneralFormsNextController::class, 'store33'])->name('outlier-log.store');
  Route::post('/outlier-log/fetch', [GeneralFormsNextController::class, 'fetch33'])->name('outlier-log.fetch');


  Route::get('/inter-lab', [FormsController::class, 'indexGnrl22'])->name('inter-lab.index');
  Route::post('/inter-lab', [FormsController::class, 'storeGnrl22'])->name('inter-lab.store');
  Route::post('/suggestions', [FormsController::class, 'storeGnrl23'])->name('suggestion.store');
  Route::post('/customer-feedback', [FormsController::class, 'storeGnrl24'])->name('customer.feedback.store');
  Route::post('/physician-feedback/store', [GeneralFormsNextController::class, 'storeGnrl25']);

  Route::post('/equipment-logs/store', [GeneralFormsNextController::class, 'store26'])->name('equipment.logs.store');
  Route::get('/equipment-logs/{instrumentId}', [GeneralFormsNextController::class, 'getLogsByInstrument26'])->name('equipment.logs.by.instrument');

  Route::post('/repeat-tests/store', [GeneralFormsNextController::class, 'store27'])->name('repeat.tests.store');
  Route::get('/repeat-tests/{instrumentId}', [GeneralFormsNextController::class, 'getTestsByInstrument27'])->name('repeat.tests.by.instrument');

  Route::post('/eye-wash-log/store', [GeneralFormsNextController::class, 'store28']);
  Route::get('/eye-wash-log/fetch', [GeneralFormsNextController::class, 'fetch28']);

  Route::post('/ipa-preparation/store', [GeneralFormsNextController::class, 'store29']);
  Route::get('/ipa-preparation/fetch', [GeneralFormsNextController::class, 'fetch29']);

  Route::post('/incident-reports', [GeneralFormsNextController::class, 'store30'])->name('incident.reports.store');


  Route::post('/lis-user-requests/store', [GeneralFormsController::class, 'storeIT2'])->name('lis-user-requests.store');
  Route::post('/api/risk-occurrences', [IQCController::class, 'storeRiskOccurrence']);
  Route::get('/iqc/add-calibration', [IQCController::class, 'add_calibration'])->name('iqc.add_calibration');
  Route::get('/iqc/calibration-planner', [IQCController::class, 'calibration_planner'])->name('iqc.calibration_planner');
  Route::get('/iqc/control-list', [IQCController::class, 'control_list'])->name('iqc.control_list');
  Route::get('/iqc/add-control', [IQCController::class, 'add_control'])->name('iqc.add_control');
  Route::get('/iqc/control-planner', [IQCController::class, 'control_planner'])->name('iqc.control_planner');
  Route::get('/iqc/control-protocol', [IQCController::class, 'control_protocol'])->name('iqc.control_protocol');
  Route::get('/iqc/control-setup', [IQCController::class, 'control_setup'])->name('iqc.control_setup');
  Route::get('/risk/risk-guide', [IQCController::class, 'risk_guide'])->name('risk.risk_guide');
  Route::get('/risk/risk-log', [IQCController::class, 'risk_log'])->name('risk.risk_log');
  Route::get('/risk/risk-log-filter', [IQCController::class, 'risk_log_filter'])->name('risk.risk_log.filter');
  Route::get('/risk/risk-report', [IQCController::class, 'risk_report'])->name('risk.risk_report');
  Route::post('/risk-reports/update', [IQCController::class, 'update'])->name('risk-reports.update');

  Route::post('/eqas/store-published-results', [EqasController::class, 'store_published_results'])->name('eqas.store_pub_res');

  Route::post('/risk-reports/new-treatment', [IQCController::class, 'createNewTreatment'])->name('risk.new-treatment');
  Route::get('/risk-reports/{risk}', [IQCController::class, 'shows'])->name('risk-reports.show');
  // routes/web.php or routes/api.php
  Route::post('/risk-reports/{id}/freeze', [IQCController::class, 'freezeTreatment']);
  // routes/api.php
  Route::get('/api/risk-reports/{id}', [IQCController::class, 'show']);
  Route::post('/risk-reports/occurrences', [IQCController::class, 'storeRiskOccurrence']);
  Route::post('/api/risk-reports/{id}/new-treatment', [IQCController::class, 'createNewTreatmentVersion']);

  Route::post('/risk-report', [IQCController::class, 'riskReportStore'])->name('risk-report.store');

  Route::get('/settings', [DocumentController::class, 'settings'])->name('document.settings');
  Route::post('/save/qualityIndicators', [DocumentController::class, 'save_qualityIndicators'])->name('save.qualityIndicators');
  Route::post('/employee/store', [DocumentController::class, 'employee_store']);
  Route::post('/dropdown/add', [DocumentController::class, 'addOption']);
  Route::post('/dropdown/remove', [DocumentController::class, 'removeOption']);
  Route::post('/location/add', [DocumentController::class, 'addLocationOption']);
  Route::post('/location/remove', [DocumentController::class, 'removeLocationOption']);


  // For fetching employee data
  Route::get('/employees/{id}/edit', [DocumentController::class, 'edit'])->name('employees.edit');

  // For updating employee
  Route::put('/employees/{id}', [DocumentController::class, 'updateEmp'])->name('employees.update');


  Route::post('/drops/add', [DocumentController::class, 'addRiskOption']);
  Route::post('/drops/remove', [DocumentController::class, 'removeRiskOption']);

  Route::post('/submit-eqa-data', [DocumentController::class, 'EQAS_store']);
  Route::post('/submit-ilc-data', [DocumentController::class, 'ilc_store']);


  Route::post('/department/add', [DocumentController::class, 'addDep']);
  Route::post('/department/remove', [DocumentController::class, 'removeDep']);
  Route::post('/machine/add', [DocumentController::class, 'addMachine']);
  Route::post('/machine/remove', [DocumentController::class, 'removeMachine']);

  Route::post('/location/add/calib', [DocumentController::class, 'addLocationOptionCalib']);
  Route::post('/location/remove/calib', [DocumentController::class, 'removeLocationOptionCalib']);

  Route::post('/department/add/calib', [DocumentController::class, 'addDepCalib']);
  Route::post('/department/remove/calib', [DocumentController::class, 'removeDepCalib']);

  Route::post('/store/controlSetup', [DocumentController::class, 'storeControlSetUp'])->name('store.controlSetup');
  Route::post('/store/calibSetup', [DocumentController::class, 'storeCalibSetUp'])->name('store.calibSetup');
  Route::get('/get-lab-details', [IQCController::class, 'getLabDetails']);
  Route::get('/get-lab-dropdown-data', [IQCController::class, 'getLabDropdownData']);

  Route::get('/audit-findings/{id}', [AuditController::class, 'getAuditFindings']);

  // Route::get('/departments77', [DocumentController::class, 'index'])->name('departments.index77');
  Route::post('/department/add77', [DocumentController::class, 'addDepartment'])->name('departments.add77');
  Route::post('/department/remove77', [DocumentController::class, 'removeDepartment'])->name('departments.remove77');
  Route::post('/department/submit77', [DocumentController::class, 'submitForm'])->name('departments.submit77');


  Route::post('/location/add77', [DocumentController::class, 'addLocation'])->name('location.add77');
  // Route::post('/location/add', [LocationController::class, 'addLocation'])->name('location.add');
  Route::post('/location/remove77', [DocumentController::class, 'removeLocation'])->name('location.remove77');



  Route::get('/lead/data', [LeadController::class, 'getReports'])->name('lead.data');
  Route::get('/leadtagging/data', [LeadTaggingController::class, 'getReports'])->name('leadtagging.data');
  Route::get('/lead/create', [LeadController::class, 'create'])->name('lead.create');
  Route::get('/lead/view/{id}', [LeadController::class, 'view'])->name('lead.view');
  Route::get('/lead/edit/{id}', [LeadController::class, 'edit'])->name('lead.edit');
  Route::post('/lead/update/{id}', [LeadController::class, 'update'])->name('lead.update');
  Route::get('/lead/marketing', [LeadController::class, 'marketing'])->name('lead.marketing');
  Route::get('/lead/forecast', [LeadController::class, 'forecast'])->name('lead.forecast');
  Route::get('/lead/relationship', [LeadController::class, 'relationship'])->name('lead.relationship');
  Route::get('/lead/quotes', [LeadController::class, 'quotes'])->name('lead.quotes');
  Route::get('/lead/profitability', [LeadController::class, 'profitability'])->name('lead.profitability');
  Route::get('/lead/price-book', [LeadController::class, 'pricebook'])->name('lead.pricebook');
  Route::get('/lead/notes', [LeadController::class, 'notes'])->name('lead.notes');
  Route::get('/lead/activity', [LeadController::class, 'my_activity'])->name('lead.notes');
  Route::get('/lead/my-expenses', [LeadController::class, 'my_expenses'])->name('lead.notes');
  Route::get('/lead/my-dcr', [LeadController::class, 'my_dcr'])->name('lead.dcr');
  Route::get('/lead/my-approvals', [LeadController::class, 'my_approvals'])->name('lead.my_expenses');
  Route::get('/lead/documents', [LeadController::class, 'documents'])->name('lead.documents');
  Route::get('/lead/my-tasks', [LeadController::class, 'my_tasks'])->name('lead.tasks');
  Route::get('/my-accounts', [LeadController::class, 'my_accounts'])->name('account.index');
  Route::get('/my-contacts', [LeadController::class, 'my_contacts'])->name('contact.index');
  // Route::get('/lead/marketing', [LeadController::class, 'edit'])->name('lead.edit');


  Route::post('/lead/businessfinfoupdate/{id}', [LeadController::class, 'businessfinfoupdate'])->name('lead.businessfinfoupdate');
  Route::post('/lead/BusinessInteligence/{id}', [LeadController::class, 'BusinessInteligence'])->name('lead.BusinessInteligence');
  Route::post('/lead/remark/{id}', [LeadController::class, 'remark'])->name('lead.remark');
  Route::delete('/lead/delete/{id}', [LeadController::class, 'delete'])->name('lead.delete');
  Route::post('/lead/add_contacts/{lead_id}', [LeadController::class, 'addContactDetails'])->name('lead.add.contacts');
  Route::delete('/contact_delete/{id}', [LeadController::class, 'contactDestroy'])->name('lead.contaact_delete');
  Route::post('/lead/update_contacts', [LeadController::class, 'updateContactDetails'])->name('lead.update.contact');

  Route::get('/lead-tagging', [LeadTaggingController::class, 'index'])->name('lead_tagging.index');
  Route::get('/lead/example-company', [LeadTaggingController::class, 'example_company'])->name('lead_tagging.ex');

  Route::get('/leadprofiles', [LeadProfileController::class, 'index'])->name('lead.profile');
  Route::get('/leadprofiles/data', [LeadProfileController::class, 'getProfiles'])->name('lead.getprofile');
  Route::get('/leads-profile', [LeadProfileController::class, 'create'])->name('lead.profile.create');
  Route::post('/lead-profile-store', [LeadProfileController::class, 'store'])->name('lead.profile.store');
  Route::get('/lead-profile-edit/{id}', [LeadProfileController::class, 'edit'])->name('lead.profile.edit');
  Route::get('/lead-profile-view/{id}', [LeadProfileController::class, 'view'])->name('lead.profile.view');
  Route::post('/lead-profile-update/{id}', [LeadProfileController::class, 'update'])->name('lead.profile.update');
  Route::delete('/lead/{id}', [LeadProfileController::class, 'destroy'])->name('lead.destroy');

  Route::post('/lead/{id}/assign_user', [LeadTaggingController::class, 'leadTagging'])->name('leads.assign_user');

  Route::get('/lead-opportunity', [OpportunityController::class, 'index'])->name('opportunity.index');
  Route::get('/lead-opportunity/data', [OpportunityController::class, 'getReports'])->name('opportunity.data');
  Route::post('savecalllogs', [OpportunityController::class, 'saveCallLogs'])->name('savecalllog');
  Route::post('changestatus/{id}', [OpportunityController::class, 'ChangeStatus'])->name('change_status');

  Route::get('/lead-business', [BusinessController::class, 'index'])->name('business.index');
  Route::get('/lead-business/data', [BusinessController::class, 'getReports'])->name('business.data');
  Route::get('/lead-statistics/{id}}', [BusinessController::class, 'businessStatisctics'])->name('lead.business_statistics');

  Route::get('/salescall', [SalesCallController::class, 'index'])->name('salescall.index');
  Route::get('/salescall/calllog', [SalesCallController::class, 'getCalllogs'])->name('salescall.calllog');
  Route::get('/salescall/data', [SalesCallController::class, 'getReports'])->name('salescall.data');
  Route::post('assign_day_plan', [SalesCallController::class, 'assignUsers'])->name('salescall.assign_users');

  Route::get('/sales_headquarters', action: [SalesHeadQuarterController::class, 'index'])->name('sales_headquarters.index');
  Route::get('/sales_headquarters/data', [SalesHeadQuarterController::class, 'getReports'])->name('sales_headquarters.data');
  Route::post('/sales_headquarters/edit/{id}', action: [SalesHeadQuarterController::class, 'edit'])->name('sales_headquarters.edit');

  Route::post('/sales_headquarters/save', action: [SalesHeadQuarterController::class, 'save'])->name('sales_headquarters.save');
  Route::post('/sales_headquarters/update/{id}', action: [SalesHeadQuarterController::class, 'update'])->name('sales_headquarters.update');
  Route::delete('/sales_headquarters/{id}', [SalesHeadQuarterController::class, 'destroy'])->name('sales_headquarters.destroy');



  // My Data Routes
  Route::get('/my-tasks', [MyDataController::class, 'my_tasks'])->name('mydata.my_tasks');
  Route::get('/my-calender', [MyDataController::class, 'my_calender'])->name('mydata.my_calender');
  Route::get('/my-tourplan', [MyDataController::class, 'my_tourplan'])->name('mydata.my_tourplan');
  Route::get('/my-travel-expenses', [MyDataController::class, 'my_travel_expenses'])->name('mydata.my_travel_expenses');
  Route::get('/my-sales', [MyDataController::class, 'my_sales'])->name('mydata.my_sales');
  Route::get('/marketing', [MyDataController::class, 'marketing'])->name('mydata.marketing');
  Route::get('/forecast', [MyDataController::class, 'forecast'])->name('mydata.forecast');
  Route::get('/broadcast', [MyDataController::class, 'broadcast'])->name('mydata.broadcast');
  Route::get('/my-messages', [MyDataController::class, 'my_messages'])->name('mydata.my_messages');
  Route::get('/my-team', [MyDataController::class, 'my_team'])->name('mydata.my_team');
  Route::get('/my-dcr', [MyDataController::class, 'my_dcr'])->name('mydata.my_dcr');
  Route::get('/my-dashboard', [MyDataController::class, 'my_dashboard'])->name('mydata.dashboard');
  Route::get('/my-approvals', [MyDataController::class, 'my_approvals'])->name('mydata.my_approvals');
  Route::get('/my-global-calander', [MyDataController::class, 'my_global_calander'])->name('mydata.globalcalendar');
  Route::get('/my-ageing-receivables', [MyDataController::class, 'my_ageing_receivables'])->name('mydata.my_ageing_receivables');


  Route::get('/role/{id}', [RoleController::class, 'show'])->name('role.show');
  Route::post('/lead/store', [LeadController::class, 'store'])->name('lead.save');
  Route::get('/admin/dashboard', SearchReports::class)->name('admin');
  Route::get('/reportlist', action: SearchReports::class)->name('reportlist');
  // Route::get('/business_info', action: BusinessInfo::class)->name('business_info');
  // Route::get('/business_info', action: BusinessInfo::class)->name('business_info');
  Route::get('/contact_details', action: ContactDetails::class)->name('contact_details');
  Route::get('/business_intelligence', action: BusinessIntelligence::class)->name('business_intelligence');
  Route::get('/business_info', action: Remarks::class)->name('business_info');
  Route::get('/edit_business_info/{id}', action: EditBusinessInfo::class)->name('business.info.edit');
  Route::get('/view_business_info/{id}', action: ViewLeadRecord::class)->name('business.info.view');
  // Route::get('/sales_headquarter', action: SalesHeadQuarters::class)->name('sales_headquarters');


  //Sales Funnel
  Route::get('/sales_funnel', action: SalesFunnel::class)->name('sales_funnel');
  Route::get('/business_statistics/{selectedId}', action: BusinessStatistics::class)->name('business_statistics');


  // sales Profile
  Route::get('/profile', [SalesProfileController::class, 'index'])->name('profile.index');
  Route::get('/crate-profile', [SalesProfileController::class, 'create'])->name('profile.create');
  Route::post('/store-profile', [SalesProfileController::class, 'store'])->name('profile.store');
  // In routes/web.php
  Route::get('/get-reported-roles/{role}', [SalesProfileController::class, 'getReportedRoles'])->name('getReportedRoles');



  Route::get('/sales_profile', SalesProfile::class)->name('sales_profile');
  Route::get('/lead_tagging', LeadTagging::class)->name('lead_tagging');
  Route::get('/opportunity', Opportunity::class)->name('opportunity');
  Route::get('/business', BusinessTab::class)->name('business');
  Route::get('/sales_call', SalesCallTab::class)->name('sales_call');
  Route::get('/analytics', AnalyticsTab::class)->name('analytics');
  Route::get('/call-logs', SalesCallLog::class)->name('call-log');

  Route::get('/profile-example', ProfileExample::class)->name('profile-example');
  Route::get('/users', Users::class)->name('users');
  Route::get('/login-example', LoginExample::class)->name('login-example');
  Route::get('/register-example', RegisterExample::class)->name('register-example');
  Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
  Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
  Route::get('/transactions', Transactions::class)->name('transactions');
  Route::get('/reports', Reports::class)->name('reports');
  Route::get('/reports/edit/{id}', EditReport::class)->name('reports.edit');
  Route::get('/download-test-file', [Reports::class, 'download'])->name('download.testfile');
  Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
  Route::get('/lock', Lock::class)->name('lock');
  Route::get('/buttons', Buttons::class)->name('buttons');
  Route::get('/notifications', Notifications::class)->name('notifications');
  Route::get('/forms', Forms::class)->name('forms');
  Route::get('/modals', Modals::class)->name('modals');
  Route::get('/typography', Typography::class)->name('typography');

  Route::post('/save-accessioning', [FormsController::class, 'store']);
  Route::get('/get-sample-rejections', [FormsController::class, 'getByDate']);


  Route::post('/save-sample-volume', [FormsController::class, 'storeVolumeForm']);
  Route::get('/get-sample-volume', [FormsController::class, 'fetchByDate']);
  Route::post('/save-receiving-data', [FormsController::class, 'saveReceivingData']);
  Route::get('/fetch-sample-receiving', [FormsController::class, 'fetchSampleReceiving']);

  Route::delete('/receiving-records/{id}', [FormsController::class, 'destroy'])
    ->name('receiving-records.destroy');
  Route::delete('/delete-outsourcing-record/{id}', [FormsController::class, 'destroyOutsrce'])
    ->name('outsourcing-records.destroy');

  Route::delete('delete-first-aid-record/{id}', [FormsController::class, 'deleteFirstAidRecord'])
    ->name('firstaid-records.destroy');




  Route::post('/save-outsourcing-data', [FormsController::class, 'saveOutSourcingData']);
  Route::get('/fetch-sample-outsourcing', [FormsController::class, 'fetchSampleOutsourcing']);

  Route::post('/save-first-aid-kit-log', [FormsController::class, 'saveFirstAidKitLog']);
  Route::get('/get-first-aid-kit-logs', [FormsController::class, 'getFirstAidKitLogs']);
  Route::post('/save-specimen-signatures', [FormsController::class, 'saveSpecimenSignatures']);
  Route::get('/get-specimen-logs', [FormsController::class, 'getSpecimenLogs']);


  Route::post('/save-distilledwater', [FormsController::class, 'storeDistilledWater']);
  Route::get('/get-distilledwater', [FormsController::class, 'getDistilledwater']);

  Route::get('/get-gnrl-maintenance-log', [FormsController::class, 'getMaintenanceLogGnrl']);
  Route::post('/save-gnrl-maintenance-log', [FormsController::class, 'saveMaintenanceLogGnrl']);

  Route::post('/maintenance-log/store', [FormsController::class, 'saveMaintenanceLog'])->name('maintenance-log.store');
  Route::post('/maintenance-log/fetch', [FormsController::class, 'getMaintenanceLog'])->name('maintenance-log.fetch');

  // Route::post('/fetch-centrifuge-maintenance-logs', [FormsController::class, 'fetchCentrifugeMaintenanceLogs']);
  // Route::post('/save-centrifuge-maintenance-log', [FormsController::class, 'saveCentrifugeMaintenanceLog']);
  Route::post('/document-checklist', [GeneralFormsController::class, 'documentChecklistStore']);
  Route::get('/document-checklist/{monthYear}', [GeneralFormsController::class, 'documentChecklistFetch']);

  Route::post('/form-submissions', [GeneralFormsController::class, 'sampleVolumeCheckstore']);
  Route::get('/form-submissions/{formType}/{monthYear?}', [GeneralFormsController::class, 'sampleVolumeCheckfetch']);

  Route::get('/get-centrifuge-maintenance-log', [FormsController::class, 'getCentrifugeMaintenanceLog']);
  Route::post('/save-centrifuge-maintenance-log', [FormsController::class, 'saveCentrifugeMaintenanceLog']);

  Route::get('/get-maintenance-log', [FormsController::class, 'getMaintenanceLog']);
  Route::post('/save-beckman-maintenance-log', [FormsController::class, 'storeBeckmanMaintainanceLogs']);
  Route::get('/get-beckman-maintenance-log', [FormsController::class, 'getBeckmanMaintenanceLog']);
  Route::post('/save-beckman-coulter-maintenance-log', [FormsController::class, 'storeBeckmanCoulterMaintainanceLogs']);
  Route::get('/get-beckman-coulter-maintenance-log', [FormsController::class, 'getBeckmanCoulterMaintenanceLog']);


  Route::post('/save-laura-maintenance-log', [FormsController::class, 'storeLauraMaintainanceLogs'])->name('laura.maintenancelog.save');
  Route::post('/get-laura-maintenance-log', [FormsController::class, 'getLauraMaintenanceLog'])->name('laura.maintenancelog.fetch');

  Route::post('/save-qc-log', [FormsController::class, 'storeQCLog']);
  Route::get('/get-qc-logs', [FormsController::class, 'getLogsByMonthYear']);

  Route::post('/store-urine-qc-log', [FormsController::class, 'storeUrineQcLog'])->name('urineqc.store');
  Route::post('/fetch-urine-qc-logs', [FormsController::class, 'getUrineQcLogs']);

  Route::post('/save-horiba-maintenance-log', [FormsController::class, 'storeHoribaMaintainanceLogs']);
  Route::post('/get-horiba-maintenance-log', [FormsController::class, 'getHoribaMaintenanceLog']);

  Route::post('/save-horiba-beckman-maintenance-log', [FormsController::class, 'storeHoribaBeckmanMaintainanceLogs']);
  Route::post('/get-horiba-beckman-maintenance-log', [FormsController::class, 'getHoribaBeckmanMaintenanceLog']);


  Route::post('/submit-needle-stick-injury', [FormsController::class, 'submitNeedleStickInjury'])->name('needle.stick.injury');
  Route::get('/get-vaccination-monitoring-data', [FormsController::class, 'getVaccinationMonitoringData']);
  Route::post('/submit-vaccination-monitoring-log', [FormsController::class, 'submitVaccinationMonitoringLog']);
  Route::get('/get-biomedical-waste-data', [FormsController::class, 'getBiomedicalWasteData']);
  Route::post('/submit-biomedical-waste-log', [FormsController::class, 'submitBiomedicalWasteLog']);
  Route::get('/get-accident-incident-reports', [FormsController::class, 'getReportsByMonth']);
  Route::post('/submit-accident-incident-report', [FormsController::class, 'submitAccidentIncidentReport']);

  Route::post('/form/submit', [FormsController::class, 'formStore'])->name('form.general.submit');
  Route::get('/form/{formName}', [FormsController::class, 'formShow'])->name('form.general.show');
  Route::get('/get-analyte-calibration-data', [FormsController::class, 'getAnalyteCalibrationData']);
  Route::post('/submit-analyte-calibration-log', [FormsController::class, 'submitAnalyteCalibrationLog']);
  Route::post('/save-temperature-humidity-log', [FormsController::class, 'temperature_humidityStore']);
  Route::post('/fetch-temperature-humidity-log', [FormsController::class, 'fetchTemperatureHumidityLog']);

  Route::post('/save-reagent-verification-log', [FormsController::class, 'reagentVerificationLogStore']);
  Route::post('/fetch-reagent-verification-log', [FormsController::class, 'fetchReagentVerificationLog']);
  Route::post('/reagent-logs/store', [FormsController::class, 'reagentUsageLogStore']);
  Route::post('/reagent-logs/fetch', [FormsController::class, 'fetchReagentUsageLogs']);
  Route::post('/save-retained-sample-verification', [FormsController::class, 'submitRetainedSampleForm']);
  Route::post('/fetch-retained-sample-verification', [FormsController::class, 'fetchRetainedSampleVerification']);
  Route::post('/save-report-amendment-log', [FormsController::class, 'reportAmendmentLogStore']);
  Route::post('/fetch-report-amendment-logs', [FormsController::class, 'fetchReportAmendmentData']);
  //general from form10
  Route::post('/save-personnel-validation-record', [GeneralFormsController::class, 'store10']);
  Route::get('/fetch-personnel-validation-record', [GeneralFormsController::class, 'fetch10']);

  Route::post('/save-corrective-preventive-log', [GeneralFormsController::class, 'store11']);
  Route::get('/fetch-corrective-preventive-log', [GeneralFormsController::class, 'fetch11']);
  Route::post('/save-critical-call-monitoring-log', [GeneralFormsController::class, 'storeCriticalCallLog']);
  Route::post('/fetch-critical-call-logs', [GeneralFormsController::class, 'fetchCriticalCallLogs']);
  Route::post('/save-daily-cleaning-checklist', [GeneralFormsController::class, 'store13']);
  Route::get('/fetch-daily-cleaning-checklist', [GeneralFormsController::class, 'fetch13']);
  Route::post('/fetch-daily-cleaning-checklist', [GeneralFormsController::class, 'fetchDailyCleaningChecklist']);
  Route::post('/save-calibration-protocol', [IQCController::class, 'saveCalibrationProtocol'])
    ->name('save.calibration.protocol');
  Route::post('/save-calibration-usage', [IQCController::class, 'saveCalibrationUsage'])
    ->name('save.calibration.usage');


  Route::post('/save-control-usage', [IQCController::class, 'saveControlUsage'])
    ->name('save.control.usage');






  Route::get('/documents/files/{folderId}', [DocumentController::class, 'showFiles'])->name('documents.files');
  Route::get('/documents/view/{fileId}', [DocumentController::class, 'viewFile'])->name('documents.view');
  Route::prefix('api')->group(function () {
    // Delete File
    Route::delete('/files/{fileId}', [DocumentController::class, 'destroyFile']);
    // Move File
    Route::post('/move-file/{fileId}/{newFolderId}', [DocumentController::class, 'moveFiles']);

    // Share File
    Route::post('/share-file/{fileId}', [DocumentController::class, 'shareFile']);
    Route::post('/folders', [DocumentController::class, 'store']);
    // Modify File
    Route::put('/files/{fileId}', [DocumentController::class, 'modifyFile']);

    // Lock File
    Route::post('/lock-file/{fileId}', [DocumentController::class, 'lockFile']);

    // Set Reminder
    Route::post('/set-reminder/{fileId}', [DocumentController::class, 'setReminder']);

    // Upload New Version
    Route::post('/upload-new-version/{fileId}', [DocumentController::class, 'uploadNewVersion']);
  });
  Route::post('api/folders/{folderId}/lock', [DocumentController::class, 'toggleLock']);
  Route::post('/documents/upload/{folderId}', [DocumentController::class, 'uploadFilesDrop'])->name('documents.upload');
  Route::get('/fetch-permissions', [DocumentController::class, 'fetchPermissions']);
  Route::get('api/files/{folderId}', [DocumentController::class, 'getFiles']);
  Route::get('api/folders/{parentId?}', [DocumentController::class, 'index']);

  Route::post('/save-permissions', [DocumentController::class, 'savePermissions'])->name('save.permissions');

});

Route::prefix('as')->name('as.')->group(function () {
    Route::post('/forms/submit', [AsFormController::class, 'store'])
        ->name('forms.submit');
    Route::get('/sample-volume-check/load', [AsFormController::class, 'loadSampleVolumeCheck'])
        ->name('sample-volume-check.load');
    Route::get(
        '/sample-receiving-register/load',
        [AsFormController::class, 'loadSampleReceivingRegister']
    )->name('sample-receiving-register.load');

    Route::get(
        '/sample-delivery-register/load',
        [AsFormController::class, 'loadSampleDeliveryRegister']
    )->name('sample-delivery-register.load');

    Route::post(
        '/sample-delivery-inline-update',
        [AsFormController::class, 'inlineUpdateSampleDelivery']
    )->name('sample-delivery.inline-update');


    Route::get(
        '/ice-gel-register/load',
        [AsFormController::class, 'loadIceGelRegister']
    )->name('ice-gel-register.load');

    Route::get(
        '/sample-outsource-register/load',
        [AsFormController::class, 'loadSampleOutsourceRegister']
    )->name('sample-outsource-register.load');
});

Route::prefix('be')
    ->name('be.')
    ->group(function () {

        Route::post('/forms/submit', [BEFormsController::class, 'store'])
            ->name('forms.submit');

        Route::get('/hot-plate-qc/load', [BEFormsController::class, 'loadHotPlateQc'])
            ->name('hotplateqc.load');

        Route::post('/forms/inline', [BEFormsController::class, 'inlineSave'])
            ->name('forms.inline');


        Route::get('/bsc/load', [BEFormsController::class, 'loadBioSafetyCabinet'])
            ->name('bsc.load');

        Route::get('/hot-air-oven/load', [BEFormsController::class, 'loadHotAirOven'])
            ->name('/hot-air-oven/load');


        Route::get('/incubator/load', [BEFormsController::class, 'loadIncubator'])
            ->name('/incubator/load');

        Route::get('/laf/load', [BEFormsController::class, 'loadLaminarAirFlow'])
            ->name('laf.load');

        Route::get('/autoclave/load', [BEFormsController::class, 'loadAutoclave'])
            ->name('autoclave.load');

        Route::get('/hao-maintenance/load', [BEFormsController::class, 'loadHaoMaintenance'])
            ->name('hao.maintenance.load');

        Route::get(
            '/incubator-maintenance/load',
            [BEFormsController::class, 'loadIncubatorMaintenance']
        )->name('incubator.maintenance.load');

        Route::get('/centrifuge/load', [BEFormsController::class, 'loadCentrifuge'])
            ->name('centrifuge.load');

        Route::get('/dxc/load', [BEFormsController::class, 'loadDxcForm'])
            ->name('dxc.load');

        Route::get('/dxi800/load', [BEFormsController::class, 'loadDxiMaintenance'])
            ->name('dxi800.load');

        Route::get('/st200/load', [BEFormsController::class, 'loadSt200'])
            ->name('st200.load');

        Route::get('/h550/load', [BEFormsController::class, 'loadH550'])
            ->name('h550.load');

        Route::get('/d10/load', [BEFormsController::class, 'loadD10'])
            ->name('d10.load');

        Route::get(
            '/atp/load',
            [BEFormsController::class, 'loadAutomaticTissueProcessor']
        )->name('atp.load');
    });

