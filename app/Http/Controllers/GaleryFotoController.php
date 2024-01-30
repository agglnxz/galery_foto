<?php

namespace App\Http\Controllers;

use App\Models\GaleryFoto;
use Illuminate\Http\Request;

class GaleryFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('galery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>"required",
            'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=>"required",
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(GaleryFoto $galeryFoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GaleryFoto $galeryFoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GaleryFoto $galeryFoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GaleryFoto $galeryFoto)
    {
        //
    }
}
