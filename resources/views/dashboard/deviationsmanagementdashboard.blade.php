<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Dashboard</title>
    <style>
        /* Bar Chart Container */
        #devdash_labBarChart {
            display: flex;
            align-items: flex-end;
            gap: 10px;
            height: 300px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        /* Bar Container */
        .devdash_bar-container {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            position: relative;
            align-items: flex-end;
        }

        /* Bar Styles */
        .devdash_bar {
            width: 100%;
            position: relative;
            text-align: center;
            transition: height 0.3s ease;
        }

        .devdash_bar.deviations {
            border-radius: 3px 3px 0 0;
        }

        .devdash_bar.solved {
            border-radius: 0 0 3px 3px;
            opacity: 0.8;
            /* Add transparency */
        }

        /* Bar Values */
        .devdash_bar-value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            color: #333;
        }

        /* Bar Labels */
        .devdash_bar-label {
            margin-top: 5px;
            font-size: 12px;
            text-align: center;
            color: #333;
        }

        .auditdash-legend-item {
            display: flex;
            align-items: center;
            font-size: 12px;
            flex-direction: column
        }

        .auditdash-legend-color {
            width: 12px;
            height: 12px;
            margin-right: 5px;
            border-radius: 2px;
        }

        #devdash_dashboard_legend {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            margin: 2rem;
        }
    </style>
</head>



