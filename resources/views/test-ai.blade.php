<!DOCTYPE html>
<html>
<head>
    <title>AI Assistant</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

<h2>AI Assistant 🤖</h2>

<div id="chat-box" style="border:1px solid #ccc;height:200px;overflow:auto;"></div>

<input type="text" id="message">
<button onclick="sendMessage()">Send</button>

<hr>

<h3>🌾 Farming Advice</h3>
<button onclick="getAdvice()">Pata Ushauri</button>
<div id="advice"></div>

<hr>

<h3>🌽 Crop Advice</h3>

<input type="text" id="crop" placeholder="mahindi, mpunga">
<button onclick="getCropAdvice()">Pata Ushauri wa Zao</button>

<div id="crop-result"></div>

<script>
// 💬 CHAT
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
        document.getElementById('chat-box').innerHTML +=
            "<p><b>You:</b> " + message + "</p>" +
            "<p><b>AI:</b> " + (data.reply || data.message) + "</p>";
    });
}

// 🌾 WEATHER
function getAdvice() {
    fetch('/ai-advice', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('advice').innerHTML =
            "<b>Weather:</b> " + data.weather + "<br><br>" +
            "<b>Advice:</b><br>" + data.advice;
    });
}

// 🌽 CROP (FIXED)
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
        document.getElementById('crop-result').innerHTML =
            "<b>Zao:</b> " + data.crop + "<br>" +
            "<b>Weather:</b> " + data.weather + "<br><br>" +
            "<b>Ushauri:</b><br>" + data.advice;
    });
}
</script>

</body>
</html>
