<?php

namespace App\Http\Controllers;

use App\Models\welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
    }
}
