<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Http\Resources\RecipeResource;
class RecipeApiController extends Controller
{
    public function index(){
        $recipes = Recipe::all();
        return response()->json(["message"=>"success","data"=>RecipeResource::collection($recipes)]);
    }

    public function show($id){
        $recipe = Recipe::find($id);
        if($recipe){
            return response()->json(["message"=>"success","data"=> RecipeResource::make($recipe)]);
        }else{
            return response()->json(["message"=>"Recipe not found"],404);
        }
    }
}
