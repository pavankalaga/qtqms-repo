<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Management Training Dashboard</title>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        
        h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: normal;
        } */

        .training-description {
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.4;
        }

        .training-dashboard {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .training-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .training-metrics {
            display: flex;
            width: 100%;
            margin-bottom: 15px;
        }

        .training-metric {
            flex: 1;
            text-align: center;
            padding: 20px 10px;
            background-color: #677761;
            color: white;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .training-metric:last-child {
            border-right: none;
        }

        .training-metric .value {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .training-metric .label {
            font-size: 14px;
        }

        .training-icon-row {
            display: flex;
            margin-bottom: 15px;
        }

        .training-icon-container {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .training-icon {
            width: 60px;
            height: 60px;
            background-color: #f0ad4e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: white;
        }

        .training-chart-container {
            flex: 1;
            min-width: 300px;
            padding: 15px;
        }

        .training-chart-title {
            font-size: 16px;
            margin-bottom: 15px;
            color: #555;
            text-align: center;
        }

        .training-donut-chart {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            position: relative;
            border-radius: 50%;
            /* background: conic-gradient(#677761 0% 50%,
                    #d6b656 50% 70%,
                    #f0ad4e 70% 100%); */
        }

        .training-donut-chart::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            background-color: white;
            border-radius: 50%;
        }

        .training-provider-chart {
            /* background: conic-gradient(#677761 0% 30%,
                    #d6b656 30% 60%,
                    #f0ad4e 60% 100%); */
        }

        .training-chart-legend {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 15px;
            gap: 10px;
        }

        .training-legend-item {
            display: flex;
            align-items: center;
            font-size: 12px;
        }

        .training-legend-color {
            width: 12px;
            height: 12px;
            margin-right: 5px;
            border-radius: 2px;
        }

        .training-bar-chart {
            height: 200px;
            display: flex;
            align-items: flex-end;
            padding-top: 10px;
            justify-content: space-around;
        }

        .training-bar {
            width: 30px;
            background-color: #f0ad4e;
            margin: 0 5px;
            border-radius: 3px 3px 0 0;
            position: relative;
        }

        .training-bar-label {
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 12px;
            width: 60px;
        }

        .training-bar-value {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
        }

        .training-horizontal-bar-chart {
            margin-top: 30px;
        }

        .training-h-bar-container {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .training-h-bar-label {
            width: 150px;
            text-align: right;
            padding-right: 10px;
            font-size: 14px;
        }

        .training-h-bar-wrapper {
            flex: 1;
            background-color: #f0f0f0;
            height: 20px;
            border-radius: 3px;
            position: relative;
        }

        .training-h-bar {
            height: 100%;
            background-color: #f0ad4e;
            border-radius: 3px;
        }

        .training-h-bar-value {
            position: absolute;
            right: -30px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
        }

        .training-department-spend .training-h-bar {
            background-color: #677761;
        }

        .training-department-spend .training-h-bar-value {
            right: -50px;
        }

        .training-budget-summary {
            display: flex;
            padding: 15px;
            text-align: center;
        }

        .training-budget-item {
            flex: 1;
        }

        .training-budget-value {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .training-budget-label {
            font-size: 14px;
        }

        .training-budget-total {
            color: #f0ad4e;
        }

        .training-budget-spent {
            color: #d43f3a;
        }

        .training-budget-remaining {
            color: #5cb85c;
        }

        .training-gauge-chart {
            width: 200px;
            height: 100px;
            margin: 30px auto;
            position: relative;
            overflow: hidden;
        }

        .training-gauge-background {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 20px solid #e0e0e0;
            border-bottom-color: transparent;
            border-left-color: transparent;
            transform: rotate(45deg);
            box-sizing: border-box;
        }

        .training-gauge-fill {
            position: absolute;
            top: 0;
            left: 0;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 20px solid #677761;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: transparent;
            transform: rotate(45deg);
            box-sizing: border-box;
        }

        .training-gauge-center {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: bold;
        }

        .training-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .training-tech-definition {
            margin-top: 15px;
            padding: 10px;
            font-size: 12px;
            color: #666;
        }

        .training-tech-term {
            font-weight: bold;
        }

        @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@400;600;700&display=swap');

        /* .training-metrics-container {
    display: flex;
    gap: 2rem;
    justify-content: center;
    margin-top: 20px;
    flex-wrap: wrap;
}

.training-metric {
    text-align: center;
    font-family: 'Sarabun', sans-serif;
    background-color: #f7f7f7;
    padding: 20px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    min-width: 180px;
} */

        .value1 {
            font-size: 36px;
            font-weight: 700;
            color: rgb(251, 253, 255);
        }

        /* .training-metric .label {
    font-size: 16px;
    font-weight: 600;
    color: #555;
    margin-top: 6px;
} */
    </style>
</head>

<body>


    <div class="training-icon-row">
        <div class="training-icon-container">
            <div class="training-icon">
                <i>🏢</i>
            </div>
        </div>
        <div class="training-icon-container">
            <div class="training-icon">
                <i>⏱️</i>
            </div>
        </div>
        <div class="training-icon-container">
            <div class="training-icon">
                <i>💰</i>
            </div>
        </div>
    </div>

    <div class="training-metrics">
        <div class="training-metric">
            <div class="value1">96</div>
            <div class="label">Total Trainings</div>
        </div>
        <div class="training-metric">
            <div class="value1">1,643</div>
            <div class="label">Total Training Hours</div>
        </div>
        <div class="training-metric">
            <div class="value1"><span class="rupee-symbol">₹</span>3,92,415</div>
            <div class="label">Total Spends</div>

        </div>
    </div>

    <div class="training-dashboard">
        <div class="training-card training-chart-container">
            <div class="training-chart-title">Training by status</div>
            <div class="training-donut-chart"></div>
            <div class="training-chart-legend">
                <div class="training-legend-item">
                    <div class="training-legend-color" style="background-color: #677761;"></div>
                    <span>Scheduled 50%</span>
                </div>
                <div class="training-legend-item">
                    <div class="training-legend-color" style="background-color: #d6b656;"></div>
                    <span>Complete 20%</span>
                </div>
                <div class="training-legend-item">
                    <div class="training-legend-color" style="background-color: #f0ad4e;"></div>
                    <span>In progress 30%</span>
                </div>
            </div>
        </div>

        <div class="training-card training-chart-container">
            <div class="training-chart-title">Training by provider</div>
            <div class="training-donut-chart training-provider-chart"></div>
            <div class="training-chart-legend">
                <div class="training-legend-item">
                    <div class="training-legend-color" style="background-color: #677761;"></div>
                    <span>Internal 30%</span>
                </div>
                <div class="training-legend-item">
                    <div class="training-legend-color" style="background-color: #d6b656;"></div>
                    <span>External 30%</span>
                </div>
                <div class="training-legend-item">
                    <div class="training-legend-color" style="background-color: #f0ad4e;"></div>
                    <span>Online 40%</span>
                </div>
            </div>
        </div>

        <div class="training-card training-chart-container">
            <div class="training-chart-title">Trainings by Department</div>
            <div class="training-bar-chart">
                <div class="training-bar" style="height: 180px;">
                    <div class="training-bar-value">5</div>
                    <div class="training-bar-label">IT</div>
                </div>
                <div class="training-bar" style="height: 144px;">
                    <div class="training-bar-value">4</div>
                    <div class="training-bar-label">HR</div>
                </div>
                <div class="training-bar" style="height: 108px;">
                    <div class="training-bar-value">3</div>
                    <div class="training-bar-label">Marketing</div>
                </div>
                <div class="training-bar" style="height: 72px;">
                    <div class="training-bar-value">2</div>
                    <div class="training-bar-label">PR</div>
                </div>
                <div class="training-bar" style="height: 72px;">
                    <div class="training-bar-value">2</div>
                    <div class="training-bar-label">Communication</div>
                </div>
                <div class="training-bar" style="height: 72px;">
                    <div class="training-bar-value">2</div>
                    <div class="training-bar-label">Management</div>
                </div>
            </div>
        </div>

        <div class="training-card training-chart-container">
            <div class="training-chart-title">Top Training</div>
            <div class="training-horizontal-bar-chart">
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">Presentation skills</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 80%;"></div>
                    </div>
                    <div class="training-h-bar-value">8</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">Microsoft Word</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 70%;"></div>
                    </div>
                    <div class="training-h-bar-value">7</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">Project Management Intro</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 60%;"></div>
                    </div>
                    <div class="training-h-bar-value">6</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">Javascript for beginners</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 50%;"></div>
                    </div>
                    <div class="training-h-bar-value">5</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">Stress Management</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 40%;"></div>
                    </div>
                    <div class="training-h-bar-value">4</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">HTML and CSS</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 30%;"></div>
                    </div>
                    <div class="training-h-bar-value">3</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">Add text here</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 20%;"></div>
                    </div>
                    <div class="training-h-bar-value">2</div>
                </div>
            </div>
        </div>

        <div class="training-card training-chart-container">
            <div class="training-chart-title">Remaining Budget</div>
            <div class="training-gauge-chart">
                <div class="training-gauge-background"></div>
                <div class="training-gauge-fill" style="transform: rotate(323deg);"></div>
                <div class="training-gauge-center">89%</div>
            </div>
        </div>

        <div class="training-card training-chart-container">
            <div class="training-chart-title">Spent by Department</div>
            <div class="training-horizontal-bar-chart training-department-spend">
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">IT</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 80%;"></div>
                    </div>
                    <div class="training-h-bar-value">$4,400</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">HR</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 76%;"></div>
                    </div>
                    <div class="training-h-bar-value">$4,200</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">Marketing</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 42%;"></div>
                    </div>
                    <div class="training-h-bar-value">$2,320</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">Management</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 27%;"></div>
                    </div>
                    <div class="training-h-bar-value">$1,500</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">Communication</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 15%;"></div>
                    </div>
                    <div class="training-h-bar-value">$850</div>
                </div>
                <div class="training-h-bar-container">
                    <div class="training-h-bar-label">PR</div>
                    <div class="training-h-bar-wrapper">
                        <div class="training-h-bar" style="width: 15%;"></div>
                    </div>
                    <div class="training-h-bar-value">$850</div>
                </div>
            </div>
        </div>

        <div class="training-card training-chart-container">
            <div class="training-budget-summary">
                <div class="training-budget-item">
                    <div class="training-budget-value training-budget-total">$106,000</div>
                    <div class="training-budget-label">Budget</div>
                </div>
                <div class="training-budget-item">
                    <div class="training-budget-value training-budget-spent">$15,100</div>
                    <div class="training-budget-label">Spent</div>
                </div>
                <div class="training-budget-item">
                    <div class="training-budget-value training-budget-remaining">$90,950</div>
                    <div class="training-budget-label">Remaining</div>
                </div>
            </div>
        </div>

        <div class="training-card training-chart-container">
            <div class="training-tech-definition">
                <p><span class="training-tech-term">HTML</span>: Hyper Text Markup Language</p>
                <p><span class="training-tech-term">CSS</span>: Cascading Style Sheet</p>
            </div>
        </div>
    </div>


</body>

<script>
    // Data structure for the entire dashboard
    const dashboardData = {
        summary: {
            totalTraining: 19,
            totalHours: 191,
            totalSpent: 15100
        },
        trainingStatus: [{
            label: "Scheduled",
            percentage: 10,
            color: "#677761"
        },
        {
            label: "Complete",
            percentage: 10,
            color: "green"
        },
        {
            label: "In progress",
            percentage: 80,
            color: "#f0ad4e"
        },

        ],
        trainingProvider: [{
            label: "Internal",
            percentage: 10,
            color: "#677761"
        },
        {
            label: "External",
            percentage: 10,
            color: "#d6b656"
        },
        {
            label: "Online",
            percentage: 80,
            color: "#f0ad4e"
        }
        ],
        departmentTrainings: [{
            department: "IT",
            count: 1
        },
        {
            department: "HR",
            count: 2
        },
        {
            department: "Marketing",
            count: 3
        },
        {
            department: "PR",
            count: 4
        },
        {
            department: "Communication",
            count: 5
        },
        {
            department: "Management",
            count: 6
        }
        ],
        topTrainings: [{
            name: "Presentation skills",
            count: 2
        },
        {
            name: "Microsoft Word",
            count: 3
        },
        {
            name: "Project Management Intro",
            count: 4
        },
        {
            name: "Javascript for beginners",
            count: 5
        },
        {
            name: "Stress Management",
            count: 6
        },
        {
            name: "HTML and CSS",
            count: 7
        },
        {
            name: "Add text here",
            count: 8
        }
        ],
        budget: {
            total: 106000,
            spent: 15100,
            remaining: 90950,
            percentageRemaining: 89
        },
        departmentSpending: [{
            department: "IT",
            spent: 4400
        },
        {
            department: "HR",
            spent: 4200
        },
        {
            department: "Marketing",
            spent: 2320
        },
        {
            department: "Management",
            spent: 1500
        },
        {
            department: "Communication",
            spent: 850
        },
        {
            department: "PR",
            spent: 850
        }
        ],
        techDefinitions: [{
            term: "HTML",
            definition: "Hyper Text Markup Language"
        },
        {
            term: "CSS",
            definition: "Cascading Style Sheet"
        }
        ]
    };

    // Function to format currency
    function formatCurrency(amount) {
        return '$' + amount.toLocaleString();
    }

    // Update summary metrics
    function updateSummaryMetrics() {
        document.querySelector('.training-metrics .training-metric:nth-child(1) .value').textContent =
            dashboardData.summary.totalTraining;
        document.querySelector('.training-metrics .training-metric:nth-child(2) .value').textContent =
            dashboardData.summary.totalHours;
        document.querySelector('.training-metrics .training-metric:nth-child(3) .value').textContent =
            formatCurrency(dashboardData.summary.totalSpent);
    }

    // Generate donut chart HTML for a data array
    function generateDonutChartLegend(containerId, data) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const legendContainer = container.querySelector('.training-chart-legend');
        legendContainer.innerHTML = '';

        data.forEach(item => {
            const legendItem = document.createElement('div');
            legendItem.className = 'training-legend-item';
            legendItem.innerHTML = `
      <div class="training-legend-color" style="background-color: ${item.color};"></div>
      <span>${item.label} ${item.percentage}%</span>
    `;
            legendContainer.appendChild(legendItem);
        });


    }

    // Update department training bars
    function updateDepartmentTrainingBars() {
        const container = document.querySelector('.training-bar-chart');
        if (!container) return;

        container.innerHTML = '';

        // Find the max count for scaling
        const maxCount = Math.max(...dashboardData.departmentTrainings.map(item => item.count));

        dashboardData.departmentTrainings.forEach(item => {
            const heightPercentage = (item.count / maxCount) * 100;
            const bar = document.createElement('div');
            bar.className = 'training-bar';
            bar.style.height = `${heightPercentage * 1.8}px`; // 180px is max height

            bar.innerHTML = `
            <div class="training-bar-value">${item.count}</div>
            <div class="training-bar-label">${item.department}</div>
            `;

            container.appendChild(bar);
        });
    }

    // Update top training horizontal bars
    function updateTopTrainingBars() {
        const container = document.querySelector('.training-horizontal-bar-chart:not(.training-department-spend)');
        if (!container) return;

        container.innerHTML = '';

        // Find the max count for scaling
        const maxCount = Math.max(...dashboardData.topTrainings.map(item => item.count));

        dashboardData.topTrainings.forEach(item => {
            const widthPercentage = (item.count / maxCount) * 100;

            const barContainer = document.createElement('div');
            barContainer.className = 'training-h-bar-container';

            barContainer.innerHTML = `
                <div class="training-h-bar-label">${item.name}</div>
                <div class="training-h-bar-wrapper">
                    <div class="training-h-bar" style="width: ${widthPercentage}%;"></div>
                </div>
                <div class="training-h-bar-value">${item.count}</div>
                `;

            container.appendChild(barContainer);
        });
    }

    // Update department spending horizontal bars
    function updateDepartmentSpendingBars() {
        const container = document.querySelector('.training-department-spend');
        if (!container) return;

        container.innerHTML = '';

        // Find the max spent for scaling
        const maxSpent = Math.max(...dashboardData.departmentSpending.map(item => item.spent));

        dashboardData.departmentSpending.forEach(item => {
            const widthPercentage = (item.spent / maxSpent) * 100;

            const barContainer = document.createElement('div');
            barContainer.className = 'training-h-bar-container';

            barContainer.innerHTML = `
                <div class="training-h-bar-label">${item.department}</div>
                <div class="training-h-bar-wrapper">
                    <div class="training-h-bar" style="width: ${widthPercentage}%;"></div>
                </div>
                <div class="training-h-bar-value">${formatCurrency(item.spent)}</div>
                `;

            container.appendChild(barContainer);
        });
    }

    // Update budget gauge
    function updateBudgetGauge() {
        const gaugeElement = document.querySelector('.training-gauge-fill');
        if (!gaugeElement) return;

        // Calculate rotation based on percentage (0% = 0deg, 100% = 360deg)
        const rotation = (dashboardData.budget.percentageRemaining / 100) * 360;
        gaugeElement.style.transform = `rotate(${rotation}deg)`;

        // Update percentage text
        document.querySelector('.training-gauge-center').textContent =
            `${dashboardData.budget.percentageRemaining}%`;
    }

    // Update budget summary
    function updateBudgetSummary() {
        document.querySelector('.training-budget-total').textContent =
            formatCurrency(dashboardData.budget.total);
        document.querySelector('.training-budget-spent').textContent =
            formatCurrency(dashboardData.budget.spent);
        document.querySelector('.training-budget-remaining').textContent =
            formatCurrency(dashboardData.budget.remaining);
    }

    // Update tech definitions
    function updateTechDefinitions() {
        const container = document.querySelector('.training-tech-definition');
        if (!container) return;

        container.innerHTML = '';

        dashboardData.techDefinitions.forEach(item => {
            const paragraph = document.createElement('p');
            paragraph.innerHTML = `<span class="training-tech-term">${item.term}</span>: ${item.definition}`;
            container.appendChild(paragraph);
        });
    }

    // Function to load data from an external source (like Excel)
    function loadDataFromExcel(fileInput) {
        // This is a placeholder for actual Excel integration
        // You would need to use a library like SheetJS/xlsx to parse Excel data

        const reader = new FileReader();
        reader.onload = function (e) {
            // Parse the Excel data
            // For now we'll just simulate with hardcoded data
            console.log("Would process Excel file here");

            // After processing, update the dashboard
            updateDashboard();
        };

        if (fileInput.files.length > 0) {
            reader.readAsBinaryString(fileInput.files[0]);
        }
    }



    // Function to update all dashboard components
    function updateDashboard() {
        updateSummaryMetrics();
        updateDonutCharts('training-status-chart', dashboardData.trainingStatus);
        updateDonutCharts('training-provider-chart', dashboardData.trainingProvider);
        generateDonutChartLegend('training-status-chart', dashboardData.trainingStatus);
        generateDonutChartLegend('training-provider-chart', dashboardData.trainingProvider);
        updateDepartmentTrainingBars();
        updateTopTrainingBars();
        updateBudgetGauge();
        updateBudgetSummary();
        updateDepartmentSpendingBars();
        updateTechDefinitions();
    }

    function updateDonutCharts(containerId, data) {
        const container = document.getElementById(containerId);
        if (!container) return;

        const statusChart = container.querySelector('.training-donut-chart');
        if (!statusChart) return;

        let cumulativePercentage = 0;
        const gradientValues = data.map(item => {
            const start = cumulativePercentage;
            cumulativePercentage += item.percentage;
            const end = cumulativePercentage;
            return `${item.color} ${start}% ${end}%`;
        }).join(', ');

        statusChart.style.background = `conic-gradient(${gradientValues})`;
    }
    // Initialize the dashboard when DOM is ready
    document.addEventListener('DOMContentLoaded', function () {
        // Add IDs to charts for easier reference
        document.querySelector('.training-donut-chart:not(.training-provider-chart)').parentElement.id =
            'training-status-chart';
        document.querySelector('.training-provider-chart').parentElement.id = 'training-provider-chart';



        // Initialize dashboard with default data
        updateDashboard();

        // Example of how to update with new data
        window.updateDashboardData = function (newData) {
            // Merge new data with existing data
            Object.assign(dashboardData, newData);
            // Update the dashboard
            updateDashboard();
        };
    });

    // Expose a function to update specific sections
    window.updateDashboardSection = function (sectionName, newData) {
        if (dashboardData[sectionName]) {
            dashboardData[sectionName] = newData;

            // Update just the specific section
            switch (sectionName) {
                case 'summary':
                    updateSummaryMetrics();
                    break;
                case 'trainingStatus':
                    generateDonutChartLegend('training-status-chart', dashboardData.trainingStatus);
                    break;
                case 'trainingProvider':
                    generateDonutChartLegend('training-provider-chart', dashboardData.trainingProvider);
                    break;
                case 'departmentTrainings':
                    updateDepartmentTrainingBars();
                    break;
                case 'topTrainings':
                    updateTopTrainingBars();
                    break;
                case 'budget':
                    updateBudgetGauge();
                    updateBudgetSummary();
                    break;
                case 'departmentSpending':
                    updateDepartmentSpendingBars();
                    break;
                case 'techDefinitions':
                    updateTechDefinitions();
                    break;
                default:
                    // If section name doesn't match, update everything
                    updateDashboard();
            }
        }
    };
</script>
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

</html>