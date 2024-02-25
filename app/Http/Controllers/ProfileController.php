<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foto = Photo::all();
        return view('profile.index',compact('foto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'poto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Foto harus berupa gambar dengan maksimal 2MB
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Proses perubahan foto profil jika ada
        if ($request->hasFile('poto_profil')) {
            $poto_profil = $request->file('poto_profil');
            $path = $poto_profil->store('public/images'); // Simpan foto di penyimpanan tertentu
            $user->poto_profil = basename($path);
        }

        // Update nama dan alamat
        $user->name = $request->name;
        $user->address = $request->address;
        $user->save();

        return redirect()->back()->with('success', 'Profile berhasil diperbarui.');
    }

}
