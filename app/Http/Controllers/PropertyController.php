<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        $property = Property::where('user_id', null)->latest()->get();
        return view('DashBoard', compact('property'));
    }

    public function show($id)
    {
        $prop = Property::findOrFail($id);
        return view('PropertyDetail', compact('prop'));
    }

    public function create()
    {
        return view('admin.AddDataForm');
    }

    public function store(Request $request)
    {
        $index = Property::count() + 1;

        $newProp = $request->validate([
            'photo'      => 'nullable|string',
            'owner_name' => 'required|string|max:255',
            'price'      => 'required|numeric|min:0',
            'city'       => 'required|string|max:100',
            'state'      => 'required|string|max:100',
            'country'    => 'required|string|max:100',
            'bed_room'   => 'required|integer|min:0',
            'bath_room'  => 'required|integer|min:0',
            'summary'    => 'nullable|string',
            'area_l'     => 'required|integer|min:0',
            'area_w'     => 'required|integer|min:0',
            'review'     => 'required|integer|min:1|max:10',
        ]);

        Property::create(array_merge([
            'property_id' => 'PP' . $index,
            'user_id' => null, 
        ] ,$newProp));

        return redirect()->route('admin.adminDashboard');
    }

    public function edit($id)
    {
        $prop = Property::findOrFail($id);
        return view('admin.EditProperty')->with('prop', $prop);
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'photo'      => 'nullable|string',
            'owner_name' => 'required|string|max:255',
            'price'      => 'required|numeric|min:0',
            'city'       => 'required|string|max:100',
            'state'      => 'required|string|max:100',
            'country'    => 'required|string|max:100',
            'bed_room'   => 'required|numeric|min:0',
            'bath_room'  => 'required|numeric|min:0',
            'summary'    => 'nullable|string',
            'area_l'     => 'required|numeric|min:0',
            'area_w'     => 'required|numeric|min:0',
            'review'     => 'required|integer|min:1|max:10',
        ]);

        $property->update($request->all());
        return redirect()->route('admin.adminDashboard');
    }

    public function destroy(Property $property) {
        $property->delete();
        
        return redirect()->route('admin.adminDashboard');
    }

    public function payment($id) {
        $prop = Property::find($id);
        return view('Payment')->with('property', $prop);
    }

    public function purchase($id) {
        $property = Property::find($id);
        $property->update(['user_id' => Auth::user()->user_id]);
        return redirect()->route('dashboard');
    }
}
