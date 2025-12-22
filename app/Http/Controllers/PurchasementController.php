<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Purchasement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchasementController extends Controller
{
    public function payment($id) {
        $prop = Property::find($id);
        return view('Payment')->with('property', $prop);
    }

    public function purchase(Request $request) {
        $request->validate([
            'property_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'payment_method' => 'required'
        ]);
        
        $property = Property::find($request->property_id);

        Purchasement::create([
            'user_id' => Auth::user()->user_id,
            'property_id' => $request->property_id,
            'payment_method' => $request->payment_method,
            'total' => $property->price + 50000,
        ]);
        
        $property->update(['user_id' => Auth::user()->user_id]);
        
        return redirect()->back()->with('prop', $property)->with('openModal', true);
    }

    public function historyPurchasement($id) {
        $prop = Purchasement::where('user_id', $id)
            ->with('property')    
            ->get();
        return view('PurchasementHistory')->with('purchases', $prop);
    }
}