<body>
    <!-- Date Input -->
    <div style="margin-bottom: 20px;">
        <input style="width: 200px" type="month" class="form-control" id="devdash_dateInput">
    </div>

    <!-- Dashboard -->
    <div class="devdash_dashboard" id="devdash_dashboard" style="display: none;">
        <h1 class="devdash_h1">Lab Performance Dashboard</h1>
        <div id="devdash_dashboard_legend"></div>
        <div class="devdash_chart-container">
            <div class="devdash_bar-chart" id="devdash_labBarChart"></div>
        </div>
    </div>

    <script>
        // Sample data for labs
        const labData = {
            "2025-03": [{
                    lab: "Lab A",
                    deviations: 80,
                    solved: 10,
                    color: "#FF5733"
                },
                {
                    lab: "Lab B",
                    deviations: 60,
                    solved: 10,
                    color: "#33FF57"
                },
                {
                    lab: "Lab C",
                    deviations: 90,
                    solved: 10,
                    color: "#3357FF"
                },
                {
                    lab: "Lab D",
                    deviations: 50,
                    solved: 10,
                    color: "#FF33A1"
                },
                {
                    lab: "Lab E",
                    deviations: 70,
                    solved: 10,
                    color: "#A133FF"
                },
                {
                    lab: "Lab F",
                    deviations: 40,
                    solved: 10,
                    color: "#33FFF5"
                },
                {
                    lab: "Lab G",
                    deviations: 85,
                    solved: 10,
                    color: "#F5FF33"
                },
                {
                    lab: "Lab H",
                    deviations: 55,
                    solved: 10,
                    color: "#FF3333"
                },
                {
                    lab: "Lab I",
                    deviations: 75,
                    solved: 10,
                    color: "#33FF33"
                },
                {
                    lab: "Lab J",
                    deviations: 65,
                    solved: 10,
                    color: "#3333FF"
                },
                {
                    lab: "Lab K",
                    deviations: 45,
                    solved: 10,
                    color: "#FF33FF"
                },
                {
                    lab: "Lab L",
                    deviations: 95,
                    solved: 10,
                    color: "#33FFA1"
                },
                {
                    lab: "Lab M",
                    deviations: 35,
                    solved: 10,
                    color: "#A1FF33"
                },
                {
                    lab: "Lab N",
                    deviations: 85,
                    solved: 10,
                    color: "#33A1FF"
                },
                {
                    lab: "Lab O",
                    deviations: 55,
                    solved: 10,
                    color: "#FFA133"
                },
                {
                    lab: "Lab P",
                    deviations: 75,
                    solved: 10,
                    color: "#A133A1"
                }
            ],
            "2025-02": [{
                    lab: "Lab A",
                    deviations: 85,
                    solved: 10,
                    color: "#FF5733"
                },
                {
                    lab: "Lab B",
                    deviations: 75,
                    solved: 10,
                    color: "#33FF57"
                },
                {
                    lab: "Lab C",
                    deviations: 95,
                    solved: 10,
                    color: "#3357FF"
                },
                {
                    lab: "Lab D",
                    deviations: 55,
                    solved: 10,
                    color: "#FF33A1"
                },
                {
                    lab: "Lab E",
                    deviations: 65,
                    solved: 10,
                    color: "#A133FF"
                },
                {
                    lab: "Lab F",
                    deviations: 45,
                    solved: 10,
                    color: "#33FFF5"
                },
                {
                    lab: "Lab G",
                    deviations: 85,
                    solved: 10,
                    color: "#F5FF33"
                },
                {
                    lab: "Lab H",
                    deviations: 55,
                    solved: 10,
                    color: "#FF3333"
                },
                {
                    lab: "Lab I",
                    deviations: 75,
                    solved: 10,
                    color: "#33FF33"
                },
                {
                    lab: "Lab J",
                    deviations: 65,
                    solved: 10,
                    color: "#3333FF"
                },
                {
                    lab: "Lab K",
                    deviations: 45,
                    solved: 10,
                    color: "#FF33FF"
                },
                {
                    lab: "Lab L",
                    deviations: 95,
                    solved: 10,
                    color: "#33FFA1"
                },
                {
                    lab: "Lab M",
                    deviations: 35,
                    solved: 10,
                    color: "#A1FF33"
                },
                {
                    lab: "Lab N",
                    deviations: 85,
                    solved: 85,
                    color: "#33A1FF"
                },
                {
                    lab: "Lab O",
                    deviations: 55,
                    solved: 12,
                    color: "#FFA133"
                },
                {
                    lab: "Lab P",
                    deviations: 75,
                    solved: 12,
                    color: "#A133A1"
                }
            ]
        };
        // Wait for the DOM to load
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('devdash_dateInput');
            const dashboard = document.getElementById('devdash_dashboard');
            const labBarChart = document.getElementById('devdash_labBarChart');

            // Show dashboard and update chart when a date is selected
            dateInput.addEventListener('change', function() {
                const selectedDate = dateInput.value; // Get the selected date (e.g., "2025-03")
                const data = labData[selectedDate]; // Get data for the selected date

                if (data) {
                    const legend = document.getElementById('devdash_dashboard_legend');
                    legend.innerHTML = data.map(item => `
                    <div class="auditdash-legend-item"
                        style="font-size: 12px;flex-direction: column;padding: 10px;border-radius: 6px;box-shadow: 2px 3px 6px 1px #d9d9d9, 1px 1px 5px 5px #ffffff;">
                        <div style="display: flex;align-items: center;font-size: 12px;padding: 10px;border-radius: 6px;gap: 10px;">
                            <div style="display:
                            flex;align-items: center;">
                            <div class="auditdash-legend-color" style="background-color: ${item.color};"></div>
                            <span>Deviations </span>
                        </div>
                        <div style="display: flex;align-items: center;">
                            <div class="auditdash-legend-color" style="background-color: ${item.color}80;"></div>
                            <span>Completed </span>
                        </div>
                        </div>
                        <b style="font-size: 17px;">${item.lab} </b>
                    </div>
                                
                            `).join('');
                    labBarChart.innerHTML = legend;
                    // Show the dashboard
                    dashboard.style.display = 'block';

                    // Clear existing bars
                    labBarChart.innerHTML = '';

                    // Find the max value for scaling (deviations + solved)
                    const maxValue = Math.max(...data.map(item => item.deviations + item.solved));

                    // Add bars for each lab
                    data.forEach(item => {
                        const barContainer = document.createElement('div');
                        barContainer.className = 'devdash_bar-container';
                        barContainer.style.height = '100%'; // Full height for stacking

                        // Create the "deviations" bar
                        const deviationsBar = document.createElement('div');
                        deviationsBar.className = 'devdash_bar deviations';
                        deviationsBar.style.height = `${(item.deviations / maxValue) * 100}%`;
                        deviationsBar.style.backgroundColor = item.color;
                        deviationsBar.innerHTML = `
                            <div class="devdash_bar-value">${item.deviations}</div>
                        `;

                        // Create the "solved" bar
                        const solvedBar = document.createElement('div');
                        solvedBar.className = 'devdash_bar solved';
                        solvedBar.style.height = `${(item.solved / maxValue) * 100}%`;
                        solvedBar.style.backgroundColor = `${item.color}80`; // Add transparency
                        solvedBar.innerHTML = `
                            <div class="devdash_bar-value">${item.solved}</div>
                        `;

                        // Append bars to the container
                        barContainer.appendChild(deviationsBar);
                        barContainer.appendChild(solvedBar);

                        // Create the label for the lab
                        // const barLabel = document.createElement('div');
                        // barLabel.className = 'devdash_bar-label';
                        // barLabel.textContent = item.lab;


                        // Append the container and label to the chart
                        labBarChart.appendChild(barContainer);
                        // labBarChart.appendChild(barLabel);
                    });

                } else {
                    // Hide the dashboard if no data is available for the selected date
                    dashboard.style.display = 'none';
                    alert("No data available for the selected date.");
                }
            });
        });
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
</body>

</html>
