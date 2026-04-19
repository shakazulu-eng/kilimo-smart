<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Farmer Dashboard')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fef9f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #16a085;
            color: #fff;
            padding: 20px 40px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        header p {
            font-size: 16px;
            margin-top: 5px;
        }

        nav {
            background-color: #1abc9c;
            padding: 15px 40px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            padding: 30px 40px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        ul li a {
            color: #2980b9;
            text-decoration: none;
            font-size: 18px;
        }

        ul li a:hover {
            text-decoration: underline;
        }

        form {
            margin-top: 30px;
        }

        button {
            background-color: #e67e22;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #d35400;
        }

        footer {
            text-align: center;
            padding: 15px 0;
            background-color: #ecf0f1;
            color: #7f8c8d;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<header>
    <h1>FARMER DASHBOARD</h1>
    <p>Karibu, {{ auth()->user()->name }} (FARMER)</p>
</header>

<nav>
    <a href="{{ route('student.dashboard') }}">Dashboard</a>
    <a href="/student/weather-standalone">Weather Update</a>
   <a href="/student/crop-advice">Advice</a>
<a href="/market" class="text-green-600 font-semibold hover:underline">
    View Market Insights
</a>
    <a href="{{ route('profile.edit') }}">Profile Settings</a>
</nav>

<main>
    {{-- HAPA NDIPO DASHBOARD CONTENT ITAINGIA --}}
    @yield('content')
</main>

<footer>
    &copy; {{ date('Y') }} Agricultural Weather System | Developed by SALUMU M MLANZI
</footer>

</body>
</html>
