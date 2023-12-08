<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Office;

class OfficeController extends Controller
{
    public function index(){
        $user = Auth::user();
        $office = Office::all();
        return view('backend.office.index', compact('user', 'office'));
    }

    public function addOffice() {
        $user = Auth::user();
        return view('backend.office.add', compact('user'));
    }

    public function store(Request $request){
        // validasi
        $request->validate([
            'office_type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // simpan
        $office = new Office;
        $office->office_type = $request->office_type;
        $office->region_id = $request->region_id;
        $office->address = $request->address;
        $office->save();

        return redirect()->route('backend.office')->with('success', "Data office berhasil ditambahkan!");
    }
}