<!DOCTYPE html>
<html>
<head>
    <title>AI Assistant</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        #chat-box {
            width: 400px;
            height: 400px;
            overflow-y: auto;
            background: white;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .user { color: blue; }
        .ai { color: green; }
    </style>
</head>
<body>

<h2>AI Assistant 🤖</h2>

<div id="chat-box"></div>

<input type="text" id="message" placeholder="Andika swali..." style="width:300px;">
<button onclick="sendMessage()">Tuma</button>

<hr>

<h3>🌾 Auto Farming Advice</h3>
<input type="text" id="weather" placeholder="Mfano: Sunny, Rainy...">
<button onclick="getAdvice()">Pata Ushauri</button>

<p id="advice"></p>

<script>
function sendMessage() {
    let message = document.getElementById('message').value;

    fetch('/ai-chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ message: message })
    })
    .then(res => res.json())
    .then(data => {
        let chatBox = document.getElementById('chat-box');

        chatBox.innerHTML += `<p class="user"><b>You:</b> ${message}</p>`;
        chatBox.innerHTML += `<p class="ai"><b>AI:</b> ${data.reply}</p>`;

        document.getElementById('message').value = '';
        chatBox.scrollTop = chatBox.scrollHeight;
    });
}

function getAdvice() {
    let weather = document.getElementById('weather').value;

    fetch('/ai-advice', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ weather: weather })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('advice').innerText = data.advice;
    });
}
</script>

</body>
</html>
