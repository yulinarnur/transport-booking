<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;

class RegionController extends Controller
{
    public function index() {
        $user = Auth::user();
        $regions = Region::all();
        return view('backend.region.index', compact('user', 'regions'));
    }
    
    
}