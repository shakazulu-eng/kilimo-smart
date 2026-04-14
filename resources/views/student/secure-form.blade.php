<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Comment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f9f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #27ae60;
            color: #fff;
            padding: 20px 40px;
            text-align: center;
        }

        header h2 {
            margin: 0;
            font-size: 26px;
        }

        main {
            padding: 30px 40px;
        }

        textarea {
            width: 100%;
            max-width: 600px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
        }

        button {
            margin-top: 15px;
            background-color: #27ae60;
            color: #fff;
            border: none;
            padding: 10px 25px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #1e8449;
        }

        .output {
            margin-top: 30px;
            padding: 20px;
            background-color: #e8f8f5;
            border: 1px solid #27ae60;
        }

        .output h3 {
            color: #27ae60;
            margin-top: 0;
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
        <h2>Student Comment Box (SECURE PAGE)</h2>
    </header>

    <main>
        <form method="POST" action="/student/secure-comment">
            @csrf
            <textarea name="comment" rows="5" placeholder="Enter your comment here..."></textarea><br>
            <button type="submit">Submit Securely</button>
        </form>

        @if(session('comment'))
            <div class="output">
                <h3>Comment Output (SAFE)</h3>
                {{ session('comment') }}
            </div>
        @endif
    </main>

    <footer>
        &copy; {{ date('Y') }} E-Learning System | Security Module by SALUMU M MLANZI
    </footer>

</body>
</html>
