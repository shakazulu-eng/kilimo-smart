<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vulnerable Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #8e44ad;
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

        .warning {
            background-color: #fce4e4;
            border-left: 6px solid #e74c3c;
            padding: 15px;
            margin-bottom: 20px;
            color: #c0392b;
            font-weight: bold;
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
            background-color: #8e44ad;
            color: #fff;
            border: none;
            padding: 10px 25px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #732d91;
        }

        .output {
            margin-top: 30px;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e74c3c;
        }

        .output h3 {
            color: #e74c3c;
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
        <h2>Student Comment Box (VULNERABLE)</h2>
    </header>

    <main>
        <div class="warning">
            ⚠ TAHADHARI: Hii form ni vulnerable kwaajili ya  XSS attacks (for testing & learning purposes).
        </div>

        <form method="POST" action="/student/comment">
            @csrf
            <textarea name="comment" rows="5" placeholder="Enter your comment here..."></textarea><br>
            <button type="submit">Submit</button>
        </form>

        @if(session('comment'))
            <div class="output">
                <h3>Comment Output (UNSAFE)</h3>
                {!! session('comment') !!}
            </div>
        @endif
    </main>

    <footer>
        &copy; {{ date('Y') }} E-Learning System | Security Testing Module by SALUMU M MLANZI
    </footer>

</body>
</html>
