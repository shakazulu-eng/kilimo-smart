<!DOCTYPE html>
<html>
<head>
    <title>AI Assistant</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body { font-family: Arial; background:#f4f4f4; padding:20px; }
        #chat-box { background:#fff; padding:10px; height:300px; overflow:auto; border:1px solid #ccc; }
        .user { color:blue; }
        .ai { color:green; }
        #advice { background:#fff; padding:10px; border:1px solid #ccc; margin-top:10px; }
    </style>
</head>

<body>

<h2>AI Assistant 🤖</h2>

<div id="chat-box"></div>

<input type="text" id="message" placeholder="Andika hapa...">
<button onclick="sendMessage()">Send</button>

<hr>

<h3>🌾 Farming Advice</h3>
<button onclick="getAdvice()">Pata Ushauri</button>

<div id="advice"></div>

<script>
function sendMessage() {
    let message = document.getElementById('message').value;

    fetch('/ai-chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message })
    })
    .then(res => res.json())
    .then(data => {

        let chat = document.getElementById('chat-box');

        chat.innerHTML += `<p class="user"><b>You:</b> ${message}</p>`;

        if (data.status === 'success') {
            chat.innerHTML += `<p class="ai"><b>AI:</b> ${data.reply}</p>`;
        } else {
            chat.innerHTML += `<p style="color:red">${data.message}</p>`;
        }

        document.getElementById('message').value = '';
        chat.scrollTop = chat.scrollHeight;
    });
}

function getAdvice() {
    fetch('/ai-advice', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(res => res.json())
    .then(data => {

        if (data.status === 'success') {
            document.getElementById('advice').innerHTML = `
                <b>🌦️ Weather:</b> ${data.weather}<br><br>
                <b>🌾 Advice:</b><br>${data.advice}
            `;
        } else {
            document.getElementById('advice').innerText = data.message;
        }
    });
}
</script>


<hr>

<h3>🌽 Crop Advice</h3>

<input type="text" id="crop" placeholder="Mfano: mahindi, mpunga">
<button onclick="getCropAdvice()">Pata Ushauri wa Zao</button>

<div id="crop-result"></div>


function getCropAdvice() {

    let crop = document.getElementById('crop').value;

    fetch('/crop-advice', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ crop: crop })
    })
    .then(res => res.json())
    .then(data => {

        if (data.status === 'success') {
            document.getElementById('crop-result').innerHTML = `
                <b>🌽 Zao:</b> ${data.crop}<br>
                <b>🌦️ Weather:</b> ${data.weather}<br><br>
                <b>📊 Ushauri:</b><br>${data.advice}
            `;
        } else {
            document.getElementById('crop-result').innerText = data.message;
        }
    });
}


</body>
</html>
