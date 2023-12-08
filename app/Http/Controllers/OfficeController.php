<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Office;
use App\Models\Region;

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

    public function edit($id){
        $user = Auth::user();
        $office = Office::findOrFail($id);
        $regions = Region::all();
        return view('backend.office.edit', compact('user','office', 'regions'));
    }
    
    public function update(Request $request, $id){
        $office = Office::findOrFail($id);

        // validasi
        $request->validate([
            'office_type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // update
        $office->update($request->all());
        return redirect()->route('backend.office')->with('success', 'Data office telah berhasil diubah!');
    }

    public function destroy($id){
        $office = Office::findOrFail($id);
        $office->delete();

        return redirect()->route('backend.office')->with('warning', 'Data office telah berhasil dihapus!'); 
    }
}