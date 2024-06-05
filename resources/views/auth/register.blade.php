@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto my-8">
        <h2 class="text-2xl font-semibold mb-4">Register</h2>
        <form id="registerForm" method="POST" action="{{ url('/api/register') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block">Email:</label>
                <input type="email" class="form-input w-full rounded-md" id="email" name="email" required>
            </div>
            <div>
                <label for="password" class="block">Password:</label>
                <input type="password" class="form-input w-full rounded-md" id="password" name="password" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors">Register</button>
        </form>
    </div>

    <script>
        $('#registerForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/register',
                type: 'POST',
                data: {
                    email: $('#email').val(),
                    password: $('#password').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('Registration successful!');
                    window.location.href = "{{ url('/login') }}"; // Redirect to the login page
                },
                error: function(response) {
                    alert('Registration failed!');
                }
            });
        });
    </script>
@endsection
