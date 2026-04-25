<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Tambahkan ini agar Auth lebih stabil

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validasi input
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 2. Cek email & password (Gunakan Guard 'api' secara eksplisit)
        $credentials = $request->only('email', 'password');

        // Pastikan driver di config/auth.php sudah 'jwt'
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password salah!'
            ], 401);
        }

        // 3. Jika berhasil, kirim token
        return response()->json([
            'success' => true,
            'user'    => Auth::guard('api')->user(),
            'token'   => $token,
            'type'    => 'bearer',
        ]);
    }
}