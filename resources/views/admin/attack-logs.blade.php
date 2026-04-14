<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attack Logs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #c0392b;
            color: #fff;
            padding: 20px 40px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        main {
            padding: 30px 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #bdc3c7;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #e74c3c;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        tr:hover {
            background-color: #f1c40f;
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
        <h1>ATTACK LOGS</h1>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Payload</th>
                    <th>IP</th>
                    <th>URL</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->attack_type }}</td>
                    <td>{{ $log->payload }}</td>
                    <td>{{ $log->ip_address }}</td>
                    <td>{{ $log->url }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <footer>
        &copy; {{ date('Y') }} E-Learning System | Developed by SALUMU M MLANZI 
    </footer>

</body>
</html>
