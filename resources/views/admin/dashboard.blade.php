<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
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
            background-color: #34495e;
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
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #c0392b;
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
        <h1>ADMIN DASHBOARD</h1>
        <p>Karibu, {{ auth()->user()->name }} (ADMIN)</p>
    </header>

    <nav>
        <a href="#">Post Matokeo</a>
        <a href="#">Post Taarifa</a>
        <a href="attack-logs">View Attack Logs</a>
    </nav>

    <main>
        <h2>Quick Actions</h2>
        <ul>
            <li><a href="#">Manage Students</a></li>
            <li><a href="#">View Reports</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="{{ route('admin.users') }}">
    Manage Users
</a>
        </ul>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </main>

    <footer>
        &copy; {{ date('Y') }} E-Learning System | Developed by SALUMU M MLANZI
    </footer>

</body>
</html>
