<div class="table-responsive" style="padding-right: 1rem;">
    <table class="stock-planner-table">
        <thead>
            <tr style="position: sticky; top: 0px">
                <th colspan="6" rowspan="2">
                    <div class="d-flex" style="justify-content: space-around;">
                        <span> <i class="fa-solid fa-arrow-down"></i> Department</span> <span> Days <i
                                class="fa-solid fa-arrow-right"></i></span>
                    </div>
                    @for ($i = 1; $i <= 31; $i++)
                        <th colspan="2" rowspan="2">{{ $i }}<sup>
                                @if($i == 1) st
                                @elseif($i == 2) nd
                                @elseif($i == 3) rd
                                    @else th
                                @endif
                            </sup></th>
                    @endfor
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>
</div>

@push('scripts')
    <script>
        const tableData = {
            rows: [
                {
                    id: 1,
                    title: "No. Of Misidentified Requests",
                    subtitle: "Misidentified Requests",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "5.74%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                },
                {
                    id: 2,
                    title: "No. Of Misidentified Samples",
                    subtitle: "Misidentified Samples",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                },
                {
                    id: 3,
                    title: "No. Of Unlabelled Samples",
                    subtitle: "Unlabelled Samples",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                },
                {
                    id: 4,
                    title: "No. Of Samples With Wrong Or Inappropriate Type",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 5,
                    title: "No. Of Samples Collected In The Wrong Container",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                },
                {
                    id: 6,
                    title: "No. of Samples With Insufficient Sample Volume",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                },
                {
                    id: 7,
                    title: "No. of Samples With Inappropriate Sample-Anticoagulant Volume Ratio",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 8,
                    title: "No. of Missing Samples",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 9,
                    title: "No. of Samples Not Properly Stored Before Analysis",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 10,
                    title: "No. of Samples Damaged During Transportation",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 11,
                    title: "No. of Samples Transported at an Inappropriate Temperature",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 12,
                    title: "No. of Samples With Excessive Transportation Time",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 13,
                    title: "No. of Contaminated Samples",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 14,
                    title: "No. of Haemolysed Samples",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 15,
                    title: "No. of Clotted Samples",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 16,
                    title: "Total No of Rejections per month",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }, {
                    id: 17,
                    title: "No. Of Samples Delivered Outside The Specified Time (TAT)",
                    subtitle: "Wrong Or Inappropriate",
                    targetLabel: "% OUT OF TAT",
                    defaultPercentage: "0%",
                    otherPercentages: Array(30).fill("0%"),
                    totalSamplesInputs: Array(31).fill("")
                }
            ]
        };

        function calculatePercentage(typeValue, totalValue) {
            if (totalValue === 0 || totalValue === "") {
                return "0%";
            }
            const percentage = (parseFloat(typeValue) / parseFloat(totalValue)) * 100;
            return `${percentage.toFixed(2)}%`;
        }

        function renderTableBody() {
            const tableBody = document.getElementById('tableBody');
            tableBody.innerHTML = ''; // Clear existing content

            tableData.rows.forEach(row => {
                const mainRow = document.createElement('tr');

                // Add cells for ID, Title, Subtitle, etc.
                const idCell = document.createElement('td');
                idCell.setAttribute('colspan', '2');
                idCell.setAttribute('rowspan', '2');
                idCell.textContent = row.id;
                mainRow.appendChild(idCell);

                const titleCell = document.createElement('td');
                titleCell.setAttribute('colspan', '2');
                titleCell.setAttribute('rowspan', '2');
                titleCell.textContent = row.title;
                mainRow.appendChild(titleCell);

                const subtitleCell = document.createElement('td');
                subtitleCell.textContent = row.subtitle;
                mainRow.appendChild(subtitleCell);

                const targetLabelCell = document.createElement('td');
                targetLabelCell.setAttribute('rowspan', '2');
                targetLabelCell.textContent = row.targetLabel;
                mainRow.appendChild(targetLabelCell);

                // Add input fields for each day
                for (let day = 1; day <= 31; day++) {
                    const inputCell = document.createElement('td');
                    const input = document.createElement('input');
                    input.setAttribute('type', 'text');
                    input.setAttribute('name', `row${row.id}_day${day}_type`);
                    input.addEventListener('input', () => updatePercentage(row.id, day));
                    inputCell.appendChild(input);
                    mainRow.appendChild(inputCell);

                    const percentCell = document.createElement('td');
                    percentCell.setAttribute('rowspan', '2');
                    percentCell.setAttribute('id', `row${row.id}_day${day}_percent`);
                    percentCell.textContent = row.otherPercentages[day - 1] || "0%";
                    mainRow.appendChild(percentCell);
                }

                tableBody.appendChild(mainRow);

                // Add TOTAL SAMPLES row
                const totalRow = document.createElement('tr');
                const totalTitleCell = document.createElement('td');
                totalTitleCell.textContent = "TOTAL SAMPLES";
                totalRow.appendChild(totalTitleCell);

                for (let day = 1; day <= 31; day++) {
                    const inputCell = document.createElement('td');
                    const input = document.createElement('input');
                    input.setAttribute('type', 'text');
                    input.setAttribute('name', `row${row.id}_day${day}_total`);
                    input.addEventListener('input', () => updatePercentage(row.id, day));
                    inputCell.appendChild(input);
                    totalRow.appendChild(inputCell);
                }

                tableBody.appendChild(totalRow);
            });
        }

        function updatePercentage(rowId, day) {
            const typeInput = document.querySelector(`input[name="row${rowId}_day${day}_type"]`);
            const totalInput = document.querySelector(`input[name="row${rowId}_day${day}_total"]`);
            const percentCell = document.getElementById(`row${rowId}_day${day}_percent`);

            if (typeInput && totalInput && percentCell) {
                const typeValue = typeInput.value;
                const totalValue = totalInput.value;
                const percentage = calculatePercentage(typeValue, totalValue);
                percentCell.textContent = percentage;
            }
        }

        // Add this event listener for lab dropdown change
        // document.getElementById('labDropdown').addEventListener('change', function () {
        //     const selectedLabId = this.value;
        //     fetchAndPopulateFormData(selectedLabId);
        // });
        document.getElementById('labDropdown').addEventListener('change', function () {
            console.log('Lab changed to:', this.value);
            fetchAndPopulateFormData(this.value);
        });
        async function fetchAndPopulateFormData(labId = null) {
            try {
                // Get the selected lab ID or fall back to user's default
                if (!labId) {
                    const labDropdown = document.getElementById('labDropdown');
                    labId = labDropdown.value || '{{ auth()->user()->lab_id }}';
                }

                // Always render the complete form structure first
                renderTableBody();

                // Show loading state for data population
                const loadingRow = document.createElement('tr');
                loadingRow.innerHTML = '<td colspan="69" style="text-align: center; padding: 20px;">Loading data...</td>';
                document.getElementById('tableBody').appendChild(loadingRow);

                // Fetch data from the server
                const response = await fetch(`/api/get-quality-form-data?lab_id=${labId}`);
                const data = await response.json();

                // Remove loading row
                loadingRow.remove();

                if (data.success) {
                    // If data exists, populate it, otherwise leave fields blank
                    if (data.data && data.data.length > 0) {
                        populateFormFields(data.data);
                    }
                    // If no data, the form remains with empty fields ready for input
                } else {
                    console.error("Failed to fetch data:", data.message);
                    // Form remains visible with empty fields
                }
            } catch (error) {
                console.error("Error fetching data:", error);
                // Form remains visible with empty fields
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM loaded');
            renderTableBody(); // Render the empty table structure

            // Get initial lab selection
            const labDropdown = document.getElementById('labDropdown');
            const initialLabId = labDropdown.value || '{{ auth()->user()->lab_id }}';
            console.log('Initial lab ID:', initialLabId);

            // Fetch data for initial lab
            fetchAndPopulateFormData(initialLabId);
        });
        function populateFormFields(data) {
            // First, group the data by row_id for easier processing
            const groupedData = {};
            data.forEach(item => {
                if (!groupedData[item.row_id]) {
                    groupedData[item.row_id] = [];
                }
                groupedData[item.row_id].push(item);
            });

            // Populate each row's data
            Object.keys(groupedData).forEach(rowId => {
                groupedData[rowId].forEach(dayData => {
                    const day = dayData.day;

                    // Populate type input field
                    const typeInput = document.querySelector(`input[name="row${rowId}_day${day}_type"]`);
                    if (typeInput) {
                        typeInput.value = dayData.type_value || '';
                    }

                    // Populate total input field
                    const totalInput = document.querySelector(`input[name="row${rowId}_day${day}_total"]`);
                    if (totalInput) {
                        totalInput.value = dayData.total_value || '';
                    }

                    // Update percentage display
                    updatePercentage(rowId, day);
                });
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            renderTableBody();
            // Fetch data for initially selected lab
            const initialLabId = document.getElementById('labDropdown').value || '{{ auth()->user()->lab_id }}';
            fetchAndPopulateFormData(initialLabId);
        });
        document.addEventListener('DOMContentLoaded', renderTableBody);

        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".wapp-chat-item");
            const panels = document.querySelectorAll(".wapp-main-chat");
            debugger
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
        });

        // Function to collect form data
        function collectFormData() {
            const formData = [];

            tableData.rows.forEach(row => {
                const rowData = {
                    id: row.id,
                    title: row.title,
                    subtitle: row.subtitle,
                    days: [],
                };

                for (let day = 1; day <= 31; day++) {
                    const typeValue = document.querySelector(`input[name="row${row.id}_day${day}_type"]`).value;
                    const totalValue = document.querySelector(`input[name="row${row.id}_day${day}_total"]`).value;

                    rowData.days.push({
                        day: day,
                        type: typeValue,
                        total: totalValue,
                    });
                }

                formData.push(rowData);
            });

            return formData;
        }

        function submitFormData() {
            const formData = collectFormData();
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Get selected lab ID or fallback to user's lab_id
            const labDropdown = document.getElementById('labDropdown');
            const labId = labDropdown.value || '{{ auth()->user()->lab_id }}';

            // Add lab_id to EACH ROW of the form data
            if (Array.isArray(formData)) {
                formData.forEach(row => {
                    row.lab_id = labId;
                });
            } else {
                // If formData is an object, ensure proper structure
                formData.lab_id = labId;
                if (formData.rows && Array.isArray(formData.rows)) {
                    formData.rows.forEach(row => {
                        row.lab_id = labId;
                    });
                }
            }

            // Debug: Check the final payload
            console.log("Submitting data:", JSON.stringify(formData, null, 2));

            // Send the data to the backend
            fetch("/api/submit-quality-form", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify(formData),
            })
                .then((response) => response.json())
                .then((data) => {
                    console.log("Success:", data);
                    alert("Form submitted successfully!");
                    location.reload();
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("An error occurred while submitting the form.");
                });
        }
        document.getElementById("submitButton").addEventListener("click", submitFormData);



    </script>
@endpush