<x-app-layout>
    <body>
        <div class="card_body">
            <canvas id="myChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');
            const labels = {!! json_encode($labels) !!}; // X-axis (time)
            const datasets = {!! json_encode($datasets) !!}; // Each desk's data

            new Chart(ctx, {
                type: 'line', // Line chart for better visualization
                data: {
                    labels: labels,
                    datasets: datasets,
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Time',
                            },
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Height (mm)',
                            },
                        },
                    },
                },
            });
        </script>
    </body>
</x-app-layout>
