<!DOCTYPE html>
<html>
<head>
    <title>AI Assistant</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }

        #chat-box {
            width: 100%;
            max-width: 500px;
            height: 400px;
            overflow-y: auto;
            background: white;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        .user {
            color: blue;
            margin: 5px 0;
        }

        .ai {
            color: green;
            margin: 5px 0;
        }

        .error {
            color: red;
            margin: 5px 0;
        }

        input {
            padding: 8px;
            width: 70%;
        }

        button {
            padding: 8px 12px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<h2>AI Assistant 🤖</h2>

<div id="chat-box"></div>

<input type="text" id="message" placeholder="Andika message...">
<button onclick="sendMessage()">Tuma</button>

<hr>

<h3>🌾 Farming Advice</h3>
<input type="text" id="weather" placeholder="Mfano: rain, sunny, dry">
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
    .then(async (res) => {
    const text = await res.text();
    try {
        return JSON.parse(text);
    } catch (e) {
        console.log("RAW RESPONSE:", text);
        throw new Error("Server haijarudisha JSON");
    }
})
    .then(data => {

        let chatBox = document.getElementById('chat-box');

        // USER MESSAGE
        chatBox.innerHTML += `<p class="user"><b>You:</b> ${message}</p>`;

        // AI RESPONSE HANDLING
        if (data.status === 'success') {
            chatBox.innerHTML += `<p class="ai"><b>AI:</b> ${data.reply}</p>`;
        } else {
            chatBox.innerHTML += `<p class="error"><b>Error:</b> ${data.details || data.message}</p>`;
        }

        document.getElementById('message').value = '';
        chatBox.scrollTop = chatBox.scrollHeight;
    })
    .catch(err => {
        document.getElementById('chat-box').innerHTML +=
            `<p class="error"><b>JS Error:</b> ${err}</p>`;
    });
}


function getAdvice() {

    fetch('/ai-advice', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(res => res.json())
    .then(data => {

        if (data.status === 'success') {
            document.getElementById('advice').innerText =
                "🌦️ Weather: " + data.weather + "\n\n🌾 Advice: " + data.advice;
        } else {
            document.getElementById('advice').innerText = data.message;
        }
    });
}


</script>

</body>
</html>
