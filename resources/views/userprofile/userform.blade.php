
@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="container mx-auto py-8 max-w-xl" style="max-width: 600px; margin: auto; padding: 20px; background-color: #e6ddddff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <h1>ADD ADMIN</h1>
    <form action="{{ route('userprofile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input style="width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px;" type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input style="width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px;" type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input style="width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px;" type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="profile_image">Profile Image:</label>
            <input type="file" id="profile_image" name="profile_image">
        </div>
        <button type="submit">Add User</button>
    </form>
</div>  
@endsection
