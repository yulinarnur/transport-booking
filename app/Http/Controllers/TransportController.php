<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransportController extends Controller
{
    public function index(){
        $user = Auth::user();
        $transports = Transport::with('company')->get();
        return view('backend.transport.index', compact('user','transports'));
    }

    public function addTransport() {
        $user = Auth::user();
        return view('backend.transport.add', compact('user'));
    }

    public function store(Request $request) {
        // validasi
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $data = $request->all();
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // pindahkan file, menggunakan storage nya laravel
            $path = $image->storeAs('transports', $filename, 'public');

            $data['image'] = $path;
        }
    
        Transport::create($data);
        return redirect()->route('backend.transport')->with('success', "Data transport berhasil ditambahkan!");
    }

    public function edit($id){
        $user = Auth::user();
        $transport = Transport::findOrFail($id);
        return view('backend.transport.edit', compact('user','transport'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'no_pol' => 'required',
            'transport_type' => 'required|in:Angkutan Orang,Angkutan Barang',
            'company_id' => 'nullable|exists:companies,id',
            'status' => 'required|in:Hak Milik,Sewa',
            'bbm_consume' => 'required',
            'service_schedule' => 'required|date'
        ]);

        $transport = Transport::findOrFail($id);
        
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($transport->image) {
                Storage::disk('public')->delete($transport->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('transports', 'public');
            $transport->image = $imagePath;
        }
        
        $transport->update([
            'name' => $request->name,
            'no_pol' => $request->no_pol,
            'transport_type' => $request->transport_type,
            'company_id' => $request->company_id,
            'status' => $request->status,
            'bbm_consume' => $request->bbm_consume,
            'service_schedule' => $request->service_schedule
        ]);

        return redirect()->route('backend.transport')->with('success', 'Data transport berhasil diperbarui.');
    }

    public function destroy($id){
        $transport = Transport::findOrFail($id);
        $transport->delete();

        return redirect()->route('backend.transport')->with('warning', 'Data transport telah berhasil dihapus!'); 
    }
}