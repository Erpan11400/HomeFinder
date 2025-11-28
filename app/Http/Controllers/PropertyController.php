<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $property = Property::latest()->get();
        return view('DashBoard', compact('property'));
    }

    public function show($id)
    {
        $prop = Property::findOrFail($id);
        return view('PropertyDetail', compact('prop'));
    }

    public function create()
    {
        return view('AddDataForm');
    }

    public function store(Request $request)
    {
        $request->validate([
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

        Property::create($request->all());

        return redirect()->route('property.index');
    }

    public function edit($id)
    {
        $prop = Property::findOrFail($id);
        return view('EditProperty')->with('prop', $prop);
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
            'bed_room'   => 'required|integer|min:0',
            'bath_room'  => 'required|integer|min:0',
            'summary'    => 'nullable|string',
            'area_l'     => 'required|integer|min:0',
            'area_w'     => 'required|integer|min:0',
            'review'     => 'required|integer|min:1|max:10',
        ]);

        $property->update($request->all());
        return redirect()->route('property.index');
    }

    public function destroy(Property $property) {
        $property->delete();
        
        return redirect()->route('property.index');
    }
}
