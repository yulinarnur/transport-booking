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
}