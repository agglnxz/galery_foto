<?php

namespace App\Http\Controllers;

use App\Models\Welcome;
use Illuminate\Http\Request;
use App\models\photo;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foto = Photo::all();
        return view('dashboard', compact('foto'));
    }
}
