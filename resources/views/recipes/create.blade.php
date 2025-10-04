@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-xl" style="max-width: 600px; margin: auto; padding: 20px; background-color: #e6ddddff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <h1 class="text-2xl font-bold mb-6 text-center">Add New Recipe</h1>

    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Recipe Name -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Recipe Name</label>
            <input style="width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;" type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ingredients -->
        <div class="mb-4">
            <label for="ingredients" class="block text-gray-700 font-semibold mb-2">Ingredients</label>
            <input style="width:90%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; height: 200px;" type="text" name="ingredients" id="ingredients" value="{{ old('ingredients') }}"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            @error('ingredients')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Steps -->
        <div class="mb-4">
            <label for="steps" class="block text-gray-700 font-semibold mb-2">Steps</label>
            <textarea style="width:95%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; height: 300px;" name="steps" id="steps" rows="6"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('steps') }}</textarea>
            @error('steps')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Recipe Image</label>
            <input type="file" name="image" id="image" accept="image/*"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                class="bg-pink-500 hover:bg-pink-600 text-white font-semibold px-6 py-2 rounded transition">
                Add Recipe
            </button>
        </div>
    </form>
</div>
@endsection
