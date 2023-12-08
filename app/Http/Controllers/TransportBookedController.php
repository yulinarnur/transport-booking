<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Models\TransportBooked;

class TransportBookedController extends Controller
{
    public function index() {
        $user = Auth::user();
        $transportBookeds = TransportBooked::with(['transport', 'approver'])->orderBy('created_at', 'desc')->get();
        $drivers = Driver::with('transportBookings')->get();
        return view('backend.transportBooked.index', compact('user', 'transportBookeds'));
    }

    public function addTransportBooked(){
        $user = Auth::user();
        return view('backend.transportBooked.add', compact('user'));
    }

    public function store(Request $request){
        // validasi
        $dataValidation = $request->validate([
            'transport_id' => 'required|exists:transports,id',
            'booked_date' => 'required|date',
            'status' => 'required|string',
            'driver_id' => 'required|exists:drivers,id',
            'approver_id' => 'required|exists:users,id',
        ]);        

        $bookingTrans = new TransportBooked;
        $bookingTrans->transport_id = $dataValidation['transport_id'];
        $bookingTrans->booked_date = $dataValidation['booked_date'];
        $bookingTrans->status = $dataValidation['status'];
        $bookingTrans->driver_id = $dataValidation['driver_id'];
        $bookingTrans->approver_id = $dataValidation['approver_id'];
        $bookingTrans->save();

        return redirect()->route('backend.transportBooked')->with('success', "Data pemesanan kendaraan berhasil ditambahkan!");
    }

    public function destroy($id){
        $transportBooked = TransportBooked::findOrFail($id);
        $transportBooked->delete();

        return redirect()->route('backend.transportBooked')->with('warning', 'Data pemesanan kendaraan telah berhasil dihapus!'); 
    }
    
}