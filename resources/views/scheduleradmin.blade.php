<x-app-layout>   

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

    <script src="./app.js"></script>
    <script src="{{ asset('js/support.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0"></script>



</body>

</x-app-layout>   