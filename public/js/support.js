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
        jsonData = data;
        createChart(data, 'bar');
    })
    .catch(function (error) {
        console.error('Error:', error);
    });

function setChartType(chartType) {
    if (myChart) {
        myChart.destroy();
    }
    createChart(jsonData, chartType);
}

function createChart(data, type) {
    myChart = new Chart(ctx, {
        type: type,
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
