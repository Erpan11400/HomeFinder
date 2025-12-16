<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $property = Property::where('user_id', null)->latest()->take(8)->get();
        return view('DashBoard', compact('property'));
    
    }

    public function adminDashboard() {
        $prop = Property::all();
        session(['adminProp' => $prop]);
        return view('admin.AdminDashboard');
    }
}
