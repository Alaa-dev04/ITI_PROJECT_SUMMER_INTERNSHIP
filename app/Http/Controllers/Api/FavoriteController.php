<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Recipe;
use App\Http\Resources\FavoriteResource;
use Illuminate\Support\Facades\Auth;    

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $favorites = Favorite::where('device_id', $request->device_id)->with('recipe')->get();
        return response()->json(["message" => "success",
         "data" => FavoriteResource::collection($favorites)]);

    }
    public function store(Request $request)
    {
    $favorite = Favorite::create([
        'device_id' => $request->device_id,
        'recipe_id' => $request->recipe_id,
    ]);
    $favorite->load('recipe');

    return response()->json([
        'message' => 'Recipe added to favorites successfully!',
        'data' =>  FavoriteResource::make($favorite)
    ], 201);
    }
    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Recipe removed from favorites successfully!']);
        } else {
            return response()->json(['message' => 'Favorite not found'], 404);
        }
    }

}


