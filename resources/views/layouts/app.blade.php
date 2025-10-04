<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Noto+Nastaliq+Urdu:wght@400..700&family=Pacifico&display=swap');
    </style>
    <style>
        body {
            font:  'Alexandria', sans-serif;
            display: flex;
            margin: 0;
            background: #b4a4a4ff;
        }
        .sidebar {
       
           width: 220px;
            background: #593b16ff;
            padding: 20px;
            height: 200vh;
            
         }
        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            transition: filter 0.3s;
            display: block;
            margin-bottom: 10px;
        }
        .sidebar img:hover {
            filter: blur(0);
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        .sidebar li {
            margin-bottom: 10px;
        }
        .sidebar a {
            text-decoration: none;
            color: #cdc1c1ff;
        }
        .sidebar button {
            background: none;
            border: none;
            color: lightgreen;
            cursor: pointer;
            padding: 0;
            font-size: 16px;
        }
        .main {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        
        @if(Auth::user()->profile_image)
        <img src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="Profile Picture">
        @endif
        <h3 style="color: #cdc1c1ff;">Welcome, {{ Auth::user()->name }}</h3>

        <ul>
            <!-- <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/recipes">Recipes</a></li> -->
            <li><a href="{{ route('recipes.index') }}">All Recipes</a></li>
            <li><a href="{{ route('recipes.create') }}">Add Recipe</a></li>
            <li><a href="{{ route('userprofile.index') }}">Admin Profiles</a></li>
            <li><a href="{{ route('userprofile.create') }}">Add Admin</a></li>
            <li><a href="{{ route('userprofile.show', Auth::user()->id) }}">View Profile</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    {{-- Main content --}}
    <div class="main">
        @yield('content')   
    </div>

</body>
</html>