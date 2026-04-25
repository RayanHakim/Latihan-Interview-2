<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Menampilkan daftar toko dengan filter keamanan.
     */
    public function index()
    {
        // Ambil data user yang sedang login dari token
        $user = Auth::guard('api')->user();

        // Logika Filter:
        if ($user->role === 'superadmin') {
            // Superadmin bisa melihat semua toko beserta usernya
            $stores = Store::with('users')->get();
        } else {
            // Admin atau Kasir hanya bisa melihat toko tempat mereka terdaftar

            $stores = Store::with('users')
                ->where('id', $user->store_id)
                ->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Daftar toko berhasil diambil untuk: ' . $user->name,
            'data'    => $stores
        ]);
    }

    /**
     * Membuat Toko Baru (Hanya Superadmin via Middleware)
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'level'   => 'required|in:pusat,cabang,retail',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        // 2. Simpan Toko 
        $store = Store::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Toko berhasil dibuat! Admin & Kasir otomatis terdaftar.',
            'data'    => $store->load('users') // Mengambil data user yang baru dibuat otomatis
        ], 201);
    }
}