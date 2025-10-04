@extends('layouts.app')
@section('content')
<style>
.card {
  background-color: #e8d7d7ff;
  color: #272626ff;
  margin: 5px;
  padding: 10px;
  border-radius: 15px;
  width: 250px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.2s;
  cursor: pointer;
}

.card:hover {
  transform: scale(1.05);
}
</style>

<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6 text-center " style=" text-align: center;">Recipes</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; width: 100%;">
        @foreach($recipes as $recipe)
            <div class="card">
                @if($recipe->image)
                    <img style="border-radius: 15px; width: 200px; height: 150px; object-fit: cover;" src="{{ asset('storage/'.$recipe->image) }}"  
                         alt="{{ $recipe->title ?? $recipe->name }}" 
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                @endif

                <div class="p-4" style="padding: 10px; text-align: center;">
                    <h2 class="text-lg font-semibold mb-2">{{ $recipe->name }}</h2>
                    <p class="text-sm text-gray-600">
                        <strong>Ingredients:</strong> 
                        {{ Str::limit($recipe->ingredients, 150, '...') }}
                    </p>
                </div>
                <button><a style="text-decoration: none; color: black; padding: 5px;" href="{{ route('recipes.show', $recipe->id) }}">View Recipe</a></button>
                <button ><a style="text-decoration: none; color: black; padding: 5px;"  href="{{ route('recipes.edit', $recipe->id) }}">Edit Recipe</a></button>
                <form style="padding: 5px; " action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="inline" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete Recipe</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection