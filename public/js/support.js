function toggleDropdown() {
    var menu = document.getElementById("dropdownMenu");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
}

window.onclick = function (event) {
    if (!event.target.matches('.profile-menu img')) {
        var dropdowns = document.getElementsByClassName("dropdown-menu");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.style.display === "block") {
                openDropdown.style.display = "none";
            }
        }
    }
};


document.getElementById('dream-team-title').addEventListener('click', function () {
    const duration = 3 * 1000;
    const end = Date.now() + duration;

    (function frame() {
        confetti({
            particleCount: 5,
            angle: 60,
            spread: 55,
            origin: { x: 0 },
        });
        confetti({
            particleCount: 5,
            angle: 120,
            spread: 55,
            origin: { x: 1 },
        });

        if (Date.now() < end) {
            requestAnimationFrame(frame);
        }
    })();
});

// javascript for chart
import Chart from 'chart.js';

document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('myChart').getContext('2d');
    let myChart;
    let jsonData;

    // Fetch JSON data
    fetch("{{ asset('json/data.json') }}")
        .then(function (response) {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Failed to fetch data.');
            }
        })
        .then(function (data) {
            console.log('Fetched Data:', data); // Verify if data is fetched correctly
            jsonData = data;
            // Create initial chart with 'bar' type
            createChart(data, 'bar');
        })
        .catch(function (error) {
            console.error('Error:', error);
        });

    // Function to create a chart
    function createChart(data, type) {
        if (myChart) {
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: type, // Use the variable 'type' here
            data: {
                labels: data.map(row => row.day),
                datasets: [{
                    label: 'Height Data',
                    data: data.map(row => row.height),
                    borderWidth: 1,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false
            }
        });
    }

    // Attach event listeners to buttons
    document.querySelectorAll('.chart_types button').forEach(button => {
        button.addEventListener('click', function () {
            const chartType = this.getAttribute('data-chart-type'); // Fixed to use data-chart-type
            setChartType(chartType);
        });
    });

    // Function to change chart type
    function setChartType(chartType) {
        createChart(jsonData, chartType);
    }
});
