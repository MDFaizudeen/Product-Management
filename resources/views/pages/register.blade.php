<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #193050;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 900px;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        input,
        select,
        button {
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
        }

        button {
            background-color: #0075C8;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:active {
            background-color: #45a049;
            
        }
        .main{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

    <div class="main">
        <img src="{{asset('img/colani_logo.png')}}" alt="" width="100">
    <div class="form-container">
        <h2>Register</h2>
        <form action="{{route('register')}}" method="POST"> @csrf
            <input type="text" name="username" placeholder="Username">
            @error('username')
            <span class="error" style="color: red;">{{$message}}</span>
            @enderror
            <input type="text" name="email" placeholder="email">
            @error('email')
            <span class="error" style="color: red;">{{$message}}</span>
            @enderror
            <input type="password" name="password" placeholder="Password">
            @error('password')
            <span class="error" style="color: red;">{{$message}}</span>
            @enderror

            <button type="submit">Register</button>
            <div class="form-footer">
                <p>Please login here! <a href="{{url('login')}}">Login</a></p>
            </div>
        </form>
    </div>

    </div>
</body>

</html>