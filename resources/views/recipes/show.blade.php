@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-6">
        
                @if($recipe->image)
                    <img style="border-radius: 15px; width: 200px; height: 250px; object-fit: cover;" src="{{ asset('storage/'.$recipe->image) }}" 
                         alt="{{ $recipe->name }}" 
                         class="w-full h-64 object-cover rounded mb-4">
                @endif
        <ul>

           <li><h1 class="text-2xl font-bold mb-4">{{ $recipe->name?? '' }}</h1></li> 
            <li>
            <p class="mb-4">
                <strong>Ingredients:</strong><br>
                {{ $recipe->ingredients }}
            </p>
            </li>
            <li>
            <p>
                <strong>Steps:</strong><br>
                {{ $recipe->steps }}
            </p>
            </li>
        </ul>        
    </div>
</div>
@endsection
