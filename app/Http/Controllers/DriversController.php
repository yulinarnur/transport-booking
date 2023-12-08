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
    public function destroy($id){
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('backend.driver')->with('warning', 'Data driver telah berhasil dihapus!'); 
    }
}