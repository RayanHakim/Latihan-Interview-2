<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Menambahkan produk baru (Otomatis masuk ke toko si pembuat)
     */
    public function store(Request $request)
    {
        $user = Auth::guard('api')->user();

        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'sku'   => 'required|string|unique:products,sku',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        // 2. Simpan Produk (store_id diambil otomatis dari user yang login)
        $product = Product::create([
            'store_id' => $user->store_id, 
            'name'     => $request->name,
            'sku'      => $request->sku,
            'stock'    => $request->stock,
            'price'    => $request->price,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke toko Anda!',
            'data'    => $product
        ], 201);
    }
}