<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            background-image: url('{{ asset("images/final.jpg") }}');
            background-position:center;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        .login-box {

            background: rgba(189, 165, 139, 0.86);
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            width:350px;
            height: 300px;
        }
        .login-box input {
            width:100%;
            padding:8px;
            margin:8px 0;
            border:1px solid #ccc;
            border-radius:5px;
        }
        .login-box button {
            width:100%;
            padding:10px;
            background: rgba(105, 134, 124, 1);
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }
        .error {
            color:red;
            margin-bottom:15px;
        }
    </style>
</head>
<body>

    <div class="login-box" >
        <h2 style="text-align:center;">Login</h2>

        {{-- عرض الأخطاء --}}
        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <label>Email:</label>
            <input type="email" name="email" required placeholder="Enter your email">

            <label>Password:</label>
            <input type="password" name="password" required placeholder="Enter your password">

            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>
