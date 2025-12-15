<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function showAll() {

        $user = Auth::user();

        $favorites = $user->favorites()->get();

        return view('Favorite', compact('favorites'));
    }

    public function store(Property $property) {
        $user = Auth::user();

        if (!$user->favorites()->wherePivot('property_id', $property->property_id)->exists()) {
            // echo 'tidak ada';
            $user->favorites()->attach($property->property_id);
            return redirect()->route('showFavorite');
        }
        else {
            echo 'property sudah ada di favorite';
        }
        
    }

    public function destroy(Property $property) {
        $user = Auth::user();

        $user->favorites()->detach($property->property_id);

        return back();
    }
}
