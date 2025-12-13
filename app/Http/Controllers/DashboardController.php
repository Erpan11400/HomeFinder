<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index(){

        $property = Property::latest()->take(8)->get();
        return view('DashBoard', compact('property'));
    
    }
}
