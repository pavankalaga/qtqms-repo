<style>
    /* fOR PIVOT */
    .pivot-container {
        width: 100%;
        /* max-width: 600px;
      margin: 50px auto; */
        background-color: white;
        border-radius: 8px;
        /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); */
        /* overflow: hidden; */
    }

    .pivot-tabsQuality {
        display: flex;
        background-color: #ffff;
        padding: 5px;
        border: 1px solid #b1b1b1;
        border-radius: 10px;
        width: 100%;
    }

    .pivot-tabQuality {
        flex: 1;
        background: transparent;
        border: none;
        cursor: pointer;
        font-size: 14px;
        text-align: center;
    }

    .pivot-tabQuality.active {
        color: #005a9e;
        background-color: lightblue;
        font-weight: bold;
        border-radius: 5px;
        padding: 0.8rem;
    }

    .pivot-contentQuality {
        padding: 20px 0;
    }

    .pivot-panelQuality {
        display: none;
    }

    .pivot-panelQuality.active {
        display: block;
    }

    /* for table */
    .stock-planner-table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin-top: 20px !important;
    }

    .stock-planner-table th,
    .stock-planner-table td {
        padding: 10px !important;
        text-align: left !important;
        border: 1px solid #ddd !important;
    }

    .stock-planner-table th {
        background-color: #007BFF !important;
        color: white !important;
    }

    .form-container-search input[type="month"],
    .form-container-search select {
        padding: 10px;
        font-size: 14px !important;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .wapp-sidebar {
        height: calc(100vh - 185px);
        width: 20%;
        background-color: #010046;
        color: white;
        display: flex;
        flex-direction: column;
    }

    .wapp-sidebar-header {
        padding: 10px;
        background-color: #177445;
        text-align: center;
        font-size: 1.5em;
    }

    .wapp-chat-list {
        flex: 1;
        overflow-y: auto;
    }

    .wapp-chat-item {
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid #ccc;
    }

    .wapp-chat-item:hover {
        background-color: #0b8065;
    }

    .wapp-chat-item.active {
        background-color: #0b8065;
    }

    .wapp-main-chat {
        /* height: calc(100% - 70px); */
        flex: 1;
        display: none;
        /* Initially hide all chats */
        flex-direction: column;
        position: relative;
    }

    .wapp-main-chat.active {
        display: flex;

        /* Show only the active chat */
    }

    .wapp-chat-header {
        padding: 10px;
        background-color: #009348;
        color: white;
        font-size: 1.2em;
    }

    .wapp-messages {
        display: contents;
        flex: 1;
        padding: 10px;
        overflow-y: auto;
        background-color: white;
    }

    .wapp-message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 10px;
        max-width: 70%;
    }

    .wapp-message.sent {
        background-color: #DCF8C6;
        align-self: flex-end;
    }

    .wapp-message.received {
        background-color: lightblue;
        align-self: flex-start;
    }

    .wapp-message-input {
        display: flex;
        position: absolute;
        width: 100%;
        padding: 10px;
        background-color: #f1f1f1;
        border-top: 1px solid #ccc;
        bottom: 0;
    }

    .wapp-message-input input {
        flex: 1;
        padding: 10px;
        border: none;
        border-radius: 20px;
        outline: none;
    }

    .wapp-message-input button {
        margin-left: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        background-color: #075E54;
        color: white;
        cursor: pointer;
    }

    .form-container-search input[type="month"],
    .form-container-search select {
        padding: 10px;
        font-size: 14px !important;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<div class="pivot-tabsQuality">

    <!-- <button class="pivot-tabQuality active" data-target="QIReport">QI Report </button> -->
    <button class="pivot-tabQuality active" data-target="PreAnalyticalQualityIndicator">Pre-Examination Daily
        Report</button>
    <button class="pivot-tabQuality" data-target="AnalyticalQualityIndicator">Examination Quality Daily Report</button>
    <button class="pivot-tabQuality" data-target="PostAnalyticalQualityIndicator">Post-Examination Daily Report
        Indicator</button>



</div>


<div class="pivot-contentQuality">
    <!-- <div class="pivot-panelQuality " id="QIReport">
        <div style="width: 40%;margin:1rem auto;">
            <label for="category">Choose a Phase:</label>
            <select class="form-control">
                <optgroup label="Pre Examination">
                    <option value="">All</option>
                    <option value="html">HTML</option>
                    <option value="css">CSS</option>
                    <option value="javascript">JavaScript</option>
                </optgroup>
                <optgroup label="Examination">
                    <option value="">All</option>
                    <option value="node">Node.js</option>
                    <option value="python">Python</option>
                    <option value="java">Java</option>
                </optgroup>
                <optgroup label="Post Examination">
                    <option value="">All</option>
                    <option value="node">Node.js</option>
                    <option value="python">Python</option>
                    <option value="java">Java</option>
                </optgroup>
            </select>
        </div>

        <section style=" height:60vh;">
            <canvas id="QualityIndicatorChart"></canvas>
        </section>
    </div> -->

    <div class="pivot-panelQuality active" id="PreAnalyticalQualityIndicator">
        <div class="table-responsive" style="padding-right: 1rem;">
            <div class="card p-3 shadow-sm mb-4" style="max-width: 900px; margin: 0 auto;">
                <div class="row g-3 align-items-end">
                    <!-- Indicator Dropdown -->
                    <div class="col-md-4">
                        <label for="indicatorSelect" class="form-label fw-semibold">Select Indicator</label>
                        <select id="indicatorSelect" class="form-select">
                            <option value="">-- Select Indicator --</option>
                            @foreach($indicators as $indicator)
                                <option value="{{ $indicator->id }}">{{ $indicator->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- From Month -->
                    <div class="col-md-4">
                        <label for="monthFrom" class="form-label fw-semibold">From</label>
                        <input type="month" name="month_from" id="monthFrom" class="form-control">
                    </div>

                    <!-- To Month -->
                    <div class="col-md-4">
                        <label for="monthTo" class="form-label fw-semibold">To</label>
                        <input type="month" name="month_to" id="monthTo" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Chart Canvas -->
            <div style="width: 80%; margin: 0 auto;">
                <canvas id="preAnalyticalChart"></canvas>
            </div>
            <br>
            <div style="width: 80%; margin: 0 auto;">
                <canvas id="preAnalyticalChart2"></canvas>
            </div>

        </div>
    </div>
    <!-- Examination chart -->




    <div class="pivot-panelQuality" id="AnalyticalQualityIndicator">
        <div class="table-responsive" style="padding-right: 1rem;">
            <div class="card p-3 shadow-sm mb-4" style="max-width: 900px; margin: 0 auto;">
                <div class="row g-3 align-items-end">
                    <!-- Indicator Dropdown -->
                    <div class="col-md-4">
                        <label for="indicatorSelect2" class="form-label fw-semibold">Select Indicator</label>
                        <select id="indicatorSelect2" class="form-select">
                            <option value="">-- Select Indicator --</option>
                            @foreach($examinIndicators as $indicator1)
                                <option value="{{ $indicator1->id }}">{{ $indicator1->indicator }}</option>
                            @endforeach

                        </select>
                    </div>

                    <!-- From Month -->
                    <div class="col-md-4">
                        <label for="monthFrom2" class="form-label fw-semibold">From</label>
                        <input type="month" name="month_from" id="monthFrom2" class="form-control">
                    </div>

                    <!-- To Month -->
                    <div class="col-md-4">
                        <label for="monthTo2" class="form-label fw-semibold">To</label>
                        <input type="month" name="month_to" id="monthTo2" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Chart Canvas -->
            <div style="width: 80%; margin: 0 auto;">
                <canvas id="examAnalyticalChart"></canvas>
            </div>
            <br>
            <div style="width: 80%; margin: 0 auto;">
                <canvas id="examAnalyticalChart2"></canvas>
            </div>

        </div>
    </div>

    {{-- <div class="pivot-panelQuality " id="AnalyticalQualityIndicator">
        <div class="table-responsive" style="padding-right: 1rem;">
            <!-- Add a canvas for the chart -->
            <div style="width: 80%; margin: 0 auto;">
                <canvas id="AnalyticalIndicatorChart"></canvas>
            </div>
        </div>
    </div>--}}
    <!-- <div class="pivot-panelQuality " id="PostAnalyticalQualityIndicator"> -->
    <!-- <div class="table-responsive" style="padding-right: 1rem;"> -->
    <!-- Add a canvas for the chart -->
    <!-- <div style="width: 80%; margin: 0 auto;"> -->
    <!-- <canvas id="PostAnalyticalIndicatorChart"></canvas> -->
    <!-- </div> -->
    <!-- </div> -->
    <!-- </div> -->

    <div class="pivot-panelQuality" id="PostAnalyticalQualityIndicator">
        <div class="table-responsive" style="padding-right: 1rem;">
            <div class="card p-3 shadow-sm mb-4" style="max-width: 900px; margin: 0 auto;">
                <div class="row g-3 align-items-end">
                    <!-- Indicator Dropdown -->
                    <div class="col-md-4">
                        <label for="indicatorSelect1" class="form-label fw-semibold">Select Indicator</label>
                        <select id="indicatorSelect1" class="form-select">
                            <option value="">-- Select Indicator --</option>
                            @foreach($postIndicators as $indicator1)
                                <option value="{{ $indicator1->id }}">{{ $indicator1->indicator }}</option>
                            @endforeach

                        </select>
                    </div>

                    <!-- From Month -->
                    <div class="col-md-4">
                        <label for="monthFrom3" class="form-label fw-semibold">From</label>
                        <input type="month" name="month_from" id="monthFrom3" class="form-control">
                    </div>

                    <!-- To Month -->
                    <div class="col-md-4">
                        <label for="monthTo3" class="form-label fw-semibold">To</label>
                        <input type="month" name="month_to" id="monthTo3" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Chart Canvas -->
            <div style="width: 80%; margin: 0 auto;">
                <canvas id="PostAnalyticalIndicatorChart"></canvas>
            </div>
            <br>
            <div style="width: 80%; margin: 0 auto;">
                <canvas id="PostAnalyticalIndicatorChart2"></canvas>
            </div>

        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".pivot-tabQuality");
        const panels = document.querySelectorAll(".pivot-panelQuality");

        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                // Remove active class from all tabs and panels
                tabs.forEach((t) => t.classList.remove("active"));
                panels.forEach((p) => p.classList.remove("active"));

                // Add active class to the clicked tab and corresponding panel
                tab.classList.add("active");
                const target = document.getElementById(tab.dataset.target);
                target.classList.add("active");
            });
        });
        renderTableBody()
    });

    document.addEventListener('DOMContentLoaded', function () {
        const lineCtx = document.getElementById('preAnalyticalChart').getContext('2d');
        const barCtx = document.getElementById('preAnalyticalChart2').getContext('2d');

        let lineChart = null;
        let barChart = null;

        function initCharts() {
            // Initialize line chart
            lineChart = new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Select an indicator',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.3,
                        borderWidth: 3,
                        pointBackgroundColor: 'rgb(75, 192, 192)',
                        pointRadius: 5,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    return `${context.dataset.label}: ${context.parsed.y}%`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 40,
                            ticks: {
                                stepSize: 4, // <-- change this to 5 if you prefer 5 instead
                                callback: (value) => value + '%'
                            },
                            title: {
                                display: true,
                                text: 'Average Percentage'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });

            // Initialize bar chart
            barChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: 'Total Misidentified',
                            data: [],
                            backgroundColor: 'rgba(255, 99, 132, 0.7)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Total Samples',
                            data: [],
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    return `${context.dataset.label}: ${context.parsed.y}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Count'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });
        }

        function updateCharts() {
            const indicatorId = document.getElementById('indicatorSelect').value;
            const monthFrom = document.getElementById('monthFrom').value;
            const monthTo = document.getElementById('monthTo').value;
            const labId = document.getElementById('labSelect').value;
            // console.log('Lab ID:', labId); // Log the labId to check its value

            if (!labId) {
                if (lineChart) {
                    lineChart.data.labels = [];
                    lineChart.data.datasets[0].data = [];
                    lineChart.update();
                }
                if (barChart) {
                    barChart.data.labels = [];
                    barChart.data.datasets[0].data = [];
                    barChart.data.datasets[1].data = [];
                    barChart.update();
                }
                return;
            }

            if (!indicatorId || !monthFrom || !monthTo) return;

            // Show loading state
            if (lineChart) {
                lineChart.data.labels = ['Loading...'];
                lineChart.data.datasets[0].data = [0];
                lineChart.update();
            }

            if (barChart) {
                barChart.data.labels = ['Loading...'];
                barChart.data.datasets[0].data = [0];
                barChart.data.datasets[1].data = [0];
                barChart.update();
            }

            fetch(`/get-indicator-data?indicator_id=${indicatorId}&month_from=${monthFrom}&month_to=${monthTo}&lab_id=${labId}`)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    if (!data.success) throw new Error(data.message || 'Failed to load data');

                    if (lineChart) {
                        lineChart.data.labels = data.data.labels;
                        lineChart.data.datasets[0].data = data.data.values;
                        lineChart.data.datasets[0].label = `${data.data.indicator} (Avg %)`;
                        lineChart.update();
                    }

                    if (barChart) {
                        barChart.data.labels = data.data.labels;
                        barChart.data.datasets[0].data = data.data.misidentified;
                        barChart.data.datasets[1].data = data.data.samples;
                        barChart.data.datasets[0].label = `${data.data.indicator} - Misidentified`;
                        barChart.data.datasets[1].label = `${data.data.indicator} - Total Samples`;
                        barChart.update();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    if (lineChart) {
                        lineChart.data.labels = ['Error loading data'];
                        lineChart.data.datasets[0].data = [0];
                        lineChart.update();
                    }
                    if (barChart) {
                        barChart.data.labels = ['Error loading data'];
                        barChart.data.datasets[0].data = [0];
                        barChart.data.datasets[1].data = [0];
                        barChart.update();
                    }
                });
        }

        // Initialize charts
        initCharts();


        document.getElementById('labSelect').addEventListener('change', updateCharts);

        // Set default date range (last 6 months)
        const now = new Date();
        const sixMonthsAgo = new Date();
        sixMonthsAgo.setMonth(now.getMonth() - 5); // 6 months inclusive

        document.getElementById('monthFrom').value = sixMonthsAgo.toISOString().slice(0, 7);
        document.getElementById('monthTo').value = now.toISOString().slice(0, 7);


        // Set up event listeners
        document.getElementById('indicatorSelect').addEventListener('change', updateCharts);
        document.getElementById('monthFrom').addEventListener('change', updateCharts);
        document.getElementById('monthTo').addEventListener('change', updateCharts);

        // Initial data load
        setTimeout(updateCharts, 300);
    });
</script>
<!-- examination script -->


<script>
    // const indicatorId = document.getElementById('indicatorSelect1').value;

    document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".pivot-tabQuality");
        const panels = document.querySelectorAll(".pivot-panelQuality");

        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                // Remove active class from all tabs and panels
                tabs.forEach((t) => t.classList.remove("active"));
                panels.forEach((p) => p.classList.remove("active"));

                // Add active class to the clicked tab and corresponding panel
                tab.classList.add("active");
                const target = document.getElementById(tab.dataset.target);
                target.classList.add("active");
            });
        });
        renderTableBody()
    });

    document.addEventListener('DOMContentLoaded', function () {
        const lineCtx = document.getElementById('PostAnalyticalIndicatorChart').getContext('2d');
        const barCtx = document.getElementById('PostAnalyticalIndicatorChart2').getContext('2d');

        let lineChart = null;
        let barChart = null;

        function initCharts() {
            // Initialize line chart
            lineChart = new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Select an indicator',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.3,
                        borderWidth: 3,
                        pointBackgroundColor: 'rgb(75, 192, 192)',
                        pointRadius: 5,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    return `${context.dataset.label}: ${context.parsed.y}%`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 40,
                            ticks: {
                                stepSize: 4, // <-- change this to 5 if you prefer 5 instead
                                callback: (value) => value + '%'
                            },
                            title: {
                                display: true,
                                text: 'Average Percentage'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });

            // Initialize bar chart
            barChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: 'Total Misidentified',
                            data: [],
                            backgroundColor: 'rgba(255, 99, 132, 0.7)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Total Samples',
                            data: [],
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    return `${context.dataset.label}: ${context.parsed.y}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Count'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });
        }

        function updateCharts() {
            const indicatorId = document.getElementById('indicatorSelect1').value;
            const monthFrom3 = document.getElementById('monthFrom3').value;
            const monthTo3 = document.getElementById('monthTo3').value;
            const labId = document.getElementById('labSelect').value;
            if (!indicatorId || !monthFrom3 || !monthTo3) return;

            if (lineChart) {
                lineChart.data.labels = ['Loading...'];
                lineChart.data.datasets[0].data = [0];
                lineChart.update();
            }
            if (barChart) {
                barChart.data.labels = ['Loading...'];
                barChart.data.datasets[0].data = [0];
                barChart.data.datasets[1].data = [0];
                barChart.update();
            }

            const url = `/get-post-indicator-data?indicator_id=${indicatorId}&month_from=${monthFrom3}&month_to=${monthTo3}&lab_id=${labId}`;
            console.log('Fetching URL:', url); // ✅ LOG THIS

            fetch(url)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data);
                    if (!data.success) throw new Error(data.message || 'Failed to load data');

                    if (lineChart) {
                        lineChart.data.labels = data.data.labels;
                        lineChart.data.datasets[0].data = data.data.values;
                        lineChart.data.datasets[0].label = `${data.data.indicator1} (Avg %)`;
                        lineChart.update();
                    }

                    if (barChart) {
                        barChart.data.labels = data.data.labels;
                        barChart.data.datasets[0].data = data.data.misidentified;
                        barChart.data.datasets[1].data = data.data.samples;
                        barChart.data.datasets[0].label = `${data.data.indicator1} - Misidentified`;
                        barChart.data.datasets[1].label = `${data.data.indicator1} - Total Samples`;
                        barChart.update();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    if (lineChart) {
                        lineChart.data.labels = ['Error loading data'];
                        lineChart.data.datasets[0].data = [0];
                        lineChart.update();
                    }
                    if (barChart) {
                        barChart.data.labels = ['Error loading data'];
                        barChart.data.datasets[0].data = [0];
                        barChart.data.datasets[1].data = [0];
                        barChart.update();
                    }
                });
        }

        // Initialize charts
        initCharts();

        // Set default date range (last 6 months)
        const now = new Date();
        const sixMonthsAgo = new Date();
        sixMonthsAgo.setMonth(now.getMonth() - 5); // 6 months inclusive

        document.getElementById('monthFrom3').value = sixMonthsAgo.toISOString().slice(0, 7);
        document.getElementById('monthTo3').value = now.toISOString().slice(0, 7);

        // Set up event listeners
        document.getElementById('indicatorSelect1').addEventListener('change', updateCharts);
        document.getElementById('monthFrom3').addEventListener('change', updateCharts);
        document.getElementById('monthTo3').addEventListener('change', updateCharts);

        // Initial data load
        setTimeout(updateCharts, 300);
    });
