@extends('layouts.base')
@section('content')
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Risk Register</title>
		<!-- FullCalendar CSS (optional) -->
		<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

		<!-- FullCalendar JS -->
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
		<!-- Bootstrap 5 CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Bootstrap 5 JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	</head>
	<style>
		.stock-planner-table {
			width: 100% !important;
			border-collapse: collapse !important;
			margin-top: 20px !important;
		}

		.stock-planner-table th,
		.stock-planner-table td {
			padding: 10px !important;
			text-align: left !important;
			border: 1px solid #565454 !important;
		}

		.stock-planner-table th {
			background-color: #007BFF !important;
			color: white !important;
			text-align: center !important;
			padding: 10px !important;
		}

		.stock-planner-table input {
			width: 50px;
		}

		.panel1 {

			overflow: auto;
			top: 50px;
			position: fixed;
			/* top: 0; */
			right: -100%;
			width: calc(100% - 120px);
			height: 90%;
			background: #f8f9fa;
			box-shadow: -2px 0px 5px rgba(0, 0, 0, 0.3);
			padding: 0 20px;
			transition: 0.5s ease;
		}

		.center-text2 {
			text-align: center;
		}

		.panel1.open {
			right: 0;
			bottom: 0;
			margin: 20px;
			z-index: 1000;
		}

		.closeBtn1 {
			/* overflow: auto; */
			top: 52px;
			position: fixed;
			/* top: 0; */
			right: -100%;
			width: 30px;
			height: 30px;
			background: #ff2222;
			padding: 5px;
			transition: 0.5s ease;
			border-radius: 50% 0 0 50%;
			display: flex;
			align-items: center;
			justify-content: space-evenly;
			color: #f8f9fa;
			font-weight: 700;
			cursor: pointer;
		}

		.closeBtn1.opened {
			right: calc(100% - 100px);
			top: 100px;
			z-index: 1000;
		}

		.form-container-sub {
			margin-top: 1rem;
			/* background: #fff; */
			padding: 20px 30px;
			border-radius: 8px;
			box-shadow: 0 4px 11px 11px rgba(0, 0, 0, 0.1);
			width: 99%;
			margin-bottom: 1rem;
		}

		.form-container-sub h2 {
			margin-bottom: 20px;
			color: #333;
			text-align: center;
		}

		.form-container-sub form {
			display: flex;
			/* flex-direction: column; */
		}

		.form-container-sub label {
			margin-bottom: 5px;
			/* color: #555; */
			font-weight: 700;
			width: 100%;
			font-size: 14px;
		}

		.form-container-sub input,
		.form-container-sub select,
		.form-container-sub textarea {
			margin-bottom: 15px;
			padding: 10px;
			font-size: 14px;
			border: 1px solid #ccc;
			border-radius: 4px;
			outline: none;
			transition: all 0.3s ease;
			width: 100%;
		}

		.form-container-sub input:focus,
		.form-container-sub select:focus {
			border-color: #007bff;
			box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
		}

		.form-container-sub button {
			padding: 10px 15px;
			font-size: 16px;
			color: #fff;
			margin: 1rem 0;
			background-color: #007bff;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		.form-container-sub button:hover {
			background-color: #0056b3;
		}

		.form-container-sub input[type="file"] {
			padding: 5px;
			width: 100%;
		}

		.panel2 {
			position: fixed;
			top: 0;
			right: -100%;
			width: 90%;
			height: 100vh;
			background: white;
			z-index: 1000;
			transition: all 0.5s ease;
			overflow-y: auto;
			padding: 20px;
			box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
			/* Add padding-top to account for close button */
			padding-top: 70px;
		}

		.panel2.open {
			right: 0;
		}

		.closeBtn2 {
			/* position: fixed;
																																																																																																																																																																																																																																																																																																																																																																																		top: 80px;
																																																																																																																																																																																																																																																																																																																																																																																		z-index: 1001;
																																																																																																																																																																																																																																																																																																																																																																																		font-size: 20px;
																																																																																																																																																																																																																																																																																																																																																																																		color: white;
																																																																																																																																																																																																																																																																																																																																																																																		background: red;
																																																																																																																																																																																																																																																																																																																																																																																		width: 30px;
																																																																																																																																																																																																																																																																																																																																																																																		height: 30px;
																																																																																																																																																																																																																																																																																																																																																																																		border-radius: 50%;
																																																																																																																																																																																																																																																																																																																																																																																		display: flex;
																																																																																																																																																																																																																																																																																																																																																																																		align-items: center;
																																																																																																																																																																																																																																																																																																																																																																																		justify-content: center;
																																																																																																																																																																																																																																																																																																																																																																																		cursor: pointer;
																																																																																																																																																																																																																																																																																																																																																																																		opacity: 0;
																																																																																																																																																																																																																																																																																																																																																																																		transition: all 0.3s ease;
																																																																																																																																																																																																																																																																																																																																																																																		border: none;
																																																																																																																																																																																																																																																																																																																																																																																		outline: none;
																																																																																																																																																																																																																																																																																																																																																																																		transform: translateZ(0); */

			top: 52px;
			position: fixed;
			/* top: 0; */
			right: -100%;
			width: 30px;
			height: 30px;
			background: #ff2222;
			padding: 5px;
			transition: 0.5s ease;
			border-radius: 50% 0 0 50%;
			display: flex;
			align-items: center;
			justify-content: space-evenly;
			color: #f8f9fa;
			font-weight: 700;
			cursor: pointer;

		}

		.closeBtn2.opened {
			/* opacity: 1;
																																																																																																																																																																																																																																																																																																																																																										right: calc(20% + 20px); */
			right: calc(96% - 100px);
			top: 100px;
			z-index: 1000;
		}

		/* Alternative approach - absolute positioning within modal */
		.panel2-alternative {
			position: fixed;
			top: 0;
			right: -100%;
			width: 80%;
			height: 100vh;
			background: white;
			z-index: 1000;
			transition: all 0.5s ease;
			overflow-y: auto;
			box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
		}

		.panel2-alternative .closeBtn2-alternative {
			position: absolute;
			top: 20px;
			right: 20px;
			z-index: 1001;
			font-size: 20px;
			color: white;
			background: red;
			width: 30px;
			height: 30px;
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			border: none;
			outline: none;
		}

		.panel2-content {
			padding: 20px;
			padding-top: 70px;
			/* Space for close button */
		}

		@media (max-width: 768px) {
			.panel2 {
				width: 100%;
				padding-top: 70px;
			}

			.closeBtn2.opened {
				right: 20px;
			}

			.panel2-alternative {
				width: 100%;
			}
		}

		/* Additional scrolling improvements */
		.panel2::-webkit-scrollbar {
			width: 8px;
		}

		.panel2::-webkit-scrollbar-track {
			background: #f1f1f1;
		}

		.panel2::-webkit-scrollbar-thumb {
			background: #888;
			border-radius: 4px;
		}

		.panel2::-webkit-scrollbar-thumb:hover {
			background: #555;
		}

		/* Ensure form elements are properly styled */
		.form-container-sub {
			margin-bottom: 20px;
		}

		.form-container-sub label {
			display: block;
			margin-bottom: 5px;
			font-weight: 500;
		}

		.form-container-sub input,
		.form-container-sub select,
		.form-container-sub textarea {
			width: 100%;
			padding: 8px 12px;
			border: 1px solid #ddd;
			border-radius: 4px;
			margin-bottom: 15px;
			font-size: 14px;
		}

		.form-container-sub textarea {
			min-height: 80px;
			resize: vertical;
		}
	</style>

	<body>
		<div class="main ">
			<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
				<div style="font-size: 20px;">Risk Register</div>
				<div style="font-size: 20px;">
				</div>
				<!-- <input type="button" class="btn btn-warning" onclick="createDoc()" value='Create'> -->
			</div>

			<div class="table-responsive" style="padding-right: 1rem;">
				<table class="stock-planner-table">
					<thead>
						<tr>
							<th>Risk ID</th>
							<th>Risk Name</th>
							<th>Risk Category</th>
							<th>Risk Department</th>
							<th>Residual Risk Rating</th>
							<th>Residual Risk Priority</th>
							<th>Risk Mitigation Strategy</th>

						</tr>
					</thead>
					<tbody>
						@foreach ($data as $item)
							<tr>
								<td title="AML-027">{{$item->id}}</td>
								<td>
									<a onclick="openDocument1(this)" data-id="{{ $item->id }}"
										data-name="{{ $item->risk_name }}" data-department="{{ $item->department }}"
										data-category="{{ $item->risk_category }}" data-description="{{ $item->description }}"
										data-severity="{{ $item->severity }}" data-likelihood="{{ $item->likelihood }}"
										data-risk_rating="{{ $item->risk_rating }}"
										data-risk_priority="{{ $item->risk_priority }}"
										data-notes_severity="{{ $item->notes_severity }}"
										data-notes_likelihood="{{ $item->notes_likelihood }}" style="cursor: pointer;">
										{{ $item->risk_name }}
									</a>
								</td>
								<td>{{ $item->risk_category }}</td>
								<td>{{$item->department}}</td>
								<td class="center-text2">{{ $item->residual_risk_rating ?? '--' }}</td>
								<td>{{ $item->residual_risk_priority ?? '--' }}</td>
								<td>{{$item->rms_id}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>



			<div id="documentClose1" class="closeBtn1" onclick="documentClose1()">
				X
			</div>
			<div id="documentOpen1" class="panel1">
				<div style="position: relative;">
					<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4"
						style="margin-top: 0.6rem;">
						<div style="font-size: 20px;" id='documentPanel1Heading'></div>
					</div>
				</div>

				<form id="riskForm" method="POST">
					@csrf

					<input type="hidden" name="risk_id" id="modalRiskId">

					<!-- Risk Identification Section -->
					<div class="form-container-sub">
						<label style="background: #049f3b;padding: 10px;border-radius: 10px;color: white;">
							Risk Identification
						</label>
						<div class="row">
							<div class="col-md-3">
								<label>Risk ID</label>
								<input type="text" name="risk_id" id="modalRiskIdDisplay" disabled>
							</div>
							<div class="col-md-3">
								<label>Department</label>
								<select name="department" id="modalDepartment" class="form-control">
									<option value="">-- Select Department --</option>
									@foreach ($departments as $item)
										<option value="{{ $item->name }}">{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-3">
								<label>Risk Category</label>
								<select name="risk_category" id="modalCategory">
									<option value="">-- Select Category --</option>
									@foreach ($category as $item)
										<option value="{{ $item->name }}">{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-6">
								<label for="name">Risk Name</label>
								<input type="text" name="name" id="modalRiskName">
							</div>
							<div class="col-md-12">
								<label for="email">Description</label>
								<textarea name="description" id="modalDescription"></textarea>
							</div>
						</div>
					</div>

					<!-- Risk Analysis Section -->
					<div class="form-container-sub">
						<label style="background: #049f3b;padding: 10px;border-radius: 10px;color: white;">
							Inherent Risk Analysis and Prioritization
						</label>
						<div class="row">
							<div class="col-md-3">
								<label>Inherent Severity</label>
								<select name="severity" id="severity" onchange="calculateRiskRating()">
									<option value="">-- Select Severity --</option>
									@foreach ($severity as $item)
										<option value="{{ $item->name }}" data-value="{{ $item->value }}">{{ $item->name }}
										</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-3">
								<label>Inherent Likelihood</label>
								<select name="likelihood" id="likelihood" onchange="calculateRiskRating()">
									<option value="">-- Select Likelihood --</option>
									@foreach ($likehood as $item)
										<option value="{{ $item->name }}" data-value="{{ $item->value }}">{{ $item->name }}
										</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-3">
								<label>Inherent Risk Rating</label>
								<input type="number" name="risk_rating" id="risk_rating" readonly
									style="background-color: #f8f9fa;">
							</div>
							<div class="col-md-3">
								<label>Inherent Risk Priority</label>
								<input type="text" name="risk_priority" id="risk_priority" readonly
									style="background-color: #f8f9fa;">
							</div>
							<div class="col-md-6">
								<label>Notes On Severity</label>
								<textarea name="notes_severity" id="notes_severity"></textarea>
							</div>
							<div class="col-md-6">
								<label>Notes On Likelihood</label>
								<textarea name="notes_likelihood" id="notes_likelihood"></textarea>
							</div>
						</div>
					</div>

					<!-- Risk Treatment Section -->
					<div class="form-container-sub">
						<label style="background: #049f3b;padding: 10px;border-radius: 10px;color: white;">
							Risk Mitigation
						</label>
						<div id="riskMitigationSection">
							<!-- Initial editable form -->
							<div class="treatment-section">
								<div class="row">
									<div class="col-md-3">
										<label>Sq.No</label>
										<input type="number" name="risk_finish_sequence" class="form-control">
									</div>
									<div class="col-md-3">
										<label>Start Date</label>
										<input type="date" name="start_date" class="form-control">
									</div>
									<div class="col-md-3">
										<label>End Date</label>
										<input type="date" name="end_date" class="form-control">
									</div>
									<div class="col-md-3">
										<label>Target Date</label>
										<input type="date" name="target_date" class="form-control">
									</div>

									<div class="col-md-3">
										<label>Control Measure Status</label>
										<select name="control_status" class="form-control">
											<option value="">-- Select --</option>
											<option value="Yet To Commence">Yet To Commence</option>
											<option value="In Progress">In Progress</option>
											<option value="Completed">Completed</option>
										</select>
									</div>
									<div class="col-md-3">
										<label>Progress (%)</label>
										<select name="progress" class="form-control">
											<option value="">-- Select --</option>
											@for ($i = 0; $i <= 100; $i += 5)
												<option value="{{ $i }}">{{ $i }}%</option>
											@endfor
										</select>
									</div>
									<div class="col-md-3">
										<label>Responsible</label>
										<input type="text" name="responsible" class="form-control">
									</div>
									<div class="col-md-3">
										<label>Type Of Control Measure</label>
										<select name="control_measure_type" class="form-control">
											<option value="">-- Select --</option>
											<option value="Process">Process</option>
											<option value="Policy">Policy</option>
											<option value="Procedure">Procedure</option>
											<option value="Asset">Asset</option>
										</select>
									</div>
									<div class="col-md-12">
										<label>Action</label>
										<textarea name="action" class="form-control"></textarea>
									</div>
									<div class="col-md-3">
										<label>Residual Severity</label>
										<select name="severity" id="severity" onchange="calculateRiskRating()">
											<option value="">-- Select Severity --</option>
											@foreach ($severity as $item)
												<option value="{{ $item->name }}" data-value="{{ $item->value }}">
													{{ $item->name }}
												</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-3">
										<label>Residual Likelihood</label>
										<select name="likelihood" id="likelihood" onchange="calculateRiskRating()">
											<option value="">-- Select Likelihood --</option>
											@foreach ($likehood as $item)
												<option value="{{ $item->name }}" data-value="{{ $item->value }}">
													{{ $item->name }}
												</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-3">
										<label>Residual Risk Rating</label>
										<input type="number" name="risk_rating" id="risk_rating" readonly
											style="background-color: #f8f9fa;">
									</div>
									<div class="col-md-3">
										<label>Residual Risk Priority</label>
										<input type="text" name="risk_priority" id="risk_priority" readonly
											style="background-color: #f8f9fa;">
									</div>
									<div class="col-md-6">
										<label>Notes On Severity</label>
										<textarea name="notes_severity" id="notes_severity"></textarea>
									</div>
									<div class="col-md-6">
										<label>Notes On Likelihood</label>
										<textarea name="notes_likelihood" id="notes_likelihood"></textarea>
									</div>

									<div class="col-md-12">
										<div class="d-flex justify-content-end">
											<button type="button" class="btn btn-primary"
												style="width: 20%; font-size: small; margin-left:auto;"
												onclick="openDocument2()">
												Record Risk Occurrence
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary" style="width: 100%; font-size: large;">
						Submit
					</button>
				</form>
				<br>
			</div>

			<!-- Document 2 Panel (Risk Occurrence) -->
			<div id="documentClose2" class="closeBtn2" onclick="documentClose2()">X</div>
			<div id="documentOpen2" class="panel2">
				<div style="position: relative;">
					<div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mt-5"
						style="margin-top: 0.6rem;">
						<div style="font-size: 20px;">Record Risk Occurrence</div>
					</div>
				</div>

				<form id="riskOccurrenceForm" method="POST">
					@csrf
					<input type="hidden" name="risk_id" id="modalRiskId2">

					<div class="table-responsive">
						<table class="table table-bordered" id="receiving">
							<thead class="table-light">
								<tr>
									<th style="width: 6%;">S.no</th>
									<th style="width: 15%;">Occurrence Date</th>
									<th style="width: 10%;">Mitigation Effective</th>
									<th style="width: 20%;">Review Strategy</th>
									<th style="width: 30%;">Remark</th>
									<th style="width: 10%;">Actions</th>
								</tr>
							</thead>
							<tbody id="tableBody1">
								<!-- <tr class="receiving-row">																																																																																																			<td>1</td>
																																																																																																																																																								<td><input type="date" name="occurrences[0][date]" class="form-control form-control-sm"
																																																																																																																																																										required></td>
																																																																																																																																																								<td>
																																																																																																																																																									<select class="form-select form-select-sm"
																																																																																																																																																										name="occurrences[0][mitigation_effective]" required>
																																																																																																																																																										<option value="">Select</option>
																																																																																																																																																										<option value="Yes">Yes</option>
																																																																																																																																																										<option value="No">No</option>
																																																																																																																																																									</select>
																																																																																																																																																								</td>
																																																																																																																																																								<td>
																																																																																																																																																									<select class="form-select form-select-sm" name="occurrences[0][review_strategy]"
																																																																																																																																																										required>
																																																																																																																																																										<option value="">Select</option>
																																																																																																																																																										<option value="Yes">Yes</option>
																																																																																																																																																										<option value="No">No</option>
																																																																																																																																																									</select>
																																																																																																																																																								</td>
																																																																																																																																																								<td><textarea name="occurrences[0][remark]"
																																																																																																																																																										class="form-control form-control-sm"></textarea></td>
																																																																																																																																																								<td><button type="button" class="btn btn-sm btn-danger"
																																																																																																																																																										onclick="removeReceivingRow(this)">×</button></td>
																																																																																																																																																							</tr> -->
							</tbody>
						</table>
						<div class="btn btn-primary m-1" onclick="addReceivingRow()">+ Add Row</div>
					</div>
					<button type="submit" class="btn btn-primary" style="width: 100%; font-size: large;">
						Submit
					</button>
				</form>
			</div>
			<!-- </div> -->
	</body>

	<script>
		const severityOptions = @json($severity->map(function ($item) {
			return ['name' => $item->name, 'value' => $item->value];
		}));
		const likelihoodOptions = @json($likehood->map(function ($item) {
			return ['name' => $item->name, 'value' => $item->value];
		}));

		let currentRiskId = null;
		let currentRiskData = null;
		let isMitigationFrozen = false;
		let rowCount = 0;

		function openDocument1(el) {
			const riskId = el.getAttribute('data-id');
			currentRiskId = riskId;
			isMitigationFrozen = false; // Reset frozen state when opening new risk

			// Show modal and populate basic fields
			document.getElementById('documentClose1').classList.add('opened');
			document.getElementById('documentOpen1').classList.add('open');
			document.getElementById('documentPanel1Heading').innerText = el.getAttribute('data-name');

			// Populate all fields from data attributes
			document.getElementById('modalRiskId').value = riskId;
			document.getElementById('modalRiskId2').value = riskId;
			document.getElementById('modalRiskIdDisplay').value = riskId;
			document.getElementById('modalRiskName').value = el.getAttribute('data-name');
			document.getElementById('modalDepartment').value = el.getAttribute('data-department');
			document.getElementById('modalCategory').value = el.getAttribute('data-category');
			document.getElementById('modalDescription').value = el.getAttribute('data-description');
			document.getElementById('severity').value = el.getAttribute('data-severity');
			document.getElementById('likelihood').value = el.getAttribute('data-likelihood');
			document.getElementById('risk_rating').value = el.getAttribute('data-risk_rating');
			document.getElementById('risk_priority').value = el.getAttribute('data-risk_priority');
			document.getElementById('notes_severity').value = el.getAttribute('data-notes_severity');
			document.getElementById('notes_likelihood').value = el.getAttribute('data-notes_likelihood');

			// Load mitigation data
			fetch(`/risk-reports/${riskId}`)
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						currentRiskData = data.data;
						console.log(currentRiskData, 'currentRiskData');
						renderMitigationSection(data.data);
					}
				});
		}
		function renderMitigationSection(data) {
			console.log('Rendering mitigation section with data:', data);
			const section = document.getElementById('riskMitigationSection');
			if (!section) {
				console.error('Risk mitigation section not found!');
				return;
			}

			// Clear the section
			section.innerHTML = '';

			const risk = data.risk || {};
			const treatments = data.treatments || [];
			const isFrozen = risk.treatment_status === 'frozen';

			console.log('Treatment status:', risk.treatment_status, 'isFrozen:', isFrozen);
			console.log('Treatments:', treatments);

			// 1. Show all frozen treatments (sorted by version descending - newest first)
			const frozenTreatments = treatments
				.filter(t => !t.is_current)
				.sort((a, b) => b.version - a.version);

			console.log('Frozen treatments:', frozenTreatments);

			frozenTreatments.forEach(treatment => {
				const div = document.createElement('div');
				div.className = 'treatment-section frozen-treatment';
				div.style.cssText = 'opacity: 0.8; pointer-events: none; border-left: 4px solid #dc3545; border-radius: 5px; padding: 15px; margin-bottom: 20px; background-color: #f8f9fa;';
				div.innerHTML = getTreatmentHtml(treatment, true, treatment.version);
				section.appendChild(div);
			});

			// 2. Show current treatment (editable if not frozen, frozen if frozen)
			const currentTreatment = treatments.find(t => t.is_current) || {};
			const currentDiv = document.createElement('div');
			currentDiv.className = 'treatment-section current-treatment';

			if (isFrozen) {
				currentDiv.classList.add('frozen-treatment');
				currentDiv.style.cssText = 'opacity: 0.8; pointer-events: none; border-left: 4px solid #dc3545; border-radius: 5px; padding: 15px; margin-bottom: 20px; background-color: #f8f9fa;';
				currentDiv.innerHTML = getTreatmentHtml(currentTreatment, true, 'Current');
			} else {
				currentDiv.style.cssText = 'border-left: 4px solid #28a745; border-radius: 5px; padding: 15px; margin-bottom: 20px; background-color: #ffffff;';
				currentDiv.innerHTML = getTreatmentHtml(currentTreatment, false, 'Current');
			}

			section.appendChild(currentDiv);

			// 3. Add buttons based on state
			const actionsDiv = document.createElement('div');
			actionsDiv.className = 'action-buttons mt-3 d-flex gap-2';

			if (isFrozen) {
				actionsDiv.innerHTML = `
																		<button type="button" class="btn btn-success" onclick="createNewTreatmentVersion()">
																			+ Add New Treatment Version
																		</button>
																	`;
			} else {
				actionsDiv.innerHTML = `
																		<button type="button" class="btn btn-primary" onclick="openDocument2()">
																			Record Risk Occurrence
																		</button>
																	`;
			}

			section.appendChild(actionsDiv);

			// Calculate initial ratings for all sections
			setTimeout(() => {
				calculateRiskRating('inherent');
				initializeRiskCalculations();
			}, 100);
		}

		function fetchRiskData(riskId) {
			return fetch(`/risk-reports/${riskId}`, {
				headers: {
					'Accept': 'application/json',
					'X-Requested-With': 'XMLHttpRequest'
				}
			})
				.then(response => {
					if (!response.ok) {
						return response.json().then(err => {
							throw new Error(err.message || 'Failed to fetch risk data');
						});
					}
					return response.json();
				})
				.then(data => {
					if (data.success) {
						currentRiskData = data.data;
						renderMitigationSection(data.data);
						return data;
					} else {
						throw new Error(data.message || 'Failed to load risk data');
					}
				})
				.catch(error => {
					console.error('Error loading risk data:', error);
					alert('Error loading risk data: ' + error.message);
					throw error;
				});
		}

		function populateMitigationForm(treatment) {
			const form = document.getElementById('riskMitigationSection');
			form.querySelector('[name="start_date"]').value = treatment.start_date || '';
			form.querySelector('[name="end_date"]').value = treatment.end_date || '';
			form.querySelector('[name="target_date"]').value = treatment.target_date || '';
			// form.querySelector('[name="review_date"]').value = treatment.review_date || '';
			form.querySelector('[name="control_status"]').value = treatment.control_status || '';
			form.querySelector('[name="progress"]').value = treatment.progress || '';
			form.querySelector('[name="responsible"]').value = treatment.responsible || '';
			form.querySelector('[name="control_measure_type"]').value = treatment.control_measure_type || '';
			form.querySelector('[name="action"]').value = treatment.action || '';
		}

		function freezeMitigationSection() {
			const section = document.getElementById('riskMitigationSection');
			const currentTreatment = section.querySelector('.treatment-section:not(.frozen-treatment)');

			if (currentTreatment) {
				// Freeze the current treatment
				currentTreatment.classList.add('frozen-treatment');
				currentTreatment.querySelectorAll('input, select, textarea').forEach(el => {
					el.disabled = true;
				});

				// Add "Add New Treatment" button
				const addBtnDiv = document.createElement('div');
				addBtnDiv.className = 'col-md-12 mt-3';
				addBtnDiv.innerHTML = `
																																																																																																																																				<button type="button" class="btn btn-success" onclick="createNewTreatmentVersion()">
																																																																																																																																					+ Add New Treatment Version
																																																																																																																																				</button>
																																																																																																																																			`;
				section.appendChild(addBtnDiv);

				isMitigationFrozen = true;
			}
		}
		// In your occurrence form submission:
		document.getElementById('riskOccurrenceForm').addEventListener('submit', function (e) {
			e.preventDefault();

			// Collect all occurrence data
			const occurrences = [];
			let needsReview = false;

			const rows = document.querySelectorAll('.receiving-row');

			rows.forEach((row, index) => {
				const dateInput = row.querySelector('[name*="date"]');
				const mitigationInput = row.querySelector('[name*="mitigation_effective"]');
				const reviewInput = row.querySelector('[name*="review_strategy"]');
				const remarkInput = row.querySelector('[name*="remark"]');

				if (dateInput && mitigationInput && reviewInput) {
					const reviewStrategy = reviewInput.value;

					occurrences.push({
						date: dateInput.value,
						mitigation_effective: mitigationInput.value,
						review_strategy: reviewStrategy,
						remark: remarkInput ? remarkInput.value : ''
					});

					// Check if any occurrence needs review
					if (reviewStrategy === 'Yes') {
						needsReview = true;
					}
				}
			});

			if (occurrences.length === 0) {
				alert('Please add at least one occurrence record.');
				return;
			}

			const data = {
				risk_id: document.getElementById('modalRiskId2').value,
				occurrences: occurrences,
				freeze_treatment: needsReview
			};

			console.log('Submitting occurrence data:', data);

			const submitBtn = this.querySelector('button[type="submit"]');
			const originalText = submitBtn.innerHTML;
			submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span> Saving...';
			submitBtn.disabled = true;

			fetch('/risk-reports/occurrences', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'Accept': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				body: JSON.stringify(data)
			})
				.then(response => {
					if (!response.ok) {
						return response.json().then(err => {
							throw new Error(err.message || 'Server error');
						});
					}
					return response.json();
				})
				.then(data => {
					if (data.success) {
						alert('Occurrence recorded successfully!');

						// Clear the form
						document.getElementById('tableBody1').innerHTML = '';

						// Close document 2
						documentClose2();

						// If review is needed, the treatment will be frozen - refresh the data
						if (data.needs_review || needsReview) {
							console.log('Treatment needs to be frozen, refreshing data...');
							return fetchRiskData(currentRiskId);
						}
					} else {
						throw new Error(data.message || 'Failed to record occurrences');
					}
				})
				.catch(error => {
					console.error('Error:', error);
					alert('Error recording occurrence: ' + error.message);
				})
				.finally(() => {
					submitBtn.innerHTML = originalText;
					submitBtn.disabled = false;
				});
		});

		// In your occurrence form submission:

		function populateRiskForm(data) {
			const risk = data.risk;

			// Basic info
			document.getElementById('modalRiskId').value = risk.id;
			document.getElementById('modalRiskIdDisplay').value = risk.id;
			document.getElementById('modalRiskId2').value = risk.id;
			document.getElementById('modalRiskName').value = risk.risk_name;
			document.getElementById('modalDepartment').value = risk.department;
			document.getElementById('modalCategory').value = risk.risk_category;
			document.getElementById('modalDescription').value = risk.description;
			document.getElementById('documentPanel1Heading').innerText = risk.risk_name;

			// Risk analysis
			document.getElementById('severity').value = risk.severity;
			document.getElementById('likelihood').value = risk.likelihood;
			document.getElementById('risk_rating').value = risk.risk_rating;
			document.getElementById('risk_priority').value = risk.risk_priority;
			document.getElementById('notes_severity').value = risk.notes_severity;
			document.getElementById('notes_likelihood').value = risk.notes_likelihood;

			renderRiskMitigationSection(risk);
		}


		// function renderRiskMitigationSection(risk) {
		//     const section = document.getElementById('riskMitigationSection');

		//     // Check if treatment exists
		//     const hasTreatment = risk.treatments && risk.treatments.length > 0;
		//     const isFrozen = risk.treatment_status === 'frozen';

		//     if (hasTreatment) {
		//         const treatment = risk.treatments[0]; // Get latest treatment
		//         section.innerHTML = `
		//                                                                                                                                                 <div class="col-md-3">
		//                                                                                                                                                     <label>Start Date</label>
		//                                                                                                                                                     <input type="date" name="start_date" value="${treatment.start_date || ''}" 
		//                                                                                                                                                            ${isFrozen ? 'disabled' : ''} class="form-control">
		//                                                                                                                                                 </div>
		//                                                                                                                                                 <div class="col-md-3">
		//                                                                                                                                                     <label>End Date</label>
		//                                                                                                                                                     <input type="date" name="end_date" value="${treatment.end_date || ''}" 
		//                                                                                                                                                            ${isFrozen ? 'disabled' : ''} class="form-control">
		//                                                                                                                                                 </div>
		//                                                                                                                                                 <!-- Include all other fields similarly -->

		//                                                                                                                                                 ${!isFrozen ? `
		//                                                                                                                                                 <div class="col-md-12">
		//                                                                                                                                                     <div class="d-flex justify-content-end">
		//                                                                                                                                                         <button type="button" class="btn btn-primary" 
		//                                                                                                                                                                 onclick="openDocument2()">
		//                                                                                                                                                             Record Risk Occurrence
		//                                                                                                                                                         </button>
		//                                                                                                                                                     </div>
		//                                                                                                                                                 </div>
		//                                                                                                                                                 ` : ''}

		//                                                                                                                                                 ${isFrozen ? `
		//                                                                                                                                                 <div class="col-md-12 mt-3">
		//                                                                                                                                                     <button type="button" class="btn btn-success" 
		//                                                                                                                                                             onclick="createNewTreatmentVersion()">
		//                                                                                                                                                         + Add New Mitigation Version
		//                                                                                                                                                     </button>
		//                                                                                                                                                 </div>
		//                                                                                                                                                 ` : ''}
		//                                                                                                                                             `;
		//     } else {
		//         // Show empty form if no treatment exists
		//         section.innerHTML = `
		//                                                                                                                                                 <div class="col-md-3">
		//                                                                                                                                                     <label>Start Date</label>
		//                                                                                                                                                     <input type="date" name="start_date" class="form-control">
		//                                                                                                                                                 </div>
		//                                                                                                                                                 <!-- Include all other empty fields -->

		//                                                                                                                                                 <div class="col-md-12">
		//                                                                                                                                                     <div class="d-flex justify-content-end">
		//                                                                                                                                                         <button type="button" class="btn btn-primary" 
		//                                                                                                                                                                 onclick="openDocument2()">
		//                                                                                                                                                             Record Risk Occurrence
		//                                                                                                                                                         </button>
		//                                                                                                                                                     </div>
		//                                                                                                                                                 </div>
		//                                                                                                                                             `;
		//     }

		//     // Add frozen styling if needed
		//     if (isFrozen) {
		//         section.classList.add('frozen-section');
		//     } else {
		//         section.classList.remove('frozen-section');
		//     }
		// }


		// function renderMitigationSection(data) {

		// 	console.log(data,'dataaaaa');
		// 	const section = document.getElementById('riskMitigationSection');
		// 	section.innerHTML = '';

		// 	const isFrozen = data.risk.treatment_status === 'frozen';
		// 	isMitigationFrozen = isFrozen;

		// 	if (data.treatments && data.treatments.length > 0) {
		// 		data.treatments.forEach((treatment, index) => {
		// 			const treatmentDiv = document.createElement('div');
		// 			treatmentDiv.className = 'treatment-section frozen-treatment';
		// 			treatmentDiv.innerHTML = getTreatmentHtml(treatment, true, treatment.version);
		// 			section.appendChild(treatmentDiv);
		// 		});
		// 	}

		// 	if (!isFrozen) {
		// 		const currentTreatment = data.treatments?.[0] || {};
		// 		const treatmentDiv = document.createElement('div');
		// 		treatmentDiv.className = 'treatment-section';
		// 		treatmentDiv.innerHTML = getTreatmentHtml(currentTreatment, false);
		// 		section.appendChild(treatmentDiv);

		// 		const buttonDiv = document.createElement('div');
		// 		buttonDiv.className = 'col-md-12';
		// 		buttonDiv.innerHTML = `
		// 			<div class="d-flex justify-content-end">
		// 				<button type="button" class="btn btn-primary" style="width: 20%; font-size: small; margin-left:auto;" onclick="openDocument2()">
		// 					Record Risk Occurrence
		// 				</button>
		// 			</div>`;
		// 		section.appendChild(buttonDiv);
		// 	} else {
		// 		const addBtnDiv = document.createElement('div');
		// 		addBtnDiv.className = 'col-md-12 mt-3';
		// 		addBtnDiv.innerHTML = `
		// 			<button type="button" class="btn btn-success" onclick="createNewTreatmentVersion()">
		// 				+ Add New Treatment Version
		// 			</button>`;
		// 		section.appendChild(addBtnDiv);
		// 	}
		// }

		function renderRiskTreatmentSections(data) {
			const container = document.getElementById('riskMitigationSection');
			container.innerHTML = ''; // Clear existing content

			const treatments = data.treatments || [];
			const isFrozen = data.risk.treatment_status === 'frozen';

			// Show all existing treatments (frozen)
			treatments.forEach((treatment, index) => {
				const treatmentDiv = document.createElement('div');
				treatmentDiv.className = 'treatment-section frozen-treatment';
				treatmentDiv.innerHTML = getTreatmentHtml(treatment, true, treatment.version);
				container.appendChild(treatmentDiv);
			});

			// Add current editable treatment section if not frozen or no treatments exist
			if (!isFrozen || treatments.length === 0) {
				const currentTreatment = treatments.length > 0 ? treatments[0] : {};
				const treatmentDiv = document.createElement('div');
				treatmentDiv.className = 'treatment-section';
				treatmentDiv.innerHTML = getTreatmentHtml(currentTreatment, false, treatments.length + 1);
				container.appendChild(treatmentDiv);

				// Add Record Risk Occurrence button
				const buttonDiv = document.createElement('div');
				buttonDiv.className = 'col-md-12';
				buttonDiv.innerHTML = `
																																																			<div class="d-flex justify-content-end">
																																																				<button type="button" class="btn btn-primary" 
																																																					style="width: 20%; font-size: small; margin-left:auto;" 
																																																					onclick="openDocument2()">
																																																					Record Risk Occurrence
																																																				</button>
																																																			</div>
																																																		`;
				container.appendChild(buttonDiv);
			}

			// Add "Add New Treatment" button if frozen
			if (isFrozen) {
				const addBtnDiv = document.createElement('div');
				addBtnDiv.className = 'col-md-12 mt-3';
				addBtnDiv.innerHTML = `
																																																			<button type="button" class="btn btn-success" onclick="createNewTreatmentVersion()">
																																																				+ Add New Treatment Version
																																																			</button>
																																																		`;
				container.appendChild(addBtnDiv);
			}

			// Initialize risk calculations for all treatment sections after rendering
			initializeRiskCalculations();
		}

		function getTreatmentHtml(treatment = {}, isFrozen = false, version = null) {
			// Ensure treatment has all required properties
			treatment = {
				risk_finish_sequence: treatment.risk_finish_sequence || '',
				start_date: treatment.start_date || '',
				end_date: treatment.end_date || '',
				target_date: treatment.target_date || '',
				control_status: treatment.control_status || '',
				progress: treatment.progress || '',
				responsible: treatment.responsible || '',
				control_measure_type: treatment.control_measure_type || '',
				action: treatment.action || '',
				residual_severity: treatment.residual_severity || '',
				residual_likelihood: treatment.residual_likelihood || '',
				residual_risk_rating: treatment.residual_risk_rating || '',
				residual_risk_priority: treatment.residual_risk_priority || '',
				residual_notes_severity: treatment.residual_notes_severity || '',
				residual_notes_likelihood: treatment.residual_notes_likelihood || ''
			};

			// Generate unique IDs for this treatment section
			const sectionId = `treatment_${version || Date.now()}`;
			const severityId = `residual_severity_${sectionId}`;
			const likelihoodId = `residual_likelihood_${sectionId}`;
			const ratingId = `residual_risk_rating_${sectionId}`;
			const priorityId = `residual_risk_priority_${sectionId}`;

			const disabledAttr = isFrozen ? 'disabled' : '';
			const frozenBadge = isFrozen ? '<span class="badge bg-danger ms-2">FROZEN</span>' : '<span class="badge bg-success ms-2">ACTIVE</span>';

			return `
																<div class="treatment-header mb-3">
																	<h4>Risk Treatment ${version ? 'Version ' + version : ''} ${frozenBadge}</h4>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<label>Sq.No</label>
																		<input type="number" name="risk_finish_sequence" value="${treatment.risk_finish_sequence || (version !== 'Current' ? version : 1)}" 
																			   ${disabledAttr} class="form-control">
																	</div>
																	<div class="col-md-3">
																		<label>Start Date</label>
																		<input type="date" name="start_date" value="${treatment.start_date || ''}" 
																			   ${disabledAttr} class="form-control">
																	</div>
																	<div class="col-md-3">
																		<label>End Date</label>
																		<input type="date" name="end_date" value="${treatment.end_date || ''}" 
																			   ${disabledAttr} class="form-control">
																	</div>
																	<div class="col-md-3">
																		<label>Target Date</label>
																		<input type="date" name="target_date" value="${treatment.target_date || ''}" 
																			   ${disabledAttr} class="form-control">
																	</div>
																	<div class="col-md-3">
																		<label>Control Measure Status</label>
																		<select name="control_status" ${disabledAttr} class="form-control">
																			<option value="">-- Select --</option>
																			<option value="Yet To Commence" ${treatment.control_status === 'Yet To Commence' ? 'selected' : ''}>Yet To Commence</option>
																			<option value="In Progress" ${treatment.control_status === 'In Progress' ? 'selected' : ''}>In Progress</option>
																			<option value="Completed" ${treatment.control_status === 'Completed' ? 'selected' : ''}>Completed</option>
																		</select>
																	</div>
																	<div class="col-md-3">
																		<label>Progress (%)</label>
																		<select name="progress" ${disabledAttr} class="form-control">
																			<option value="">-- Select --</option>
																			${Array.from({ length: 21 }, (_, i) => i * 5)
					.map(p => `<option value="${p}" ${treatment.progress == p ? 'selected' : ''}>${p}%</option>`)
					.join('')}
																		</select>
																	</div>
																	<div class="col-md-3">
																		<label>Responsible</label>
																		<input type="text" name="responsible" value="${treatment.responsible || ''}" 
																			   ${disabledAttr} class="form-control">
																	</div>
																	<div class="col-md-3">
																		<label>Type Of Control Measure</label>
																		<select name="control_measure_type" ${disabledAttr} class="form-control">
																			<option value="">-- Select --</option>
																			<option value="Process" ${treatment.control_measure_type === 'Process' ? 'selected' : ''}>Process</option>
																			<option value="Policy" ${treatment.control_measure_type === 'Policy' ? 'selected' : ''}>Policy</option>
																			<option value="Procedure" ${treatment.control_measure_type === 'Procedure' ? 'selected' : ''}>Procedure</option>
																			<option value="Asset" ${treatment.control_measure_type === 'Asset' ? 'selected' : ''}>Asset</option>
																		</select>
																	</div>
																	<div class="col-md-12">
																		<label>Action</label>
																		<textarea name="action" ${disabledAttr} class="form-control">${treatment.action || ''}</textarea>
																	</div>

																	<div class="col-md-3">
																		<label>Residual Severity</label>
																		<select name="residual_severity" id="${severityId}" data-section="${sectionId}"
																			${disabledAttr} class="form-control residual-severity">
																			<option value="">-- Select Severity --</option>
																			${severityOptions.map(opt =>
						`<option value="${opt.name}" data-value="${opt.value}" ${treatment.residual_severity === opt.name ? 'selected' : ''}>
																					${opt.name}
																				</option>`
					).join('')}
																		</select>
																	</div>
																	<div class="col-md-3">
																		<label>Residual Likelihood</label>
																		<select name="residual_likelihood" id="${likelihoodId}" data-section="${sectionId}"
																			${disabledAttr} class="form-control residual-likelihood">
																			<option value="">-- Select Likelihood --</option>
																			${likelihoodOptions.map(opt =>
						`<option value="${opt.name}" data-value="${opt.value}" ${treatment.residual_likelihood === opt.name ? 'selected' : ''}>
																					${opt.name}
																				</option>`
					).join('')}
																		</select>
																	</div>
																	<div class="col-md-3">
																		<label>Residual Risk Rating</label>
																		<input type="number" name="residual_risk_rating" id="${ratingId}" 
																			value="${treatment.residual_risk_rating}" readonly 
																			class="form-control" style="background-color: #f8f9fa;">
																	</div>
																	<div class="col-md-3">
																		<label>Residual Risk Priority</label>
																		<input type="text" name="residual_risk_priority" id="${priorityId}" 
																			value="${treatment.residual_risk_priority}" readonly 
																			class="form-control" style="background-color: #f8f9fa;">
																	</div>
																	<div class="col-md-6">
																		<label>Notes On Residual Severity</label>
																		<textarea name="residual_notes_severity" ${disabledAttr} 
																			class="form-control">${treatment.residual_notes_severity}</textarea>
																	</div>
																	<div class="col-md-6">
																		<label>Notes On Residual Likelihood</label>
																		<textarea name="residual_notes_likelihood" ${disabledAttr} 
																			class="form-control">${treatment.residual_notes_likelihood}</textarea>
																	</div>
																</div>
															`;
		}


		// Initialize both risk calculations on page load
		document.addEventListener('DOMContentLoaded', function () {
			calculateRiskRating('inherent');
			calculateRiskRating('residual');

			// Add event listeners for both inherent and residual fields
			document.getElementById('severity').addEventListener('change', () => calculateRiskRating('inherent'));
			document.getElementById('likelihood').addEventListener('change', () => calculateRiskRating('inherent'));
			document.getElementById('residual_severity').addEventListener('change', () => calculateRiskRating('residual'));
			document.getElementById('residual_likelihood').addEventListener('change', () => calculateRiskRating('residual'));
		});
		document.addEventListener('DOMContentLoaded', function () {
			initializeRiskCalculations();
		});

		function createNewTreatmentVersion() {
			if (!confirm('Create a new treatment version? This will create a fresh treatment section.')) {
				return;
			}

			// Get current treatment data from the current (frozen) section
			const currentSection = document.querySelector('.treatment-section.current-treatment');
			let currentSequence = 1;

			if (currentSection) {
				const sequenceInput = currentSection.querySelector('input[name="risk_finish_sequence"]');
				if (sequenceInput && sequenceInput.value) {
					currentSequence = parseInt(sequenceInput.value) || 1;
				}
			}

			// Prepare data for new treatment version
			const formData = {
				risk_id: currentRiskId,
				risk_finish_sequence: currentSequence + 1,
				start_date: null,
				end_date: null,
				target_date: null,
				control_status: null,
				progress: null,
				responsible: null,
				control_measure_type: null,
				action: null,
				residual_severity: null,
				residual_likelihood: null,
				residual_risk_rating: null,
				residual_risk_priority: null,
				residual_notes_severity: null,
				residual_notes_likelihood: null
			};

			// Show loading state
			const btn = event.target;
			const originalText = btn.innerHTML;
			btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span> Creating...';
			btn.disabled = true;

			fetch('/risk-reports/new-treatment', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'Accept': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				body: JSON.stringify(formData)
			})
				.then(response => {
					if (!response.ok) {
						return response.json().then(err => {
							throw new Error(err.message || 'Failed to create new treatment');
						});
					}
					return response.json();
				})
				.then(data => {
					if (data.success) {
						alert('New treatment version created successfully!');
						// Refresh the entire mitigation section to show the new structure
						return fetchRiskData(currentRiskId);
					} else {
						throw new Error(data.message || 'Failed to create new treatment');
					}
				})
				.catch(error => {
					console.error('Error:', error);
					alert('Error: ' + error.message);
				})
				.finally(() => {
					btn.innerHTML = originalText;
					btn.disabled = false;
				});
		}

		document.addEventListener('DOMContentLoaded', function () {
			// Initialize calculations after a small delay to ensure DOM is ready
			setTimeout(() => {
				try {
					calculateRiskRating('inherent');
					calculateRiskRating('residual');

					// Add event listeners
					const addListener = (id, type) => {
						const el = document.getElementById(id);
						if (el) {
							el.addEventListener('change', () => calculateRiskRating(type));
						}
					};

					addListener('severity', 'inherent');
					addListener('likelihood', 'inherent');
					addListener('residual_severity', 'residual');
					addListener('residual_likelihood', 'residual');

				} catch (error) {
					console.error("Initialization error:", error);
				}
			}, 100);
		});


		// document.getElementById('riskOccurrenceForm').addEventListener('submit', function (e) {
		//     e.preventDefault();

		//     const formData = new FormData(this);
		//     const occurrences = [];
		//     let needsReview = false;

		//     // Collect all occurrence data
		//     document.querySelectorAll('.receiving-row').forEach((row, index) => {
		//         const reviewStrategy = row.querySelector('select[name*="review_strategy"]').value;
		//         if (reviewStrategy === 'Yes') needsReview = true;

		//         occurrences.push({
		//             date: row.querySelector('input[type="date"]').value,
		//             mitigation_effective: row.querySelector('select[name*="mitigation_effective"]').value,
		//             review_strategy: reviewStrategy,
		//             remark: row.querySelector('textarea').value
		//         });
		//     });

		//     fetch('/risk-reports/occurrences', {
		//         method: 'POST',
		//         headers: {
		//             'Content-Type': 'application/json',
		//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
		//         },
		//         body: JSON.stringify({
		//             risk_id: currentRiskId,
		//             occurrences: occurrences,
		//             freeze_treatment: needsReview // Pass flag to freeze treatment if review needed
		//         })
		//     })
		//         .then(response => response.json())
		//         .then(data => {
		//             if (data.success) {
		//                 alert('Risk occurrences recorded successfully!');
		//                 documentClose2();

		//                 // Refresh to show updated treatment sections
		//                 if (currentRiskId) {
		//                     fetch(`/risk-reports/${currentRiskId}`)
		//                         .then(response => response.json())
		//                         .then(data => {
		//                             if (data.success) {
		//                                 currentRiskData = data.data;
		//                                 renderTreatmentSections(data.data);
		//                             }
		//                         });
		//                 }
		//             } else {
		//                 throw new Error(data.message || 'Failed to record risk occurrences');
		//             }
		//         })
		//         .catch(error => {
		//             console.error('Error:', error);
		//             alert('Error recording risk occurrences: ' + error.message);
		//         });
		// });

		// function openDocument1(el) {
		//     // Get data attributes from the clicked link
		//     const id = el.getAttribute('data-id');
		//     const name = el.getAttribute('data-name');
		//     const department = el.getAttribute('data-department');
		//     const category = el.getAttribute('data-category');
		//     const description = el.getAttribute('data-description');

		//     const severity = el.getAttribute('data-severity');
		//     const likelihood = el.getAttribute('data-likelihood');
		//     const risk_rating = el.getAttribute('data-risk_rating');
		//     const risk_priority = el.getAttribute('data-risk_priority');
		//     const severity_notes = el.getAttribute('data-notes_severity');
		//     const likelihood_notes = el.getAttribute('data-notes_likelihood');

		//     // Show modal
		//     document.getElementById('documentClose1').classList.add('opened');
		//     document.getElementById('documentOpen1').classList.add('open');

		//     // Populate modal fields
		//     document.getElementById('modalRiskId').value = id;
		//     document.getElementById('modalRiskName').value = name;
		//     document.getElementById('modalDepartment').value = department;
		//     document.getElementById('modalCategory').value = category;
		//     document.getElementById('modalDescription').value = description;
		//     document.getElementById('documentPanel1Heading').innerText = name;

		//     document.getElementById('severity').value = severity;
		//     document.getElementById('likelihood').value = likelihood;
		//     document.getElementById('risk_rating').value = risk_rating;
		//     document.getElementById('risk_priority').value = risk_priority;
		//     document.getElementById('notes_severity').value = notes_severity;
		//     document.getElementById('notes_likelihood').innerText = notes_likelihood;
		// }


		function documentClose1() {
			document.getElementById('documentClose1').classList.remove('opened');
			document.getElementById('documentOpen1').classList.remove('open');
			currentRiskId = null;
			currentRiskData = null;
		}



		function addrow() {
			event.preventDefault()
			let progressOptions = "";
			for (let i = 0; i <= 20; i++) {
				progressOptions += `<option>${i * 5}%</option>`;
			}
			const row = document.getElementById('newTreatment')
			row.innerHTML += `
																																																																														<div class="row" id="newTreatment">
																																																																														<div class="col-md-3">
																																																																														<label for="email">Start Date</label>
																																																																														<input type="date" name="name">

																																																																														</div>
																																																																														<div class="col-md-3">
																																																																														<label for="email">End Date</label>
																																																																														<input type="date" name="name">

																																																																														</div>
																																																																														<div class="col-md-3">
																																																																														<label for="email">Target Date </label>
																																																																														<input type="date" name="name">

																																																																														</div>
																																																																														<div class="col-md-3">
																																																																														<label for="email">Review Date </label>
																																																																														<input type="date" name="name">

																																																																														</div>


																																																																														<div class="col-md-3">
																																																																														<label for="email">Control Measure Status</label>
																																																																														<select>
																																																																														<option value="">-- Select --</option>
																																																																														<option value="">Yet To Commence</option>
																																																																														<option value="">Inprogress</option>
																																																																														<option value="">Completed</option>
																																																																														</select>
																																																																														</div>
																																																																														<div class="col-md-3">
																																																																														<label for="email">Progress (%)</label>
																																																																														<select>
																																																																														<option value="">-- Select --</option>
																																																																														${progressOptions}
																																																																														</select>
																																																																														</div>
																																																																														<div class="col-md-3">
																																																																														<label for="email">Responsible</label>
																																																																														<input type="text" name="name">
																																																																														</div>
																																																																														<div class="col-md-3">
																																																																														<label for="email">Type Of Control Measure</label>
																																																																														<select>
																																																																														<option value="">-- Select --</option>
																																																																														<option value="">Process</option>
																																																																														<option value="">Policy</option>
																																																																														<option value="">Procedure</option>
																																																																														<option value="">Asset</option>
																																																																														</select>
																																																																														</div>
																																																																														<div class="col-md-12">
																																																																														<label for="email">Action</label>
																																																																														<textarea name="" id=""></textarea>
																																																																														</div>

																																																																														<div class="col-md-3">
																																																																														<label>Residual Severity</label>
																																																																														<select name="severity" id="severity" onchange="calculateRiskRating()">
																																																																															<option value="">-- Select Severity --</option>
																																																																															@foreach ($severity as $item)
																																																																																<option value="{{ $item->name }}" data-value="{{ $item->value }}">{{ $item->name }}
																																																																																</option>
																																																																															@endforeach
																																																																														</select>
																																																																													</div>
																																																																													<div class="col-md-3">
																																																																														<label>Residual Likelihood</label>
																																																																														<select name="likelihood" id="likelihood" onchange="calculateRiskRating()">
																																																																															<option value="">-- Select Likelihood --</option>
																																																																															@foreach ($likehood as $item)
																																																																																<option value="{{ $item->name }}" data-value="{{ $item->value }}">{{ $item->name }}
																																																																																</option>
																																																																															@endforeach
																																																																														</select>
																																																																													</div>
																																																																													<div class="col-md-3">
																																																																														<label>Residual Risk Rating</label>
																																																																														<input type="number" name="risk_rating" id="risk_rating" readonly
																																																																															style="background-color: #f8f9fa;">
																																																																													</div>
																																																																													<div class="col-md-3">
																																																																														<label>Residual Risk Priority</label>
																																																																														<input type="text" name="risk_priority" id="risk_priority" readonly
																																																																															style="background-color: #f8f9fa;">
																																																																													</div>
																																																																													<div class="col-md-6">
																																																																														<label>Notes On Severity</label>
																																																																														<textarea name="notes_severity" id="notes_severity"></textarea>
																																																																													</div>
																																																																													<div class="col-md-6">
																																																																														<label>Notes On Likelihood</label>
																																																																														<textarea name="notes_likelihood" id="notes_likelihood"></textarea>
																																																																													</div>



																																																																																																																																																																																																																																																																																												</div>
																																																																																																																																																																																																																																																																																												`


		}
	</script>
	<script>
		// function openDocument2() {
		//     // Get the current risk ID from the first modal
		//     const riskId = document.getElementById('modalRiskId').value;

		//     // Set the risk ID in the second modal
		//     document.getElementById('modalRiskId2').value = riskId;

		//     // Show the second modal
		//     document.getElementById('documentClose2').classList.add('opened');
		//     document.getElementById('documentOpen2').classList.add('open');
		// }

		function openDocument2() {
			document.getElementById('documentClose2').classList.add('opened');
			document.getElementById('documentOpen2').classList.add('open');
		}

		function documentClose2() {
			document.getElementById('documentClose2').classList.remove('opened');
			document.getElementById('documentOpen2').classList.remove('open');
		}


		// Update your existing openDocument1 function to set the risk ID for both modals
		// function openDocument1(el) {
		//     // Get data attributes from the clicked link
		//     const id = el.getAttribute('data-id');
		//     const name = el.getAttribute('data-name');
		//     const department = el.getAttribute('data-department');
		//     const category = el.getAttribute('data-category');
		//     const description = el.getAttribute('data-description');
		//     const severity = el.getAttribute('data-severity');
		//     const likelihood = el.getAttribute('data-likelihood');
		//     const risk_rating = el.getAttribute('data-risk_rating');
		//     const risk_priority = el.getAttribute('data-risk_priority');
		//     const notes_severity = el.getAttribute('data-notes_severity');
		//     const notes_likelihood = el.getAttribute('data-notes_likelihood');

		//     // Show modal
		//     document.getElementById('documentClose1').classList.add('opened');
		//     document.getElementById('documentOpen1').classList.add('open');

		//     // Populate modal fields
		//     document.getElementById('modalRiskId').value = id;
		//     document.getElementById('modalRiskId2').value = id; // Also set for second modal
		//     document.getElementById('modalRiskName').value = name;
		//     document.getElementById('modalDepartment').value = department;
		//     document.getElementById('modalCategory').value = category;
		//     document.getElementById('modalDescription').value = description;
		//     document.getElementById('documentPanel1Heading').innerText = name;

		//     document.getElementById('severity').value = severity;
		//     document.getElementById('likelihood').value = likelihood;
		//     document.getElementById('risk_rating').value = risk_rating;
		//     document.getElementById('risk_priority').value = risk_priority;
		//     document.querySelector('textarea[name="notes_severity"]').value = notes_severity;
		//     document.querySelector('textarea[name="notes_likelihood"]').value = notes_likelihood;
		// }


	</script>
	<!-- In your Blade template -->
	<script defer>
		function addReceivingRow() {
			// alert('hello');
			const tbody = document.getElementById("tableBody1");
			const row = document.createElement("tr");
			row.className = "receiving-row";

			const rowNumber = tbody.children.length + 1;
			row.innerHTML = `
																							<td>${rowNumber}</td>
																							<td><input type="date" name="occurrences[${rowNumber - 1}][date]" class="form-control form-control-sm" required></td>
																							<td>
																								<select name="occurrences[${rowNumber - 1}][mitigation_effective]" class="form-select form-select-sm" required>
																									<option value="">Select</option>  
																									<option value="Yes">Yes</option>
																									<option value="No">No</option>
																								</select>
																							</td>
																							<td>
																								<select name="occurrences[${rowNumber - 1}][review_strategy]" class="form-select form-select-sm" required>
																									<option value="">Select</option>   
																									<option value="Yes">Yes</option>
																									<option value="No">No</option>
																								</select>
																							</td>
																							<td><textarea name="occurrences[${rowNumber - 1}][remark]" class="form-control form-control-sm"></textarea></td>
																							<td><button type="button" class="btn btn-sm btn-danger" onclick="removeReceivingRow(this)">×</button></td>
																						`;

			tbody.appendChild(row);
		}

		function removeReceivingRow(button) {
			const row = button.closest('tr');
			if (row) {
				row.remove();
				// Update row numbers
				const tbody = document.getElementById("tableBody1");
				const rows = tbody.querySelectorAll('.receiving-row');
				rows.forEach((row, index) => {
					const firstTd = row.querySelector('td:first-child');
					if (firstTd) {
						firstTd.textContent = index + 1;
					}
					// Update input names
					const inputs = row.querySelectorAll('input, select, textarea');
					inputs.forEach(input => {
						const name = input.getAttribute('name');
						if (name && name.includes('[')) {
							const newName = name.replace(/\[\d+\]/, `[${index}]`);
							input.setAttribute('name', newName);
						}
					});
				});
			}
		}

		function freezeRiskTreatment(riskId) {
			const treatmentSection = document.querySelector('#newTreatment');
			if (treatmentSection) {
				// Disable all inputs
				treatmentSection.querySelectorAll('input, select, textarea, button').forEach(el => {
					el.disabled = true;
				});

				// Add visual indication
				treatmentSection.style.opacity = '0.6';
				treatmentSection.style.pointerEvents = 'none';

				// Add a "frozen" banner
				const frozenBanner = document.createElement('div');
				frozenBanner.className = 'frozen-banner';
				frozenBanner.innerHTML = '<span>Risk Mitigation Frozen - New Section Created Below</span>';
				treatmentSection.parentNode.insertBefore(frozenBanner, treatmentSection.nextSibling);
			}
		}

		function createNewTreatmentSection(riskId) {
			const treatmentContainer = document.querySelector('.form-container-sub:has(#newTreatment)');
			if (treatmentContainer) {
				// Clone the treatment section
				const newTreatment = document.createElement('div');
				newTreatment.className = 'row new-treatment-section';
				newTreatment.id = 'newTreatment_' + riskId;

				// Get the HTML of the original treatment section
				const originalHTML = document.getElementById('newTreatment').innerHTML;

				// Create new section with cleared values
				newTreatment.innerHTML = originalHTML.replace(/value="[^"]*"/g, '')
					.replace(/selected/g, '');

				// Add a title
				const title = document.createElement('h4');
				title.textContent = 'New Risk Mitigation Plan';
				title.style.marginTop = '20px';
				title.style.color = '#049f3b';

				// Insert after the frozen section
				const frozenBanner = treatmentContainer.querySelector('.frozen-banner');
				if (frozenBanner) {
					frozenBanner.parentNode.insertBefore(title, frozenBanner.nextSibling);
					title.parentNode.insertBefore(newTreatment, title.nextSibling);
				} else {
					treatmentContainer.appendChild(title);
					treatmentContainer.appendChild(newTreatment);
				}

				// Add a hidden input to track the original risk ID
				const riskIdInput = document.createElement('input');
				riskIdInput.type = 'hidden';
				riskIdInput.name = 'original_risk_id';
				riskIdInput.value = riskId;
				newTreatment.prepend(riskIdInput);
			}
		}

		// Submit all receiving data
		function submitReceivingTableData() {
			const rows = document.querySelectorAll("#tableBody1 .receiving-row");
			const selectedMonth = document.getElementById("dateFilter5").value;

			if (!selectedMonth) {
				showToast("Please select a month/year first", "error");
				return;
			}

			const data = [];
			let hasData = false;

			rows.forEach(row => {
				const dateInput = row.querySelector(".receiving-date");
				const timeInput = row.querySelector(".receiving-time");
				const cells = row.querySelectorAll("td");

				// Create row data object
				const rowData = {
					date: dateInput ? dateInput.value : '',
					time: timeInput ? timeInput.value : '',
					client_location: cells[2].innerText.trim(),
					client_name: cells[3].innerText.trim(),
					tl_code: cells[4].innerText.trim(),
					blood: cells[5].innerText.trim(),

				};

				// Check if row has any data
				const rowHasData = Object.values(rowData).some(
					value => value && value.toString().trim() !== ''
				);

				if (rowHasData) {
					hasData = true;
					// Add ID if this is an existing row
					const rowId = row.getAttribute("data-id");
					if (rowId) {
						rowData.id = rowId;
					}
					data.push(rowData);
				}
			});

			if (!hasData) {
				showToast("No data to save! Please enter information.", "error");
				return;
			}

			// Show loading indicator
			const submitBtn = document.querySelector('button[onclick="submitReceivingTableData()"]');
			const originalBtnText = submitBtn.innerHTML;
			submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
			submitBtn.disabled = true;

			fetch("/save-receiving-data", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
					"Accept": "application/json"
				},
				body: JSON.stringify({ samples: data })
			})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					return response.json();
				})
				.then(result => {
					if (result.success) {
						showToast("Data saved successfully!", "success");
						// Update row IDs if new records were created
						if (result.updatedIds) {
							result.updatedIds.forEach((id, index) => {
								if (rows[index]) {
									rows[index].setAttribute("data-id", id);
								}
							});
						}
					} else {
						showToast(result.message || "Failed to save data", "error");
					}
				})
				.catch(error => {
					console.error("Error:", error);
					showToast("Error saving data", "error");
				})
				.finally(() => {
					submitBtn.innerHTML = originalBtnText;
					submitBtn.disabled = false;
				});
		}

	</script>

	<script>
		let rowCount = 0;
		// function addReceivingRow(sampleData = null) {
		//     const tbody = document.getElementById("tableBody1");
		//     const row = document.createElement("tr");
		//     row.className = "receiving-row";
		//     rowCount++;
		//     const rowNumber = tbody.children.length + 1;
		//     if (sampleData && sampleData.id) {
		//         row.setAttribute("data-id", sampleData.id);
		//     }

		//     row.innerHTML = `<td>${rowCount}</td>
		//                                                                                                                         <td><input type="date" name="occurrences[${rowCount - 1}][date]" class="form-control form-control-sm" required></td>
		//                                                                                                                         <td>
		//                                                                                                                             <select name="occurrences[${rowCount - 1}][mitigation_effective]" class="form-select form-select-sm" required>
		//                                                                                                                                 <option value="Yes">Yes</option>
		//                                                                                                                                 <option value="No">No</option>
		//                                                                                                                             </select>
		//                                                                                                                         </td>
		//                                                                                                                         <td>
		//                                                                                                                             <select name="occurrences[${rowCount - 1}][review_strategy]" class="form-select form-select-sm" required>
		//                                                                                                                                 <option value="Yes">Yes</option>
		//                                                                                                                                 <option value="No">No</option>
		//                                                                                                                             </select>
		//                                                                                                                         </td>
		//                                                                                                                         <td><textarea name="occurrences[${rowCount - 1}][remark]" class="form-control form-control-sm"></textarea></td>
		//                                                                                                                         <td><button type="button" class="btn btn-sm btn-danger" onclick="removeReceivingRow(this)">×</button></td>
		//                                                                                                                                 `;

		//     tbody.appendChild(row);



		//     // Set current date as default if new row
		//     if (!sampleData) {
		//         const dateInput = row.querySelector('.receiving-date');
		//         if (dateInput) {
		//             dateInput.valueAsDate = new Date();
		//         }

		//         const timeInput = row.querySelector('.receiving-time');
		//         if (timeInput) {
		//             const now = new Date();
		//             timeInput.value = now.toTimeString().substring(0, 5); // HH:mm format
		//         }
		//     }

		//     // Scroll to the new row
		//     row.scrollIntoView({ behavior: 'smooth', block: 'nearest' });

		//     // Focus on the first editable cell
		//     const firstEditableCell = row.querySelector('td[contenteditable="true"]');
		//     if (firstEditableCell) {
		//         firstEditableCell.focus();
		//     }
		// }

		// // Function to remove a row


		// function addReceivingRow() {
		// 	const tbody = document.getElementById("tableBody1");
		// 	const row = document.createElement("tr");
		// 	row.className = "receiving-row";
		// 	rowCount++;

		// 	const rowNumber = tbody.children.length + 1;
		// 	row.innerHTML = `
		// 								<td>${rowNumber}</td>
		// 								<td><input type="date" name="occurrences[${rowNumber - 1}][date]" class="form-control form-control-sm" required></td>
		// 								<td>
		// 									<select name="occurrences[${rowNumber - 1}][mitigation_effective]" class="form-select form-select-sm" required>
		// 										<option value="">Select</option>  
		// 										<option value="Yes">Yes</option>
		// 										<option value="No">No</option>
		// 									</select>
		// 								</td>
		// 								<td>
		// 									<select name="occurrences[${rowNumber - 1}][review_strategy]" class="form-select form-select-sm" required>
		// 										<option value="">Select</option>   
		// 										<option value="Yes">Yes</option>
		// 										<option value="No">No</option>
		// 									</select>
		// 								</td>
		// 								<td><textarea name="occurrences[${rowNumber - 1}][remark]" class="form-control form-control-sm"></textarea></td>
		// 								<td><button type="button" class="btn btn-sm btn-danger" onclick="removeReceivingRow(this)">×</button></td>
		// 							`;

		// 	tbody.appendChild(row);
		// }




		// document.getElementById('riskOccurrenceForm').addEventListener('submit', function (e) {
		//     e.preventDefault();

		//     const formData = new FormData(this);
		//     const riskId = document.getElementById('modalRiskId2').value;

		//     // Convert form data to JSON format
		//     const occurrences = [];
		//     document.querySelectorAll('.receiving-row').forEach((row, index) => {
		//         occurrences.push({
		//             date: row.querySelector('input[type="date"]').value,
		//             mitigation_effective: row.querySelector('select[name*="mitigation_effective"]').value,
		//             review_strategy: row.querySelector('select[name*="review_strategy"]').value,
		//             remark: row.querySelector('textarea').value
		//         });
		//     });

		//     fetch('/api/risk-occurrences', {
		//         method: 'POST',
		//         headers: {
		//             'Content-Type': 'application/json',
		//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
		//         },
		//         body: JSON.stringify({
		//             risk_id: riskId,
		//             occurrences: occurrences
		//         })
		//     })
		//         .then(response => response.json())
		//         .then(data => {
		//             if (data.success) {
		//                 alert('Risk occurrences recorded successfully!');
		//                 documentClose2();
		//                 freezeRiskTreatment(riskId);
		//                 createNewTreatmentSection(riskId);
		//             } else {
		//                 alert('Error: ' + (data.message || 'Failed to save occurrences'));
		//             }
		//         })
		//         .catch(error => {
		//             console.error('Error:', error);
		//             alert('An error occurred while submitting the form');
		//         });
		// });




		// Fetch data for selected month
		function fetchReceivingTableData() {
			const selectedMonth = document.getElementById("dateFilter5").value;

			if (!selectedMonth) {
				return;
			}

			// Show loading indicator
			const dateFilter = document.getElementById("dateFilter5");
			dateFilter.disabled = true;

			fetch(`/fetch-sample-receiving?month_year=${selectedMonth}`, {
				headers: {
					"Accept": "application/json",
					"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
				}
			})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					return response.json();
				})
				.then(data => {
					const tbody = document.getElementById("tableBody1");
					tbody.innerHTML = ""; // Clear existing rows

					if (data.samples && data.samples.length > 0) {
						data.samples.forEach(sample => {
							addReceivingRow(sample);
						});
					} else {
						// Add one empty row if no data found
						addReceivingRow();
						// showToast("No records found for selected month", "info");
					}
				})
				.catch(error => {
					console.error("Error fetching data:", error);
					showToast("Error fetching data", "error");
				})
				.finally(() => {
					dateFilter.disabled = false;
				});
		}

		// Helper function to show toast notifications
		function showToast(message, type = 'info') {
			// You can implement a toast notification system here
			// For now using simple alerts
			alert(`${type.toUpperCase()}: ${message}`);
		}

		// Initialize on page load
		document.addEventListener('DOMContentLoaded', function () {
			// Set default month filter to current month
			const monthInput = document.getElementById("dateFilter5");
			if (monthInput && !monthInput.value) {
				const now = new Date();
				monthInput.value = now.toISOString().slice(0, 7); // YYYY-MM format
			}

			// Add event listener for Enter key in cells
			document.addEventListener('keydown', function (e) {
				if (e.key === 'Enter' && e.target.hasAttribute('contenteditable')) {
					e.preventDefault();
					const row = e.target.closest('tr');
					const nextCell = e.target.nextElementSibling;
					if (nextCell) {
						if (nextCell.hasAttribute('contenteditable')) {
							nextCell.focus();
						} else {
							const nextEditable = nextCell.querySelector('[contenteditable="true"]');
							if (nextEditable) nextEditable.focus();
						}
					}
				}
			});

			// Load initial data
			if (monthInput && monthInput.value) {
				fetchReceivingTableData();
			} else {
				// Ensure at least one empty row exists
				addReceivingRow();
			}
		});
	</script>
	<style>
		.treatment-section {
			margin-bottom: 20px;
			padding: 15px;
			border: 1px solid #ddd;
			border-radius: 5px;
			position: relative;
		}

		.frozen-treatment {
			opacity: 0.8;
			background-color: #f8f9fa;
			pointer-events: none;
			border-left: 4px solid #dc3545;
		}

		.frozen-treatment input,
		.frozen-treatment select,
		.frozen-treatment textarea,
		.frozen-treatment button {
			background-color: #e9ecef !important;
			cursor: not-allowed !important;
		}

		.current-treatment {
			border-left: 4px solid #28a745;
		}

		.treatment-header h4 {
			font-size: 1.2rem;
			font-weight: bold;
			color: #333;
			margin-bottom: 15px;
		}

		.badge {
			font-size: 0.8rem;
			padding: 0.35em 0.65em;
		}

		.bg-danger {
			background-color: #dc3545 !important;
		}

		.bg-success {
			background-color: #28a745 !important;
		}

		.action-buttons {
			margin-top: 20px;
			margin-bottom: 10px;
		}

		/* Make sure the Record Risk Occurrence button stays visible */
		#riskMitigationSection>div.col-md-12 {
			position: relative;
			z-index: 1;
		}

		table input,
		table select {
			width: 100%;
			box-sizing: border-box;
		}

		.frozen-banner {
			background-color: #f8d7da;
			color: #721c24;
			padding: 10px;
			text-align: center;
			margin: 10px 0;
			border-radius: 5px;
			border-left: 5px solid #dc3545;
			font-weight: bold;
		}

		.treatment-section {
			margin-bottom: 20px;
			padding: 15px;
			border: 1px solid #ddd;
			border-radius: 5px;
			position: relative;
		}

		.frozen-treatment {
			opacity: 0.7;
			background-color: #f8f9fa;
			pointer-events: none;
		}

		.frozen-treatment input,
		.frozen-treatment select,
		.frozen-treatment textarea,
		.frozen-treatment button {
			background-color: #e9ecef !important;
			cursor: not-allowed !important;
		}

		.frozen-banner {
			background-color: #ffc107;
			color: #856404;
			padding: 5px 10px;
			margin-bottom: 10px;
			border-radius: 4px;
			font-weight: bold;
		}

		.new-treatment-btn {
			margin-top: 20px;
			margin-bottom: 20px;
		}

		.frozen-section {
			opacity: 0.8;
			background-color: #f8f9fa;
		}

		.frozen-section input,
		.frozen-section select,
		.frozen-section textarea {
			background-color: #e9ecef !important;
			cursor: not-allowed !important;
		}
	</style>
	<script>
		// function calculateRiskRating() {
		//     const severitySelect = document.getElementById('severity');
		//     const likelihoodSelect = document.getElementById('likelihood');
		//     const riskRatingInput = document.getElementById('risk_rating');
		//     const riskPriorityInput = document.getElementById('risk_priority');

		//     // Get selected options
		//     const severityOption = severitySelect.options[severitySelect.selectedIndex];
		//     const likelihoodOption = likelihoodSelect.options[likelihoodSelect.selectedIndex];

		//     // Reset values if no selection
		//     if (!severityOption || !likelihoodOption || severitySelect.value === '' || likelihoodSelect.value === '') {
		//         riskRatingInput.value = '';
		//         riskPriorityInput.value = '';
		//         updateRiskRatingColor(0);
		//         return;
		//     }

		//     // Get numeric values from data attributes
		//     const severityValue = parseInt(severityOption.getAttribute('data-value'));
		//     const likelihoodValue = parseInt(likelihoodOption.getAttribute('data-value'));

		//     // Validate numeric values
		//     if (isNaN(severityValue) || isNaN(likelihoodValue)) {
		//         console.error('Invalid numeric values for severity or likelihood');
		//         riskRatingInput.value = '';
		//         riskPriorityInput.value = '';
		//         return;
		//     }

		//     // Calculate risk rating (multiplication)
		//     const riskRating = severityValue * likelihoodValue;

		//     // Set risk rating (ensure it's within valid range)
		//     if (riskRating >= 1 && riskRating <= 25) {
		//         riskRatingInput.value = riskRating;

		//         // Determine risk priority based on risk rating
		//         const riskPriority = getRiskPriority(riskRating);
		//         riskPriorityInput.value = riskPriority;

		//         // Update visual indicators
		//         updateRiskRatingColor(riskRating);

		//         // Optional: Log calculation for debugging
		//         console.log(`Risk Calculation: ${severityValue} × ${likelihoodValue} = ${riskRating} (${riskPriority})`);
		//     } else {
		//         console.error('Calculated risk rating is out of valid range (1-25)');
		//         riskRatingInput.value = '';
		//         riskPriorityInput.value = '';
		//     }
		// }

		// Function to determine risk priority based on risk rating



		// Initialize on page load
		document.addEventListener('DOMContentLoaded', function () {
			// Initialize calculations
			calculateRiskRating('inherent');

			// Initialize residual calculations for all sections
			document.querySelectorAll('.residual-severity').forEach(select => {
				const sectionId = select.dataset.section;
				calculateRiskRating('residual', sectionId);
			});

			// Add event listeners for inherent risk changes
			document.getElementById('severity').addEventListener('change', () => calculateRiskRating('inherent'));
			document.getElementById('likelihood').addEventListener('change', () => calculateRiskRating('inherent'));

			// Add event listeners for residual risk changes
			document.addEventListener('change', function (e) {
				if (e.target.matches('.residual-severity, .residual-likelihood')) {
					const sectionId = e.target.dataset.section;
					calculateRiskRating('residual', sectionId);
				}
			});
		});

		function calculateRiskRating(type, sectionId = null) {
			let severitySelect, likelihoodSelect, ratingInput, priorityInput;

			if (type === 'inherent') {
				severitySelect = document.getElementById('severity');
				likelihoodSelect = document.getElementById('likelihood');
				ratingInput = document.getElementById('risk_rating');
				priorityInput = document.getElementById('risk_priority');
			} else if (type === 'residual') {
				if (sectionId) {
					// For specific treatment section
					severitySelect = document.getElementById(`residual_severity_${sectionId}`);
					likelihoodSelect = document.getElementById(`residual_likelihood_${sectionId}`);
					ratingInput = document.getElementById(`residual_risk_rating_${sectionId}`);
					priorityInput = document.getElementById(`residual_risk_priority_${sectionId}`);
				} else {
					// For original residual fields (backward compatibility)
					severitySelect = document.getElementById('residual_severity');
					likelihoodSelect = document.getElementById('residual_likelihood');
					ratingInput = document.getElementById('residual_risk_rating');
					priorityInput = document.getElementById('residual_risk_priority');
				}
			}

			if (!severitySelect || !likelihoodSelect || !ratingInput || !priorityInput) {
				return;
			}

			const severityOption = severitySelect.selectedOptions[0];
			const likelihoodOption = likelihoodSelect.selectedOptions[0];

			if (severityOption && likelihoodOption && severityOption.dataset.value && likelihoodOption.dataset.value) {
				const severityValue = parseInt(severityOption.dataset.value);
				const likelihoodValue = parseInt(likelihoodOption.dataset.value);
				const rating = severityValue * likelihoodValue;

				ratingInput.value = rating;

				// Determine priority based on rating
				let priority = '';
				if (rating >= 17) priority = 'High';
				else if (rating >= 8) priority = 'Medium';
				else if (rating >= 1) priority = 'Low';
				else priority = 'Very Low';

				priorityInput.value = priority;

				// Update colors for both rating and priority
				updateRiskRatingColor(rating, ratingInput.id, priorityInput.id);
			} else {
				ratingInput.value = '';
				priorityInput.value = '';
				// Clear colors when no rating
				updateRiskRatingColor(0, ratingInput.id, priorityInput.id);
			}
		}

		function updateRiskRatingColor(rating, ratingId, priorityId) {
			const riskRatingInput = document.getElementById(ratingId);
			const riskPriorityInput = document.getElementById(priorityId);

			if (!riskRatingInput || !riskPriorityInput) return;

			// Remove all color classes
			['bg-danger', 'bg-warning', 'bg-info', 'bg-success'].forEach(cls => {
				riskRatingInput.classList.remove(cls);
				riskPriorityInput.classList.remove(cls);
			});

			// Add appropriate class based on rating value
			if (rating >= 25) {
				riskRatingInput.classList.add('bg-danger');
				riskPriorityInput.classList.add('bg-danger');
			} else if (rating >= 17) {
				riskRatingInput.classList.add('bg-warning');
				riskPriorityInput.classList.add('bg-warning');
			} else if (rating >= 8) {
				riskRatingInput.classList.add('bg-info');
				riskPriorityInput.classList.add('bg-info');
			} else if (rating >= 1) {
				riskRatingInput.classList.add('bg-success');
				riskPriorityInput.classList.add('bg-success');
			}
		}

		function initializeRiskCalculations() {
			// Initialize inherent risk calculation
			calculateRiskRating('inherent');

			// Initialize residual risk calculations for all treatment sections
			const residualSeveritySelects = document.querySelectorAll('.residual-severity');
			const residualLikelihoodSelects = document.querySelectorAll('.residual-likelihood');

			// Calculate for each treatment section
			residualSeveritySelects.forEach(select => {
				const sectionId = select.dataset.section;
				if (sectionId) {
					calculateRiskRating('residual', sectionId);
				}
			});
		}

		document.addEventListener('DOMContentLoaded', function () {
			// Initialize calculations after a small delay to ensure DOM is ready
			setTimeout(() => {
				try {
					calculateRiskRating('inherent');
					initializeRiskCalculations();

					// Add event listeners for inherent risk changes
					const severityEl = document.getElementById('severity');
					const likelihoodEl = document.getElementById('likelihood');

					if (severityEl) {
						severityEl.addEventListener('change', () => calculateRiskRating('inherent'));
					}
					if (likelihoodEl) {
						likelihoodEl.addEventListener('change', () => calculateRiskRating('inherent'));
					}

					// Add event listeners for residual risk changes (using event delegation)
					document.addEventListener('change', function (e) {
						if (e.target.matches('.residual-severity, .residual-likelihood')) {
							const sectionId = e.target.dataset.section;
							if (sectionId) {
								calculateRiskRating('residual', sectionId);
							}
						}
					});

				} catch (error) {
					console.error("Initialization error:", error);
				}
			}, 100);
		});
		document.addEventListener('change', function (e) {
			if (e.target.matches('#severity, #likelihood')) {
				calculateRiskRating('inherent');
			} else if (e.target.matches('.residual-severity, .residual-likelihood')) {
				const sectionId = e.target.dataset.section;
				calculateRiskRating('residual', sectionId);
			}
		});

		// Form validation before submission
		function validateRiskForm() {
			const requiredFields = [
				{ id: 'lab_name', name: 'Lab' },
				{ id: 'severity', name: 'Severity' },
				{ id: 'likelihood', name: 'Likelihood' },
				{ id: 'risk_rating', name: 'Risk Rating' },
				{ id: 'risk_priority', name: 'Risk Priority' }
			];

			let isValid = true;
			let missingFields = [];

			requiredFields.forEach(field => {
				const element = document.getElementById(field.id);
				if (!element || !element.value || element.value.trim() === '') {
					isValid = false;
					missingFields.push(field.name);
				}
			});

			if (!isValid) {
				alert(`Please fill in the following required fields: ${missingFields.join(', ')}`);
				return false;
			}

			// Validate risk rating is within expected range
			const riskRating = parseInt(document.getElementById('risk_rating').value);
			if (riskRating < 1 || riskRating > 25) {
				alert('Risk rating must be between 1 and 25. Please recalculate.');
				return false;
			}

			return true;
		}

		// Initialize calculation on page load
		document.addEventListener('DOMContentLoaded', function () {
			// Initial calculation if values are already selected
			calculateRiskRating();

			// Add form validation on submit
			const form = document.querySelector('form');
			if (form) {
				form.addEventListener('submit', function (e) {
					if (!validateRiskForm()) {
						e.preventDefault();
						return false;
					}
				});
			}

			// Optional: Add real-time validation feedback
			const severitySelect = document.getElementById('severity');
			const likelihoodSelect = document.getElementById('likelihood');

			if (severitySelect && likelihoodSelect) {
				[severitySelect, likelihoodSelect].forEach(select => {
					select.addEventListener('change', function () {
						// Remove any previous error styling
						this.classList.remove('is-invalid');

						// Recalculate risk rating
						calculateRiskRating();
					});
				});
			}
		});




		// Updated risk form submission handler
		document.getElementById('riskForm').addEventListener('submit', function (e) {
			e.preventDefault();

			const formData = new FormData(this);
			const submitBtn = this.querySelector('button[type="submit"]');
			submitBtn.disabled = true;
			submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span> Saving...';

			fetch('/risk-reports/update', {
				method: 'POST',
				body: formData,
				headers: {
					'Accept': 'application/json',
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				}
			})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						alert('Risk updated successfully!');
						// Refresh the data to reflect any changes
						return fetchRiskData(currentRiskId);
					}
					throw new Error(data.message || 'Failed to update risk');
				})
				.catch(error => {
					console.error('Error:', error);
					alert('Error updating risk: ' + error.message);
				})
				.finally(() => {
					submitBtn.innerHTML = 'Submit';
					submitBtn.disabled = false;
				});
		});

		// Submit risk occurrence form
		// document.getElementById('riskOccurrenceForm').addEventListener('submit', function (e) {
		//     e.preventDefault();

		//     const formData = new FormData(this);
		//     const occurrences = [];

		//     // Collect all occurrence data
		//     document.querySelectorAll('.receiving-row').forEach((row, index) => {
		//         occurrences.push({
		//             date: row.querySelector('input[type="date"]').value,
		//             mitigation_effective: row.querySelector('select[name*="mitigation_effective"]').value,
		//             review_strategy: row.querySelector('select[name*="review_strategy"]').value,
		//             remark: row.querySelector('textarea').value
		//         });
		//     });

		//     fetch('/risk-reports/occurrences', {
		//         method: 'POST',
		//         headers: {
		//             'Content-Type': 'application/json',
		//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
		//         },
		//         body: JSON.stringify({
		//             risk_id: currentRiskId,
		//             occurrences: occurrences
		//         })
		//     })
		//         .then(response => response.json())
		//         .then(data => {
		//             if (data.success) {
		//                 alert('Risk occurrences recorded successfully!');
		//                 documentClose2();

		//                 // If review was requested, refresh to show frozen treatment
		//                 if (data.needs_review) {
		//                     fetch(`/risk-reports/${currentRiskId}`)
		//                         .then(response => response.json())
		//                         .then(data => {
		//                             if (data.success) {
		//                                 currentRiskData = data.data;
		//                                 renderTreatmentSections(data.data);
		//                             }
		//                         });
		//                 }
		//             } else {
		//                 throw new Error(data.message || 'Failed to record risk occurrences');
		//             }
		//         })
		//         .catch(error => {
		//             console.error('Error:', error);
		//             alert('Error recording risk occurrences: ' + error.message);
		//         });
		// });

		// // Initialize risk rating calculation on page load

		document.addEventListener('DOMContentLoaded', function () {
			calculateRiskRating();
		});
		// Helper function to show notifications
		function showNotification(message, type = 'info') {
			// Using SweetAlert if available
			if (typeof Swal !== 'undefined') {
				Swal.fire({
					title: type === 'success' ? 'Success!' : 'Error!',
					text: message,
					icon: type === 'success' ? 'success' : 'error',
					timer: 3000,
					showConfirmButton: false
				});
			}
			// Using Bootstrap toast if available
			else if (typeof bootstrap !== 'undefined') {
				const toastHtml = `
																																																																																																																																																																																																																																					<div class="toast align-items-center text-white bg-${type === 'success' ? 'success' : 'danger'} border-0" role="alert">
																																																																																																																																																																																																																																						<div class="d-flex">
																																																																																																																																																																																																																																							<div class="toast-body">${message}</div>
																																																																																																																																																																																																																																							<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
																																																																																																																																																																																																																																						</div>
																																																																																																																																																																																																																																					</div>
																																																																																																																																																																																																																																				`;

				// Create toast container if it doesn't exist
				let toastContainer = document.querySelector('.toast-container');
				if (!toastContainer) {
					toastContainer = document.createElement('div');
					toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
					document.body.appendChild(toastContainer);
				}

				toastContainer.insertAdjacentHTML('beforeend', toastHtml);
				const toast = new bootstrap.Toast(toastContainer.lastElementChild);
				toast.show();
			}
			// Fallback to alert
			else {
				alert(message);
			}
		}
	</script>
	<style>
		/* Risk Rating Color Styles */
		.risk-very-high {
			background-color: #dc3545 !important;
			color: white !important;
			font-weight: bold;
		}

		.risk-high {
			background-color: #fd7e14 !important;
			color: white !important;
			font-weight: bold;
		}

		.risk-medium {
			background-color: #ffc107 !important;
			color: black !important;
			font-weight: bold;
		}

		.risk-low {
			background-color: #20c997 !important;
			color: white !important;
			font-weight: bold;
		}

		.risk-very-low {
			background-color: #28a745 !important;
			color: white !important;
			font-weight: bold;
		}

		/* Form styling improvements */
		.form-container-sub {
			padding: 20px;
			border: 1px solid #dee2e6;
			border-radius: 10px;
			margin-bottom: 20px;
			background-color: #f8f9fa;
		}

		.form-container-sub label {
			font-weight: 600;
			margin-bottom: 5px;
			display: block;
		}

		.form-container-sub select,
		.form-container-sub input,
		.form-container-sub textarea {
			width: 100%;
			padding: 8px 12px;
			border: 1px solid #ced4da;
			border-radius: 5px;
			margin-bottom: 15px;
			transition: border-color 0.3s ease;
		}

		.form-container-sub select:focus,
		.form-container-sub input:focus,
		.form-container-sub textarea:focus {
			outline: none;
			border-color: #049f3b;
			box-shadow: 0 0 0 0.2rem rgba(4, 159, 59, 0.25);
		}

		/* Risk Matrix Visual Indicator */
		.risk-matrix-indicator {
			display: inline-block;
			width: 20px;
			height: 20px;
			border-radius: 50%;
			margin-left: 10px;
			vertical-align: middle;
		}


		.frozen-banner {
			background-color: #f8d7da;
			color: #721c24;
			padding: 10px;
			text-align: center;
			margin: 10px 0;
			border-radius: 5px;
			border-left: 5px solid #dc3545;
			font-weight: bold;
		}

		.new-treatment-section {
			border: 2px dashed #049f3b;
			padding: 15px;
			margin-top: 10px;
			border-radius: 5px;
			background-color: #f8f9fa;
		}

		/* .closeBtn2 {
																																																																																																																																																																																																																																																															position: fixed;
																																																																																																																																																																																																																																																															top: 20px;
																																																																																																																																																																																																																																																															right: 20px;
																																																																																																																																																																																																																																																															z-index: 1001;
																																																																																																																																																																																																																																																															cursor: pointer;
																																																																																																																																																																																																																																																															font-size: 24px;
																																																																																																																																																																																																																																																															color: #fff;
																																																																																																																																																																																																																																																															background: red;
																																																																																																																																																																																																																																																															width: 40px;
																																																																																																																																																																																																																																																															height: 40px;
																																																																																																																																																																																																																																																															border-radius: 50%;
																																																																																																																																																																																																																																																															display: flex;
																																																																																																																																																																																																																																																															align-items: center;
																																																																																																																																																																																																																																																															justify-content: center;
																																																																																																																																																																																																																																																															box-shadow: 0 2px 5px rgba(0,0,0,0.2);
																																																																																																																																																																																																																																																														}

																																																																																																																																																																																																																																																														.panel2 {
																																																																																																																																																																																																																																																															display: none;
																																																																																																																																																																																																																																																															position: fixed;
																																																																																																																																																																																																																																																															top: 50%;
																																																																																																																																																																																																																																																															left: 50%;
																																																																																																																																																																																																																																																															transform: translate(-50%, -50%);
																																																																																																																																																																																																																																																															width: 80%;
																																																																																																																																																																																																																																																															max-width: 900px;
																																																																																																																																																																																																																																																															max-height: 80vh;
																																																																																																																																																																																																																																																															overflow-y: auto;
																																																																																																																																																																																																																																																															background: white;
																																																																																																																																																																																																																																																															padding: 20px;
																																																																																																																																																																																																																																																															z-index: 1000;
																																																																																																																																																																																																																																																															box-shadow: 0 0 20px rgba(0,0,0,0.3);
																																																																																																																																																																																																																																																															border-radius: 10px;
																																																																																																																																																																																																																																																														}

																																																																																																																																																																																																																																																														.panel2.open {
																																																																																																																																																																																																																																																															display: block;
																																																																																																																																																																																																																																																														} */
	</style>

	</html>

@endsection