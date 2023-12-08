<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use Illuminate\Support\Facades\Auth;

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

            // pindahkan file, jika gagal akan muncul pesan error
            if (!$image->move(public_path('images/transports'), $filename)) {
                return back()->with('error', 'Gagal mengupload gambar.');
            }
            
            $data['image'] = 'images/transports/' . $filename;
        }
    
        Transport::create($data);
        return redirect()->route('backend.transport')->with('success', "Data transport berhasil ditambahkan!");
    }
    
    public function destroy($id){
        $transport = Transport::findOrFail($id);
        $transport->delete();

        return redirect()->route('backend.transport')->with('warning', 'Data transport telah berhasil dihapus!'); 
    }
}