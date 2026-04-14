<!DOCTYPE html>
<html>
<head>
    <title>Security Comparison</title>
</head>
<body>
    <h1>SECURITY DEMONSTRATION</h1>

    <h2>BEFORE (VULNERABLE)</h2>
    <ul>
        <li>XSS allowed via unescaped output</li>
        <li>User input rendered directly</li>
        <li>Attack logged but not prevented</li>
    </ul>

    <h2>AFTER (SECURE)</h2>
    <ul>
        <li>Input sanitized using strip_tags()</li>
        <li>Output escaped using Blade {{ }}</li>
        <li>Attacks detected AND prevented</li>
    </ul>

    <p><strong>Conclusion:</strong> System now follows secure coding practices.</p>
</body>
</html>
