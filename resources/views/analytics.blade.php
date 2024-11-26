<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>ANALYTICS</title>
</head>

<body>
    <div class="container">
        <!-- Logo and Profile Menu -->
        <div class="logo">
            <img src="https://img.icons8.com/quill/100/228BE6/galaxy.png" alt="Home" />
            <h1><a href="/main">Atari800</a></h1>
        </div>
        <div class="profile-menu">
            <img src="{{ asset('images/profile.png') }}" alt="Profile" onclick="toggleDropdown()">
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="/profilepage">Profile</a>
                <a href="/settings">Settings</a>
            </div>
        </div>
    </div>


    <div class="card_body">
        <canvas id="myChart"></canvas>
    </div>



    <!-- Footer Section -->
    <div class="bottom">
        <div class="bottom-section">
            <h4>Company</h4>
            <ul>
                <li><a href="/about">About us</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Affiliate program</a></li>
            </ul>
        </div>
        <div class="bottom-section">
            <h4>Help</h4>
            <ul>
                <li><a href="#">Q&A</a></li>
                <li><a href="#">Sign up</a></li>
            </ul>
        </div>
        <div class="bottom-section">
            <h4>Contact us</h4>
            <ul>
                <li>Alsion 2, 6400 Sønderborg</li>
                <li>Telephone: 6550 1160</li>
            </ul>
        </div>
    </div>

    <footer>
        <marquee class="marquee">
            <p>©2024 Made by Group 7 | All Rights Reserved</p>
        </marquee>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/support.js') }}"></script>
    <script>
        const ctx = document.getElementById('myChart');
        const labels = {!! json_encode($labels) !!};
        const data = {!! json_encode($data) !!};

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# Height',
                    data: data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
