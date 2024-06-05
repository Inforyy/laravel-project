@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto my-8">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>
        <form id="loginForm" class="space-y-4" action="javascript:void(0)">
            @csrf
            <div>
                <label for="email" class="block">Email:</label>
                <input type="email" class="form-input w-full rounded-md" id="email" name="email" required>
            </div>
            <div>
                <label for="password" class="block">Password:</label>
                <input type="password" class="form-input w-full rounded-md" id="password" name="password" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">Login</button>
        </form>
    </div>

    <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();

        fetch('http://164.68.97.117:5271/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                twoFactorCode: 'string', // Provide the two-factor code here
                twoFactorRecoveryCode: 'string' // Provide the recovery code here
            })
        })
        .then(response => {
            if (response.ok) {
                return response.json(); // Parse response body as JSON
            } else {
                throw new Error('Login failed');
            }
        })
        .then(data => {
            console.log('Access Token:', data.accessToken); // Log access token to console
            if (data.accessToken) {
                // Store the access token in a cookie
                document.cookie = `accessToken=${data.accessToken}; path=/; SameSite=None; Secure; expires=Wed, 21 Dec 2022 12:00:00 UTC`;
                document.cookie = `accessToken=${data.accessToken}; path=/; SameSite=None; Secure; expires=Wed, 21 Dec 2022 12:00:00 UTC`;
                alert('Login successful!');

            } else {
                throw new Error('Access token missing or invalid');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Login failed!');
        });
    });
</script>

@endsection
