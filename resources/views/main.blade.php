<x-app-layout>
    
    <body>
    
        <div class="mainpage inline-flex items-center">  
            <div class="left-section">
                <img src="https://cdn.linak.com/-/media/images/applications/main/office-desks-application.jpg?bc=white&as=1&h=750&iar=0&w=750&rev=192b4a3e-9bb9-42e0-b2ca-f63814bde3fd&quality=75&hash=56726E8939B16A9A741900E86BF1CDC9"
                    alt="Example Image" class="image">
            </div>
            <div class="right-section">
                <button class="btn" onclick="window.location.href='/scheduler'">Scheduler</button>
                <button class="btn" onclick="window.location.href='/profile'">Profile</button>
                <button class="btn" onclick="window.location.href='/graph'">Analytics</button>
    
            </div>
        </div>
    

    
    
    
        <script src="{{ asset('js/support.js') }}"></script>
    </body>
    
    </x-app-layout>