<div class="d-flex" style="justify-content: flex-end;">
    <div class="pivot-tabs1" style="width: 20%;">
        <button class="pivot-tab1 active" data-target="test1">Heat Map</button>
        <button class="pivot-tab1" data-target="test2">Statistics</button>
    </div>

</div>
<div class="pivot-content1">
    <div class="pivot-panel1 active" id="test1">
        <div class="content" style="    display: flex;justify-content: space-between;">
            <section style="width: 48%;" class="RiskSections">
                <div class="chart"
                    style="background: white; padding: 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    <h3 style="margin-top: 0; color: #333;">Overall Inherent Risk Heat Map</h3>
                    <p style="font-size: 12px; color: #666; margin-bottom: 15px;">Based on Risk Rating & Risk Priority
                    </p>

                    <table class="heatmap" style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                        <thead>
                            <tr>
                                <th
                                    style="width: 50px; height: 60px; position: relative; background: #f5f5f5; border: 1px solid #ddd;">
                                    <div
                                        style="transform: rotate(-45deg); transform-origin: left bottom; position: absolute; bottom: 15px; left: 50%; white-space: nowrap; font-size: 12px;">
                                        Severity →<br>Likelihood ↓
                                    </div>
                                </th>
                                @for($i = 1; $i <= 5; $i++)
                                    <th
                                        style="background: #f5f5f5; border: 1px solid #ddd; padding: 8px; font-weight: bold;">
                                        {{ $i }}
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @for($severity = 5; $severity >= 1; $severity--)
                                <tr>
                                    <th
                                        style="background: #f5f5f5; border: 1px solid #ddd; padding: 8px; font-weight: bold; text-align: center;">
                                        {{ $severity }}
                                    </th>
                                    @for($likelihood = 1; $likelihood <= 5; $likelihood++)
                                        @php
                                            $cell = $heatMapData['heatMapData'][$severity][$likelihood] ?? [
                                                'count' => 0,
                                                'rating' => $severity * $likelihood,
                                                'css_class' => 'empty'
                                            ];
                                        @endphp

                                        <td class="{{ $cell['css_class'] }}"
                                            style="border: 1px solid #ddd; padding: 8px; text-align: center; cursor: pointer; position: relative;"
                                            data-rating="{{ $cell['rating'] }}" data-severity="{{ $severity }}"
                                            data-likelihood="{{ $likelihood }}"
                                            onclick="filterRiskLog('initial', {{ $severity }}, {{ $likelihood }}, {{ $cell['rating'] }})">
                                            {{ $cell['count'] }}
                                            <div class="rating-tooltip"
                                                style="position: absolute; top: -25px; left: 50%; transform: translateX(-50%); background: #333; color: white; padding: 2px 5px; border-radius: 3px; font-size: 10px; opacity: 0; transition: opacity 0.2s; pointer-events: none;">
                                                Rating: {{ $cell['rating'] }}
                                            </div>
                                        </td>
                                        <!-- <td class="{{ $cell['css_class'] }}" title="Rating: {{ $cell['rating'] }}"
                                                                                                                                                                                                                                                                                                                            onclick="filterRiskLog('initial', {{ $severity }}, {{ $likelihood }}, {{ $cell['rating'] }})">
                                                                                                                                                                                                                                                                                                                            {{ $cell['count'] }}
                                                                                                                                                                                                                                                                                                                        </td> -->
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                    <!-- Rating Counts -->
                    <div style="margin-top: 20px;">
                        <h4 style="font-size: 14px; margin-bottom: 10px; color: #333;">Risk Rating Counts:</h4>
                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                            @foreach($heatMapData['ratingCounts'] as $rating => $count)
                                @if($count > 0)
                                    <span class="badge bg-light text-dark">
                                        {{ $rating }}: {{ $count }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Legend -->
                    <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
                        <h4 style="font-size: 14px; margin-bottom: 10px; color: #333;">Risk Priority Legend:</h4>
                        <div style="display: flex; gap: 15px; font-size: 12px;">
                            <div style="display: flex; align-items: center;">
                                <div
                                    style="width: 15px; height: 15px; margin-right: 5px; background: #d4edda; border: 1px solid #c3e6cb;">
                                </div>
                                Low (1-5)
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div
                                    style="width: 15px; height: 15px; margin-right: 5px; background: #fff3cd; border: 1px solid #ffeeba;">
                                </div>
                                Medium (6-16)
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div
                                    style="width: 15px; height: 15px; margin-right: 5px; background: #f8d7da; border: 1px solid #f5c6cb;">
                                </div>
                                High (17-25)
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Residual Risk Heatmap -->
            <section style="width: 48%;" class="RiskSections">
                <div class="chart"
                    style="background: white; padding: 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    <h3 style="margin-top: 0; color: #333;">Overall Residual Risk Heat Map</h3>
                    <p style="font-size: 12px; color: #666; margin-bottom: 15px;">Based on Residual Risk Rating &
                        Priority</p>

                    <table class="heatmap" style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                        <thead>
                            <tr>
                                <th
                                    style="width: 50px; height: 60px; position: relative; background: #f5f5f5; border: 1px solid #ddd;">
                                    <div
                                        style="transform: rotate(-45deg); transform-origin: left bottom; position: absolute; bottom: 15px; left: 50%; white-space: nowrap; font-size: 12px;">
                                        Severity →<br>Likelihood ↓
                                    </div>
                                </th>
                                @for($i = 1; $i <= 5; $i++)
                                    <th
                                        style="background: #f5f5f5; border: 1px solid #ddd; padding: 8px; font-weight: bold;">
                                        {{ $i }}
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @for($severity = 5; $severity >= 1; $severity--)
                                <tr>
                                    <th
                                        style="background: #f5f5f5; border: 1px solid #ddd; padding: 8px; font-weight: bold; text-align: center;">
                                        {{ $severity }}
                                    </th>
                                    @for($likelihood = 1; $likelihood <= 5; $likelihood++)
                                        @php
                                            $cell = $residualHeatMapData['heatMapData'][$severity][$likelihood] ?? [
                                                'count' => 0,
                                                'rating' => $severity * $likelihood,
                                                'css_class' => 'empty'
                                            ];
                                        @endphp
                                        <td class="{{ $cell['css_class'] }}"
                                            style="border: 1px solid #ddd; padding: 8px; text-align: center; cursor: pointer; position: relative;"
                                            data-rating="{{ $cell['rating'] }}" data-severity="{{ $severity }}"
                                            data-likelihood="{{ $likelihood }}"
                                            onclick="filterRiskLog('residual', {{ $severity }}, {{ $likelihood }}, {{ $cell['rating'] }})">

                                            {{ $cell['count'] }}
                                            <div class="rating-tooltip"
                                                style="position: absolute; top: -25px; left: 50%; transform: translateX(-50%); background: #333; color: white; padding: 2px 5px; border-radius: 3px; font-size: 10px; opacity: 0; transition: opacity 0.2s; pointer-events: none;">
                                                Rating: {{ $cell['rating'] }}
                                            </div>
                                        </td>

                                        <!-- <td class="{{ $cell['css_class'] }}" title="Rating: {{ $cell['rating'] }}"
                                                                                                                                                                                                                                                                                                            onclick="filterRiskLog('residual', {{ $severity }}, {{ $likelihood }}, {{ $cell['rating'] }})">
                                                                                                                                                                                                                                                                                                            {{ $cell['count'] }}
                                                                                                                                                                                                                                                                                                        </td> -->

                                    @endfor
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                    <!-- Rating Counts -->
                    <div style="margin-top: 20px;">
                        <h4 style="font-size: 14px; margin-bottom: 10px; color: #333;">Residual Risk Rating Counts:</h4>
                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                            @foreach($residualHeatMapData['ratingCounts'] as $rating => $count)
                                @if($count > 0)
                                    <div style="background: #f5f5f5; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                                        <strong>{{ $rating }}:</strong> {{ $count }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Legend -->
                    <div style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
                        <h4 style="font-size: 14px; margin-bottom: 10px; color: #333;">Residual Risk Priority Legend:
                        </h4>
                        <div style="display: flex; gap: 15px; font-size: 12px;">
                            <div style="display: flex; align-items: center;">
                                <div
                                    style="width: 15px; height: 15px; margin-right: 5px; background: #d4edda; border: 1px solid #c3e6cb;">
                                </div>
                                Low (1-5)
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div
                                    style="width: 15px; height: 15px; margin-right: 5px; background: #fff3cd; border: 1px solid #ffeeba;">
                                </div>
                                Medium (6-15)
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div
                                    style="width: 15px; height: 15px; margin-right: 5px; background: #f8d7da; border: 1px solid #f5c6cb;">
                                </div>
                                High (16-25)
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                function filterRiskLog(type, severity, likelihood, rating) {
                    let url = '/risk/risk-log-filter?';

                    if (type === 'initial') {
                        url += `severity=${severity}&likelihood=${likelihood}&rating=${rating}`;
                    } else {
                        url += `residual_severity=${severity}&residual_likelihood=${likelihood}&residual_rating=${rating}`;
                    }

                    window.location.href = url;
                }

                // Add hover effect for tooltips
                document.querySelectorAll('.heatmap td').forEach(td => {
                    td.addEventListener('mouseenter', function () {
                        this.querySelector('.rating-tooltip').style.opacity = '1';
                    });
                    td.addEventListener('mouseleave', function () {
                        this.querySelector('.rating-tooltip').style.opacity = '0';
                    });
                });
            </script>

            <style>
                .heatmap {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 15px;
                }

                .heatmap th,
                .heatmap td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: center;
                }

                .heatmap th {
                    background-color: #f2f2f2;
                    font-weight: bold;
                }

                .diagonal-header {
                    position: relative;
                    height: 80px;
                    width: 50px;
                }

                .diagonal-header div {
                    transform: rotate(-45deg);
                    transform-origin: left bottom;
                    position: absolute;
                    bottom: 0;
                    left: 50%;
                    white-space: nowrap;
                }

                .low-risk {
                    background-color: #d4edda;
                    /* Green */
                }

                .medium-risk {
                    background-color: #fff3cd;
                    /* Yellow */
                }

                .high-risk {
                    background-color: #f8d7da;
                    /* Red */
                }

                .heatmap td {
                    position: relative;
                    cursor: pointer;
                    transition: all 0.2s;
                }

                .heatmap td:hover {
                    transform: scale(1.1);
                    z-index: 10;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                }

                .heatmap td::after {
                    content: attr(data-rating);
                    position: absolute;
                    top: -25px;
                    left: 50%;
                    transform: translateX(-50%);
                    background: #333;
                    color: white;
                    padding: 2px 5px;
                    border-radius: 3px;
                    font-size: 10px;
                    opacity: 0;
                    transition: opacity 0.2s;
                }

                .heatmap td:hover::after {
                    opacity: 1;
                }

                .legend-item {
                    display: inline-flex;
                    align-items: center;
                    margin-right: 10px;
                }
            </style>

        </div>
        <section style="width: 100%;" class="RiskSections">
            <h2>Risk Mitigation Progress</h2>
            <div class="table-responsive" style="padding-right: 1rem;">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Risk Name</th>
                            <th>Responsible</th>
                            <th>Risk Priority</th>
                            <th>Type of Control Measure</th>
                            <th>Progress</th>
                            <th>Risk Control Status</th>
                        </tr>
                    </thead>
                    <tbody id="risk-table-body">
                       
                        @foreach ($data22 as $risk)
                        
                            <tr>
                                <td>{{ $risk->riskName }}</td>
                                <td>{{ $risk->responsible }}</td>
                                <td>{{ $risk->residual_risk_priority }}</td>
                                <td>{{$risk->control_measure_type}}</td>
                                <td>{{ $risk->progress }}%</td>
                                <td>{{ $risk->control_status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $data22->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </section>

        <script>
          $(document).ready(function () {
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let labId = '{{ $labId }}'; // You may need to pass this dynamically if it's user-selected

        $.ajax({
            url: url + '&lab_id=' + labId, // append lab_id to the URL
            type: 'GET',
            success: function (data) {
                $('#risk-table-body').html($(data).find('#risk-table-body').html());
                $('.pagination').html($(data).find('.pagination').html());
            }
        });
    });
});

        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <div>
            <h2 style="margin: 1rem 0;padding: 1rem .5rem;transform:none; box-shadow:none" class="cardStyle">Risk
                Category Based Heat Map</h2>
            <div style="display: flex;flex-wrap: wrap;">


                <div class=" col-md-5 chart mb-4 mt-4 cardStyle">
                    <h3>Material Risk</h3>
                    <table class="heatmap">
                        <thead>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Severity</div>
                                </th>
                                <th rowspan="2">1</th>
                                <th rowspan="2">2</th>
                                <th rowspan="2">3</th>
                                <th rowspan="2">4</th>
                                <th rowspan="2">5</th>
                            </tr>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Likelihood</div>
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <th>5</th>
                                <td class="medium" style="cursor: pointer;"><span
                                        onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">1</span></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">9</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'"> 5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">11</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">8</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                            <tr>
                                <th>1</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="  col-md-5 chart mb-4 mt-4 cardStyle">
                    <h3>Human Resource Risk</h3>
                    <table class="heatmap">
                        <thead>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Severity</div>
                                </th>
                                <th rowspan="2">1</th>
                                <th rowspan="2">2</th>
                                <th rowspan="2">3</th>
                                <th rowspan="2">4</th>
                                <th rowspan="2">5</th>
                            </tr>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Likelihood</div>
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <th>5</th>
                                <td class="medium" style="cursor: pointer;"><span
                                        onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">1</span></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">9</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'"> 5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">11</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">8</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                            <tr>
                                <th>1</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class=" col-md-5 chart mb-4 mt-4 cardStyle">
                    <h3>Equipment Risk</h3>
                    <table class="heatmap">
                        <thead>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Severity</div>
                                </th>
                                <th rowspan="2">1</th>
                                <th rowspan="2">2</th>
                                <th rowspan="2">3</th>
                                <th rowspan="2">4</th>
                                <th rowspan="2">5</th>
                            </tr>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Likelihood</div>
                                </th>
                            </tr>

                        </thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th>5</th>
                                <td class="medium" style="cursor: pointer;"><span
                                        onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">1</span></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">9</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'"> 5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">11</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">8</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                            <tr>
                                <th>1</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class=" col-md-5 chart mb-4 mt-4 cardStyle">
                    <h3>Environment Risk</h3>
                    <table class="heatmap">
                        <thead>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Severity</div>
                                </th>
                                <th rowspan="2">1</th>
                                <th rowspan="2">2</th>
                                <th rowspan="2">3</th>
                                <th rowspan="2">4</th>
                                <th rowspan="2">5</th>
                            </tr>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Likelihood</div>
                                </th>
                            </tr>

                        </thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th>5</th>
                                <td class="medium" style="cursor: pointer;"><span
                                        onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">1</span></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">9</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'"> 5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">11</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">8</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                            <tr>
                                <th>1</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class=" col-md-5 chart mb-4 mt-4 cardStyle">
                    <h3>Information Technology Risk</h3>
                    <table class="heatmap">
                        <thead>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Severity</div>
                                </th>
                                <th rowspan="2">1</th>
                                <th rowspan="2">2</th>
                                <th rowspan="2">3</th>
                                <th rowspan="2">4</th>
                                <th rowspan="2">5</th>
                            </tr>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Likelihood</div>
                                </th>
                            </tr>

                        </thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th>5</th>
                                <td class="medium" style="cursor: pointer;"><span
                                        onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">1</span></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">9</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'"> 5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">11</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">8</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                            <tr>
                                <th>1</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- <div class=" col-md-5 chart mb-4 mt-4 cardStyle">
                    <h3>Pre Examination Risk</h3>
                    <table class="heatmap">
                        <thead>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Severity</div>
                                </th>
                                <th rowspan="2">1</th>
                                <th rowspan="2">2</th>
                                <th rowspan="2">3</th>
                                <th rowspan="2">4</th>
                                <th rowspan="2">5</th>
                            </tr>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Likelihood</div>
                                </th>
                            </tr>

                        </thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th>5</th>
                                <td class="medium" style="cursor: pointer;"><span
                                        onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">1</span></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">9</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'"> 5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">11</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">8</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                            <tr>
                                <th>1</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div> -->

                <!-- <div class=" col-md-5 chart mb-4 mt-4 cardStyle">
                    <h3>Examination Risk</h3>
                    <table class="heatmap">
                        <thead>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Severity</div>
                                </th>
                                <th rowspan="2">1</th>
                                <th rowspan="2">2</th>
                                <th rowspan="2">3</th>
                                <th rowspan="2">4</th>
                                <th rowspan="2">5</th>
                            </tr>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Likelihood</div>
                                </th>
                            </tr>

                        </thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th>5</th>
                                <td class="medium" style="cursor: pointer;"><span
                                        onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">1</span></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">9</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'"> 5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">11</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">8</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                            <tr>
                                <th>1</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div> -->

                <!-- <div class=" col-md-5 chart mb-4 mt-4 cardStyle">
                    <h3>Post Examination Risk</h3>
                    <table class="heatmap">
                        <thead>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Severity</div>
                                </th>
                                <th rowspan="2">1</th>
                                <th rowspan="2">2</th>
                                <th rowspan="2">3</th>
                                <th rowspan="2">4</th>
                                <th rowspan="2">5</th>
                            </tr>
                            <tr>
                                <th class="diagonal-header">
                                    <div>Likelihood</div>
                                </th>
                            </tr>

                        </thead>
                        </thead>
                        <tbody>
                            <tr>
                                <th>5</th>
                                <td class="medium" style="cursor: pointer;"><span
                                        onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">1</span></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">9</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'"> 5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="critical"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">11</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">7</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">5</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="high"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">8</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">6</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="hmedium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                            <tr>
                                <th>1</th>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">4</span></td>
                                <td class="low"><span onclick="window.location.href='/risk/risk-log'">3</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">2</span></td>
                                <td class="medium"><span onclick="window.location.href='/risk/risk-log'">1</span></td>

                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
    </div>
    <div class="pivot-panel1" id="test2">
        <div class="dashboard1">
            <div class="card">
                <h3>Risk Treatment Overview</h3>
                <p class="info">
                    Completed
                    <i class="fas fa-check-circle"></i>
                    <strong>70.0%</strong>
                </p>
                <p class="info">
                    Ongoing Activities
                    <i class="fas fa-tasks"></i>
                    <strong>5</strong>
                </p>
            </div>
            <div class="card">
                <h3>Controls Implementation</h3>
                <p class="info">
                    Implemented
                    <i class="fas fa-shield-alt"></i>
                    <strong>76.9%</strong>
                </p>
                <p class="info">
                    Not Implemented
                    <i class="fas fa-times-circle"></i>
                    <strong>3</strong>
                </p>
            </div>
        </div>


        <div class="dashboard">
            <div class="card">
                <h3>Off Track Activities</h3>
                <table>
                    <tr>
                        <th>Task</th>
                        <th>Responsible</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Progress</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>Implement AI Screening</td>
                        <td>John Peterson</td>
                        <td>Jan 1,2025</td>
                        <td>Jan 31,2025</td>
                        <td>30%</td>
                        <td><span class="status-icon">&#9888;</span> </td>

                    </tr>
                    <tr>
                        <td>Geographical Data Expansion</td>
                        <td>Lisa Brown</td>
                        <td>Jan 1,2025</td>
                        <td>Jan 31,2025</td>
                        <td>30%</td>
                        <td><span class="status-icon">&#9888;</span> </td>
                    </tr>
                </table>
            </div>
            <div class="card">
                <h3>On Track Activities</h3>
                <table>
                    <tr>
                        <th>Task</th>
                        <th>Responsible</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Progress</th>
                        <!-- <th>Status</th> -->
                    </tr>
                    <tr>
                        <td>Automated Isolation Protocols</td>
                        <td>Clara Smith</td>
                        <td>Jan 1,2025</td>
                        <td>Jan 31,2025</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" style="width: 80%;"></div>
                            </div> 80%
                        </td>
                    </tr>
                    <tr>
                        <td>Customer Outreach Program</td>
                        <td>Mike Johnson</td>
                        <td>Jan 1,2025</td>
                        <td>Jan 31,2025</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" style="width: 90%;"></div>
                            </div> 90%
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="dashboard">
            <div class="card">
                <h3>Not Implemented / Findings</h3>
                <table>
                    <tr>
                        <th>Measure </th>
                        <th>Measure Type</th>
                        <th>Responsible</th>
                        <th>Implemented</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>Corporate Risk Management Process</td>
                        <td>Process</td>
                        <td>David Cole</td>
                        <td></td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>Access Review</td>
                        <td>Policy</td>
                        <td>Chris Kartel</td>
                        <td></td>
                        <td>Pending</td>
                    </tr>
                </table>
            </div>
            <div class="card">
                <h3>Controls</h3>
                <table>
                    <tr>
                        <th>Measure </th>
                        <th>Measure Type</th>
                        <th>Responsible</th>
                        <th>Implemented</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>Policy for Business Continuity</td>
                        <td>Policy </td>
                        <td>Clara Smith</td>
                        <td>Yes</td>
                        <td>Implemented</td>
                    </tr>
                    <tr>
                        <td>Customer Payment Procedures</td>
                        <td>Supporting document</td>
                        <td>David Holmes</td>
                        <td>Yes</td>
                        <td>Implemented</td>
                    </tr>
                </table>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll(".progress-bar").forEach(bar => {
                    bar.style.width = bar.style.width;
                });
            });
        </script>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const hash = window.location.hash;

    if (hash) {
        // Hide all panels first
        const panels = document.querySelectorAll('.pivot-panel');
        panels.forEach(panel => panel.style.display = 'none');

        // Show the one from hash
        const activePanel = document.querySelector(hash);
        if (activePanel) {
            activePanel.style.display = 'block';
            // Scroll to it (optional)
            activePanel.scrollIntoView({ behavior: 'smooth' });
        }
    }
});
</script>