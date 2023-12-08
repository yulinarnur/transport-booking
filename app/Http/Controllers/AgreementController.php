<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransportBooked;
use App\Models\Driver;

class AgreementController extends Controller
{
    public function index() {
        $user = Auth::user();
       
        if ($user->level == 2) { 
            $transportBookeds = TransportBooked::with(['transport', 'approver'])
                ->where('approver_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $transportBookeds = TransportBooked::with(['transport', 'approver'])
                ->orderBy('created_at', 'desc')
                ->get();
        }
        
        $drivers = Driver::with('transportBookings')->get();
        return view('backend.agreement.index', compact('user', 'transportBookeds'));
    }

    public function edit($id){
        $user = Auth::user();
        $agreement = TransportBooked::findOrFail($id);
        return view('backend.agreement.edit', compact('user','agreement'));
    }
    
    public function approve($id) {
        $agreement = TransportBooked::findOrFail($id);
        $agreement->status = 'Disetujui';
        $agreement->save();
    
        return redirect()->route('backend.agreement')->with('success', 'Data persetujuan telah berhasil disetujui!');
    }
    
    public function reject($id) {
        $agreement = TransportBooked::findOrFail($id);
        $agreement->status = 'Ditolak';
        $agreement->save();
    
        return redirect()->route('backend.agreement')->with('warning', 'Data persetujuan telah berhasil ditolak!'); 
    }
}