@extends('layouts.app') 
@section('title', 'Edit User')
@section('content')
<div style="max-width: 400px; margin: auto; padding: 20px; background-color: #e6ddddff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <h1>Edit User</h1>
    <form action="{{ route('userprofile.update', $users->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $users->name }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $users->email }}" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="{{ $users->password }}" required>
        </div>
        <div>
            <label for="profile_image">Profile Image:</label>
            <input type="file" id="profile_image" name="profile_image">
            @if($users->profile_image)
                <img src="{{ asset('storage/'.$users->profile_image) }}" alt="Profile Picture" width="100">
            @endif
        </div>
        <button type="submit">Update User</button>
    </form>
</div>
@endsection