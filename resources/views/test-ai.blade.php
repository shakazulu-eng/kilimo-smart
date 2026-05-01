<!DOCTYPE html>
<html>
<head>
    <title>AI Assistant</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

<h2>AI Assistant 🤖</h2>

<div id="chat-box" style="border:1px solid #ccc;height:300px;overflow:auto;"></div>

<input type="text" id="message">
<button onclick="sendMessage()">Send</button>

<hr>

<h3>🌾 Farming Advice</h3>
<button onclick="getAdvice()">Pata Ushauri</button>

<pre id="advice"></pre>

<script>
function safeFetch(url, options) {
    return fetch(url, options).then(async (res) => {
        const text = await res.text();

        try {
            return JSON.parse(text);
        } catch (e) {
            console.log("❌ RAW RESPONSE:", text);
            throw new Error("Server haijarudisha JSON");
        }
    });
}

function sendMessage() {
    let message = document.getElementById('message').value;

    safeFetch('/ai-chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message })
    })
    .then(data => {
        document.getElementById('chat-box').innerHTML += `
            <p><b>You:</b> ${message}</p>
            <p><b>AI:</b> ${data.reply || data.message}</p>
        `;
    })
    .catch(err => {
        document.getElementById('chat-box').innerHTML += `<p style="color:red">${err}</p>`;
    });
}

function getAdvice() {
    safeFetch('/ai-advice', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })

document.getElementById('advice').textContent =
    JSON.stringify(data, null, 2);

    .catch(err => {
        document.getElementById('advice').textContent = err;
    });
}
</script>

</body>
</html>
