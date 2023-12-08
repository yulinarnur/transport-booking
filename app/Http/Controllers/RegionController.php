<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Region;

class RegionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        $regions = Region::all();
        return view('backend.region.index', compact('user', 'regions'));
    }

    public function addRegion() {
        $user = Auth::user();
        return view('backend.region.add', compact('user'));
    }

    public function store(Request $request){
        // validasi
        $request->validate([
            'city_name' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'province' => 'required|string|max:255',
        ]);

        // simpan
        $region = new Region;
        $region->city_name = $request->city_name;
        $region->regency = $request->regency;
        $region->province = $request->province;
        $region->save();

        return redirect()->route('backend.region')->with('success', "Data region berhasil ditambahkan!");
    }
    
    
    
}