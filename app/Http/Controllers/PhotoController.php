<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foto= Photo::all();
        return view('photo.index',compact('foto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi
        // dd($request->all());

        $this->validate($request, [
            'judul_foto' => 'required',
            'deskripsi' => 'required',
            'lokasi_file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'judul_foto.required' => 'Judul foto wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'lokasi_file.required' => 'Lokasi file wajib diisi.',
            'lokasi_file.image' => 'Berkas yang diunggah harus berupa gambar.',
            'lokasi_file.mimes' => 'Format file hanya diperbolehkan untuk: jpeg, png, jpg.',
            'lokasi_file.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
        ]);


    //   upload image
    $gambar = time(). '.' .$request->lokasi_file->extension();
    $request->lokasi_file ->storeAs('public/images',$gambar);

        Photo::create([
            'judul_foto' => $request->judul_foto,
            'deskripsi' => $request->deskripsi,
            'lokasi_file' => $gambar,
            'user_id'=> Auth::user()->id

            ]);

       return redirect()->back()->with('success','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $foto = Photo::find($id);
        return view('photo.show',compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $Photo )
    {
        //
    }
}
