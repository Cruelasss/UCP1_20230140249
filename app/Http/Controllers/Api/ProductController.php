<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Added Product Model
use App\Http\Requests\StoreProductRequest; // Added Form Request
use Illuminate\Support\Facades\Auth; // Added Auth Facade
use Illuminate\Support\Facades\Log; // Added Log Facade

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $products = Product::with('category')->get();
    return response()->json([
        'message' => 'Daftar produk berhasil diambil',
        'data' => $products
    ], 200); // 200 OK
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreProductRequest $request)
{
    try {
        // 1. Ambil data yang sudah lolos validasi (name, qty, price, category_id)
        $validated = $request->validated();

        // 2. ISI OTOMATIS user_id dari user yang login lewat token
        $validated['user_id'] = Auth::id(); 

        // 3. Simpan ke database
        $product = Product::create($validated);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan!!',
            'data' => $product,
        ], 201);
    } catch (\Throwable $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            $product = Product::with('category')->find($id);

            if (!$product) {
                return response()->json([
                    'message' => 'Product tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'message' => 'Product retrieved successfully',
                'data' => $product
            ], 200);
            
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data produk', [
                'message' => $e->getMessage(),
            ]);
            
            // Added a return response for the error state
            return response()->json([
                'message' => 'Terjadi kesalahan pada server.',
            ], 500);
        }
    } // <--- ADDED THE MISSING CLOSING BRACE HERE

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, int $id)
{
    try {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product tidak ditemukan'], 404);
        }

        // Cek Otorisasi (Hanya pemilik yang bisa update)
        if ($product->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $product->update($request->validated());

        return response()->json([
            'message' => 'Produk berhasil diperbarui!',
            'data' => $product
        ], 200);
    } catch (\Throwable $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
{
    try {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product tidak ditemukan'], 404);
        }

        // Cek Otorisasi (Hanya pemilik yang bisa delete)
        if ($product->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $product->delete();

        return response()->json([
            'message' => 'Produk berhasil dihapus!'
        ], 200); // Atau 204 No Content
    } catch (\Throwable $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}
}