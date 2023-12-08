<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Driver;

class DriversController extends Controller
{
    public function index(){
        $user = Auth::user();
        $drivers = Driver::all();
        return view('backend.driver.index', compact('user','drivers'));
    }

    public function addDriver() {
        $user = Auth::user();
        return view('backend.driver.add', compact('user'));
    }

    public function store(Request $request){
        // validasi 
        $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'nik' => 'required|string|max:17',
        ]);

        // simpan
        $driver = new Driver;
        $driver->nik = $request->nik;
        $driver->name = $request->name;
        $driver->no_telp = $request->no_telp;
        $driver->birth_date = $request->birth_date;
        $driver->gender = $request->gender;
        $driver->work_start_date = $request->work_start_date;
        $driver->address = $request->address;
        $driver->status = $request->status;
        $driver->save();

        return redirect()->route('backend.driver')->with('success', "Data driver berhasil ditambahkan!");
    }

    public function edit($id){
        $user = Auth::user();
        $driver = Driver::findOrFail($id);
        return view('backend.driver.edit', compact('user','driver'));
    }

    public function update(Request $request, $id){
        $driver = Driver::findOrFail($id);

        // validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'nik' => 'required|string|max:17',
        ]);

        // update
        $driver->update($request->all());
        return redirect()->route('backend.driver')->with('success', 'Data driver telah berhasil diubah!');
    }

    public function destroy($id){
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('backend.driver')->with('warning', 'Data driver telah berhasil dihapus!'); 
    }
}