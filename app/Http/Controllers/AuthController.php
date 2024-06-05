<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    private $externalApiUrl = 'http://164.68.97.117:5271'; // Replace with the actual external API URL

    // public function showRegisterForm()
    // {
    //     return view('auth.register');
    // }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->post('http://164.68.97.117:5271/login', [
                'json' => [
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'twoFactorCode' => 'string',
                    'twoFactorRecoveryCode' => 'string',
                ]
            ]);

            // Handle the response here
            $statusCode = $response->getStatusCode();
            $data = $response->getBody()->getContents();

            // Return response to client
            return response()->json(['status' => $statusCode, 'data' => $data]);

        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
