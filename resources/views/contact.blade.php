<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/support.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>SUPPORT</title>


</head>
<body>
    <div class="container">
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

<main class="main-content">
<section class="common"></section>        
<section class="contact-section">
        
        
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif
        
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" name="email" id="email" placeholder="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject" placeholder="subject" required>
            </div>
            <div class="form-group">
                <label for="content">Message:</label>
                <textarea name="content" id="content" placeholder="what is the issue?" required></textarea>
            </div>
            <button type="submit">Send Email</button>
        </form>
</section>
</main>

<div class="bottom">
    <div class="bottom-section">
        <h4>Company</h4>
        <ul>
            <li><a href=".about">About us</a></li>
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

<div class="end">
    <footer>
        <marquee>
            <p>©2024 Made by Group 7 | All Rights Reserved</p>
        </marquee>
    </footer>
</div>


    <script src="{{ asset('js/support.js') }}"></script>
</body>
</html>