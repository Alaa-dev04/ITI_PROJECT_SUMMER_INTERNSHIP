<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Http\Controllers\Controller;



class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recipes = Recipe::create([
            'name' => $request->name,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
            'image' => $request->image
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('recipe_images', 'public');
            $recipes->image = $path;
        }
        $recipes->save();
        return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     */
    //i want when  cliking on a recepie to go direactly to show ok 
    public function show(string $id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recipes = Recipe::find($id);
        $recipes->update([
            'name' => $request->name,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
            'image' => $request->image
        ]);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('recipe_images', 'public');
            $recipes->image = $path;
        }
        $recipes->save(); 
        return redirect()->route('recipes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipes = Recipe::find($id);
        $recipes->delete();
        return redirect()->route('recipes.index');
    }
}
