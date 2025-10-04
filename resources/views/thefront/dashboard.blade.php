<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 220px;
            background: #f5f5f5;
            padding: 20px;
            height: 100vh;
        }
        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            filter: blur(2px);
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
            color: #333;
        }
        .sidebar button {
            background: none;
            border: none;
            color: red;
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
        <h3>Welcome, {{ Auth::user()->name }}</h3>

        @if(Auth::user()->profile_pic)
            <img src="{{ asset('storage/'.Auth::user()->profile_pic) }}" alt="Profile Picture">
        @endif

        <ul>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/recipes">Recipes</a></li>
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
        <h1>Dashboard</h1>
        <p>Welcome to your dashboard, {{ Auth::user()->name }}!</p>
        <p>Use the sidebar to navigate to Recipes or logout.</p>
    </div>

</body>
</html>