</script>



<script>
    const indicatorId2 = document.getElementById('indicatorSelect2').value;


    document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".pivot-tabQuality");
        const panels = document.querySelectorAll(".pivot-panelQuality");

        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                // Remove active class from all tabs and panels
                tabs.forEach((t) => t.classList.remove("active"));
                panels.forEach((p) => p.classList.remove("active"));

                // Add active class to the clicked tab and corresponding panel
                tab.classList.add("active");
                const target = document.getElementById(tab.dataset.target);
                target.classList.add("active");
            });
        });
        renderTableBody()
    });

    document.addEventListener('DOMContentLoaded', function () {
        const lineCtx = document.getElementById('examAnalyticalChart').getContext('2d');
        const barCtx = document.getElementById('examAnalyticalChart2').getContext('2d');

        let lineChart = null;
        let barChart = null;

        function initCharts() {
            // Initialize line chart
            lineChart = new Chart(lineCtx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Select an indicator',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.3,
                        borderWidth: 3,
                        pointBackgroundColor: 'rgb(75, 192, 192)',
                        pointRadius: 5,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    return `${context.dataset.label}: ${context.parsed.y}%`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            min: 0,
                            max: 40,
                            ticks: {
                                stepSize: 4, // <-- change this to 5 if you prefer 5 instead
                                callback: (value) => value + '%'
                            },
                            title: {
                                display: true,
                                text: 'Average Percentage'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });

            // Initialize bar chart
            barChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: 'Total Misidentified',
                            data: [],
                            backgroundColor: 'rgba(255, 99, 132, 0.7)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Total Samples',
                            data: [],
                            backgroundColor: 'rgba(54, 162, 235, 0.7)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: (context) => {
                                    return `${context.dataset.label}: ${context.parsed.y}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Count'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        }
                    }
                }
            });
        }

        function updateCharts() {
            const indicatorId2 = document.getElementById('indicatorSelect2').value;
            const monthFrom2 = document.getElementById('monthFrom2').value;
            const monthTo2 = document.getElementById('monthTo2').value;
            const labId = document.getElementById('labSelect').value;
            if (!indicatorId2 || !monthFrom2 || !monthTo2) return;

            if (lineChart) {
                lineChart.data.labels = ['Loading...'];
                lineChart.data.datasets[0].data = [0];
                lineChart.update();
            }
            if (barChart) {
                barChart.data.labels = ['Loading...'];
                barChart.data.datasets[0].data = [0];
                barChart.data.datasets[1].data = [0];
                barChart.update();
            }

            const url = `/get-post-indicator-data?indicator_id=${indicatorId2}&month_from=${monthFrom2}&month_to=${monthTo2}&lab_id=${labId}`;
            console.log('Fetching URL:', url); // ✅ LOG THIS

            fetch(url)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data);
                    if (!data.success) throw new Error(data.message || 'Failed to load data');

                    if (lineChart) {
                        lineChart.data.labels = data.data.labels;
                        lineChart.data.datasets[0].data = data.data.values;
                        lineChart.data.datasets[0].label = `${data.data.indicator1} (Avg %)`;
                        lineChart.update();
                    }

                    if (barChart) {
                        barChart.data.labels = data.data.labels;
                        barChart.data.datasets[0].data = data.data.misidentified;
                        barChart.data.datasets[1].data = data.data.samples;
                        barChart.data.datasets[0].label = `${data.data.indicator1} - Misidentified`;
                        barChart.data.datasets[1].label = `${data.data.indicator1} - Total Samples`;
                        barChart.update();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    if (lineChart) {
                        lineChart.data.labels = ['Error loading data'];
                        lineChart.data.datasets[0].data = [0];
                        lineChart.update();
                    }
                    if (barChart) {
                        barChart.data.labels = ['Error loading data'];
                        barChart.data.datasets[0].data = [0];
                        barChart.data.datasets[1].data = [0];
                        barChart.update();
                    }
                });
        }

        // Initialize charts
        initCharts();

        // Set default date range (last 6 months)
        const now = new Date();
        const sixMonthsAgo = new Date();
        sixMonthsAgo.setMonth(now.getMonth() - 5); // 6 months inclusive

        document.getElementById('monthFrom2').value = sixMonthsAgo.toISOString().slice(0, 7);
        document.getElementById('monthTo2').value = now.toISOString().slice(0, 7);

        // Set up event listeners
        document.getElementById('indicatorSelect2').addEventListener('change', updateCharts);
        document.getElementById('monthFrom2').addEventListener('change', updateCharts);
        document.getElementById('monthTo2').addEventListener('change', updateCharts);

        // Initial data load
        setTimeout(updateCharts, 300);
    });
</script>

<script>
    window.selectedLabId = document.getElementById('labSelect') ? document.getElementById('labSelect').value : '';
    window.addEventListener('labChanged', function (e) {
        //  console.log('Lab received in QualityIndicator:', e.detail.labId); // <-- Check here
        window.selectedLabId = e.detail.labId;
        // Call all updateCharts functions for all tabs
        if (typeof updateCharts === 'function') updateCharts();
        if (typeof updateChartsAnalytical === 'function') updateChartsAnalytical();
        if (typeof updateChartsPost === 'function') updateChartsPost();
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