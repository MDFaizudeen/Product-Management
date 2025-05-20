
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #193050;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0075C8;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .error {
            color: #d9534f;

        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .form-footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;

        }
    </style>
</head>

<body>
    
<div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center ">
                  <img src="{{asset('img/colani_logo.png')}}" alt="" width="100">
                </a>
              </div>
    @error('login')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="{{route('login')}}" method="POST">
        @csrf
        <h2>Login</h2>
        <input type="text" name="email" placeholder="Email">
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="password-wrapper">
            <input type="password" name="password" placeholder="password" id="password">
            <i class="fas fa-eye" id="togglepassword" ></i>
        </div>
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Login</button>

        <div class="form-footer">
            <p>Don't have an account? <a href="{{ url('/register') }}">Register here</a></p>
            

        </div>
        @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif
    </form>
    <script>
        const togglepassword = document.getElementById('togglepassword');
        const password = document.getElementById('password');
        togglepassword.addEventListener('click', function() {
            password.type = password.type === 'password' ? 'text' : 'password';
            togglepassword.className=togglepassword.className==='fas fa-eye'?'fa fa-eye-slash':'fas fa-eye';
        });
    </script>
</body>

</html>