<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 1. Nampilin daftar toko yang masih 'pending'
    public function index()
    {
        $pending_stores = Store::where('status', 'pending')->with('user')->get();
        return view('admin_stores', compact('pending_stores'));
    }

    // 2. Tombol Terima (Approve)
    public function approve($id)
    {
        $store = Store::findOrFail($id);
        
        // Disamakan dengan gembok di ProductController
        $store->status = 'approved'; 
        $store->save();

        return back()->with('success', 'Toko ' . $store->nama_toko . ' berhasil di-Approve!');
    }

    // 3. Tombol Tolak (Reject)
    public function reject($id)
    {
        $store = Store::findOrFail($id);
        $store->status = 'ditolak';
        $store->save();

        return back()->with('success', 'Toko ' . $store->nama_toko . ' berhasil ditolak!');
    }
}