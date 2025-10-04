@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
<div style="max-width: 400px; margin: auto; padding: 20px; background-color: #e6ddddff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); text-align: center;">
    <h1>Admin Profile</h1>
    <div>
        @if($users->profile_image)
            <img src="{{ asset('storage/'.$users->profile_image) }}" alt="Profile Picture" style="max-width: 200px; max-height: 200px; border-radius: 50%;">
        @endif
        <h2>{{ $users->name }}</h2>
        <p>Email: {{ $users->email }}</p>
        <button type="button" onclick="location.href='{{ route('userprofile.edit', $users->id) }}'">Edit</button>
           <form action="{{ route('userprofile.destroy', $users->id) }}" method="POST" style="display:inline;">
             @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
           </form>
    </div>
</div>
@endsection