<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    private $externalApiUrl = 'http://164.68.97.117:5271/'; // Replace with the actual external API URL

    public function register(Request $request)
    {
        $response = Http::post($this->externalApiUrl . '/register', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 201);
        } else {
            return response()->json(['error' => 'Registration failed'], 400);
        }
    }

    public function login(Request $request)
    {
        $response = Http::post($this->externalApiUrl . '/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json(['error' => 'Login failed'], 401);
        }
    }
}
