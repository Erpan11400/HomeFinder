<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Menampilkan data properti saat akses pertama kali
    public function index() {

        $property = Property::all();

        return view('DashBoard', compact('property'));
    }

    // Menampilkan detail property
    public function show($id) {
        $prop = Property::find($id);

        return view('PropertyDetail', compact('prop'));
    }
}
