<x-app-layout>
    <body>
    
    <main class="main-content">
    <section class="common pt-8"></section>        
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
    
    
    
        <script src="{{ asset('js/support.js') }}"></script>
    </body>
    </x-app-layout>