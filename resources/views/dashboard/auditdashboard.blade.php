<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .auditdash-dashboard {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .auditdash-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1 1 calc(33.333% - 40px);
            min-width: 300px;
        }

        .auditdash-h2 {
            margin-top: 0;
            font-size: 1.5em;
            color: #333;
        }

        .auditdash-chart-container {
            margin-top: 20px;
        }

        .auditdash-donut-chart {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: conic-gradient(#4CAF50 0% 40%,
                    #FFC107 40% 50%,
                    #FF5722 50% 90%,
                    #9C27B0 90% 100%);
            margin: 0 auto;
            position: relative;
        }

        .auditdash-donut-chart::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
        }

        .auditdash-legend {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
            gap: 10px;
        }

        .auditdash-legend-item {
            display: flex;
            align-items: center;
            font-size: 12px;
        }

        .auditdash-legend-color {
            width: 12px;
            height: 12px;
            margin-right: 5px;
            border-radius: 2px;
        }

        .auditdash-bar-chart {
            display: flex;
            align-items: flex-end;
            gap: 10px;
            height: 200px;
            padding: 10px;
        }

        .auditdash-bar {
            flex: 1;
            background-color: #4CAF50;
            border-radius: 3px 3px 0 0;
            position: relative;
        }

        .auditdash-bar-label {
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            text-align: center;
        }

        .auditdash-bar-value {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div style="align-content: flex-end">
        <!-- Date Input -->
        <input style="width: 200px" type="month" class="form-control" id="auditdash_dateInput">

        <!-- Table -->
        <div class="table-responsive" id="auditdash_auditTable" style="display: none;">
            <table class="stock-planner-table">
                <thead>
                    <tr>
                        <th>QI. No.</th>
                        <th>Audit Location</th>
                        <th>Scheduled Audit Date</th>
                        <th>Type of Audit</th>
                        <th>No of N/C's</th>
                        <th>Audit Cycle Closure Status</th>
                        <th>Audit Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>5</td>
                        <td style="color: #36C;cursor: pointer;text-decoration: underline;" class="clickable-location">
                            test
                        </td>
                        <td>2025-02-25</td>
                        <td>NABL Audit</td>
                        <td>---</td>
                        <td>---</td>
                        <td>Ongoing</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td style="color: #36C;cursor: pointer;text-decoration: underline;" class="clickable-location">
                            mumbhai
                        </td>
                        <td>2025-02-21</td>
                        <td>External Audit</td>
                        <td>---</td>
                        <td>---</td>
                        <td>Ongoing</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td style="color: #36C;cursor: pointer;text-decoration: underline;" class="clickable-location">
                            hyderabad
                        </td>
                        <td>2025-02-03</td>
                        <td>External Audit</td>
                        <td>---</td>
                        <td>---</td>
                        <td>Scheduled</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td style="color: #36C;cursor: pointer;text-decoration: underline;" class="clickable-location">
                            banglore
                        </td>
                        <td>2025-02-21</td>
                        <td>External Audit</td>
                        <td>---</td>
                        <td>---</td>
                        <td>Scheduled</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td style="color: #36C;cursor: pointer;text-decoration: underline;" class="clickable-location">
                            hyderbad
                        </td>
                        <td>2025-02-20</td>
                        <td>Internal Audit</td>
                        <td>---</td>
                        <td>---</td>
                        <td>Ongoing</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Dashboard -->
    <div id="auditdash_auditDashboard" style="display: none;">
        <button type="button" class="btn btn-info" style="margin: 1rem;color:white"
            onclick="auditdash_goback()">Back</button><br>
        <div class="auditdash-dashboard">
            <!-- By Status Section -->
            <div class="auditdash-card">
                <h2 class="auditdash-h2">By NC Status</h2>
                <div class="auditdash-chart-container">
                    <div class="auditdash-donut-chart" id="statusChart"></div>
                    <div class="auditdash-legend" id="statusLegend"></div>
                </div>
            </div>

            <!-- By Priority Section -->
            <div class="auditdash-card">
                <h2 class="auditdash-h2">By NC Classification</h2>
                <div class="auditdash-chart-container">
                    <div class="auditdash-donut-chart" id="priorityChart"></div>
                    <div class="auditdash-legend" id="priorityLegend"></div>
                </div>
            </div>

            <!-- By Business Unit Section -->
            <div class="auditdash-card">
                <h2 class="auditdash-h2">Audit Score By Department</h2>
                <div class="auditdash-chart-container">
                    <div class="auditdash-bar-chart" id="businessUnitChart"></div>
                </div>
            </div>
        </div>

    </div>
    <script>
        // Wait for the DOM to load
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('auditdash_dateInput');
            const auditTable = document.getElementById('auditdash_auditTable');
            const auditDashboard = document.getElementById('auditdash_auditDashboard');
            const clickableLocations = document.querySelectorAll('.clickable-location');

            // Show table when a date is selected
            dateInput.addEventListener('change', function() {
                auditTable.style.display = 'block';
            });

            // Replace table with dashboard when a location is clicked
            clickableLocations.forEach(location => {
                location.addEventListener('click', function() {
                    auditTable.style.display = 'none';
                    auditDashboard.style.display = 'block';
                });
            });
        });

        function auditdash_goback() {
            const auditTable = document.getElementById('auditdash_auditTable');
            const auditDashboard = document.getElementById('auditdash_auditDashboard');
            auditTable.style.display = 'block';
            auditDashboard.style.display = 'none';
        }
        // Data for the dashboard
        const auditdash_dashboardData = {
            byStatus: [{
                    label: "Completed",
                    percentage: 40,
                    color: "#4CAF50"
                },
                {
                    label: "On Hold",
                    percentage: 10,
                    color: "#FFC107"
                },
                {
                    label: "Open",
                    percentage: 10,
                    color: "#FF5722"
                },
                {
                    label: "In Progress",
                    percentage: 40,
                    color: "#9C27B0"
                }
            ],
            byPriority: [{
                    label: "Major",
                    percentage: 40,
                    color: "#4CAF50"
                },
                {
                    label: "Minor",
                    percentage: 30,
                    color: "#FFC107"
                },
                {
                    label: "Observations",
                    percentage: 30,
                    color: "#FF5722"
                },

            ],
            byBusinessUnit: [{
                    label: "Product Sales",
                    value: 4
                },
                {
                    label: "IT",
                    value: 6
                },
                {
                    label: "Marketing",
                    value: 3
                },
                {
                    label: "Quality Control",
                    value: 5
                },
                {
                    label: "Purchasing",
                    value: 2
                },
                {
                    label: "Trading",
                    value: 7
                },
                {
                    label: "Product Management",
                    value: 4
                }
            ]
        };

        // Function to update the "By Status" donut chart
        function auditdash_updateStatusChart() {
            const statusChart = document.getElementById('statusChart');
            const statusLegend = document.getElementById('statusLegend');
            const data = auditdash_dashboardData.byStatus;

            // Update donut chart
            let cumulativePercentage = 0;
            const gradientValues = data.map(item => {
                const start = cumulativePercentage;
                cumulativePercentage += item.percentage;
                const end = cumulativePercentage;
                return `${item.color} ${start}% ${end}%`;
            }).join(', ');
            statusChart.style.background = `conic-gradient(${gradientValues})`;

            // Update legend
            statusLegend.innerHTML = data.map(item => `
                <div class="auditdash-legend-item">
                    <div class="auditdash-legend-color" style="background-color: ${item.color};"></div>
                    <span>${item.label} (${item.percentage}%)</span>
                </div>
            `).join('');
        }

        // Function to update the "By Priority" bar chart
        function auditdash_updatePriorityChart() {
            const statusChart = document.getElementById('priorityChart');
            const statusLegend = document.getElementById('priorityLegend');
            const data = auditdash_dashboardData.byPriority;

            // Update donut chart
            let cumulativePercentage = 0;
            const gradientValues = data.map(item => {
                const start = cumulativePercentage;
                cumulativePercentage += item.percentage;
                const end = cumulativePercentage;
                return `${item.color} ${start}% ${end}%`;
            }).join(', ');
            statusChart.style.background = `conic-gradient(${gradientValues})`;

            // Update legend
            statusLegend.innerHTML = data.map(item => `
                <div class="auditdash-legend-item">
                    <div class="auditdash-legend-color" style="background-color: ${item.color};"></div>
                    <span>${item.label} (${item.percentage}%)</span>
                </div>
            `).join('');
        }

        // Function to update the "By Business Unit" bar chart
        function auditdash_updateBusinessUnitChart() {
            const businessUnitChart = document.getElementById('businessUnitChart');
            const data = auditdash_dashboardData.byBusinessUnit;

            // Clear existing bars
            businessUnitChart.innerHTML = '';

            // Find the max value for scaling
            const maxValue = Math.max(...data.map(item => item.value));

            // Add bars
            data.forEach(item => {
                const barHeight = (item.value / maxValue) * 100;
                const bar = document.createElement('div');
                bar.className = 'auditdash-bar';
                bar.style.height = `${barHeight}%`;
                bar.innerHTML = `
                    <div class="auditdash-bar-value">${item.value}</div>
                    <div class="auditdash-bar-label">${item.label}</div>
                `;
                businessUnitChart.appendChild(bar);
            });
        }

        // Initialize the dashboard
        function auditdash_initDashboard() {
            debugger
            auditdash_updateStatusChart();
            auditdash_updatePriorityChart();
            auditdash_updateBusinessUnitChart();
        }

        // Run the dashboard on page load
        document.addEventListener('DOMContentLoaded', auditdash_initDashboard);
    </script>
</body>

</html>
