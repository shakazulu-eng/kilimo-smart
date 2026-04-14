<style>
    body {
        font-family: 'Poppins', 'Segoe UI', sans-serif;
        background: radial-gradient(circle at top, #a5d6a7, #e8f5e9);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .glass-card {
        width: 540px;
        backdrop-filter: blur(14px);
        background: rgba(255, 255, 255, 0.75);
        border-radius: 22px;
        padding: 30px;
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        border: 1px solid rgba(255,255,255,0.4);
        animation: popIn 0.7s ease;
    }

    h2 {
        text-align: center;
        font-size: 26px;
        background: linear-gradient(90deg, #2e7d32, #66bb6a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 25px;
    }

    .badge {
        display: inline-block;
        background: #e8f5e9;
        color: #2e7d32;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 15px;
    }

    .row span {
        font-weight: 600;
        color: #1b5e20;
    }

    .weather-box {
        margin: 20px 0;
        padding: 18px;
        border-radius: 16px;
        background: linear-gradient(135deg, #f1f8e9, #ffffff);
        box-shadow: inset 0 0 0 1px #c8e6c9;
    }

    .weather-item {
        display: flex;
        justify-content: space-between;
        margin: 8px 0;
        font-size: 14px;
    }

    .progress {
        height: 8px;
        background: #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 6px;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, #66bb6a, #2e7d32);
        border-radius: 10px;
    }

    .advice {
        margin-top: 20px;
        padding: 18px;
        border-radius: 16px;
        background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
        border-left: 6px solid #43a047;
        font-size: 15px;
        color: #2e7d32;
        font-weight: 600;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .back-btn {
        display: block;
        text-align: center;
        margin-top: 25px;
        padding: 12px;
        border-radius: 30px;
        background: linear-gradient(90deg, #43a047, #2e7d32);
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .back-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(67,160,71,0.4);
    }

    @keyframes popIn {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
</style>

<div class="glass-card">
    <div class="badge">🌦 Makadirio ya Siku 5</div>

    <h2>Ushauri wa Kilimo 🌱</h2>

    <div class="row">
        <div>📍 Mji:</div>
        <span>{{ $city }}</span>
    </div>

    <div class="row">
        <div>🌾 Zao:</div>
        <span>{{ ucfirst($crop) }}</span>
    </div>

    <div class="weather-box">
        <div class="weather-item">
            🌡 Joto: {{ $weather['temp'] }}°C
        </div>
        <div class="progress">
            <div class="progress-bar" style="width: 65%;"></div>
        </div>

        <div class="weather-item">
            🌧 Mvua: {{ $weather['rain'] }} mm
        </div>
        <div class="progress">
            <div class="progress-bar" style="width: 45%;"></div>
        </div>

        <div class="weather-item">
            💧 Unyevu: {{ $weather['humidity'] }}%
        </div>
        <div class="progress">
            <div class="progress-bar" style="width: {{ $weather['humidity'] }}%;"></div>
        </div>
    </div>

    <div class="advice">
        💡 {{ $advice }}
    </div>

    <a href="/student/crop-advice" class="back-btn">⬅ Rudi Kwenye Ushauri</a>
</div>
