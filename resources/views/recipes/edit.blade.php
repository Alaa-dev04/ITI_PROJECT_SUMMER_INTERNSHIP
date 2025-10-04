@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-2xl" style="max-width: 600px; margin: auto; padding: 20px; background-color: #e6ddddff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <h1 class="text-2xl font-bold mb-6 text-center">Edit Recipe</h1>

    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Recipe Name -->
        <div class="mb-4" >
            <label class="block font-semibold mb-2" for="name">Recipe Name:</label>
            <input style="width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" type="text" name="name" id="name" value="{{ old('name', $recipe->name) }}" 
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <!-- Ingredients -->
        <div class="mb-4">
            <label class="block font-semibold mb-2" for="ingredients">Ingredients:</label>
            <textarea style="width:90%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; height: 200px;" name="ingredients" id="ingredients" rows="4" 
                      class="w-full border rounded px-3 py-2">{{ old('ingredients', $recipe->ingredients) }}</textarea>
        </div>

        <!-- Steps -->
        <div class="mb-4">
            <label class="block font-semibold mb-2" for="steps">Steps:</label>
            <textarea name="steps" id="steps" rows="6"  style="width:90%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; height: 300px;"
                      class="w-full border rounded px-3 py-2">{{ old('steps', $recipe->steps) }}</textarea>
        </div>

        <!-- Current Image -->
        @if($recipe->image)
            <div class="mb-4" >
                <p class="font-semibold mb-2">Current Image:</p>
                <img style="border-radius: 15px; width: 200px; height: 250px; object-fit: cover;" src="{{ asset('storage/'.$recipe->image) }}" alt="{{ $recipe->name }}" 
                     class="w-48 h-48 object-cover rounded mb-2">
            </div>
        @endif

        <!-- Upload New Image -->
        <div class="mb-6">
            <label class="block font-semibold mb-2" for="image">Change Image:</label>
            <input type="file" name="image" id="image" accept="image/*">
        </div>

        <!-- Submit -->
        <button type="submit" 
                class="bg-pink-600 text-white px-6 py-2 rounded hover:bg-pink-700 transition">
            Update Recipe
        </button>
    </form>
</div>
@endsection
