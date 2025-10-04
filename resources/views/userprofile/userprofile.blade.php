
@extends('layouts.app')

@section('title', 'User Profiles')

@section('content')
<h1>Admin Profiles</h1>
<style>
    li{
         transition: transform 0.2s;
        cursor: pointer;
    }
    li:hover {
        transform: scale(1.05);
    }
</style>

    <ul style=" display: flex; flex-wrap: wrap; gap: 20px; padding: 0; list-style: none; justify-content: center; width: 100%;">
        @foreach($users as $user)
        <li style="border: 1px solid #ccc; padding: 10px; border-radius: 15px; background: #e0cfcfff; width: 200px; text-align: center;">
                @if($user->profile_image)
                    <img src="{{ asset('storage/'.$user->profile_image) }}" alt="Profile Picture" style="max-width: 100px; max-height: 100px; border-radius: 50%; object-fit: cover;">
                @endif
                <h2>{{ $user->name }}</h2>
                <p>Email: {{ $user->email }}</p>
                <button type="button" style="color: blue; background: none; border: none;" onclick="location.href='{{ route('userprofile.edit', $user->id) }}'">Edit</button>
                <form action="{{ route('userprofile.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color: red;  background: none; border: none;">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
