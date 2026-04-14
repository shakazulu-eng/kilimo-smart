<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agricultural Weather Update</title>
    <style>
        /* Same styling as your original code */
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
        input[type="text"], button {
            width: 100%;
            max-width: 600px;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
            border-radius: 4px;
        }
        button {
            background-color: #27ae60;
            color: #fff;
            border: none;
            cursor: pointer;
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
            margin-top: 0;
            color: #27ae60;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-danger { background-color: #f8d7da; color: #721c24; }
        .alert-info { background-color: #d1ecf1; color: #0c5460; }
    </style>
</head>
<body>

<header>
    <h2>Agricultural Weather Update (STANDALONE)</h2>
</header>

<main>
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('student.weather.search') }}">
        @csrf
        <input type="text" name="location" placeholder="Ingiza Mkoa / Mji (Mfano: Arusha)" required>
        <button type="submit">Tafuta Hali ya Hewa</button>
    </form>

    @isset($data)
      <div class="output">
<!-- In student/weather-standalone.blade.php -->
<div>
    <h3>Hali ya Hewa kwa: {{ $data['name'] }}</h3>
    <p>Joto: {{ $data['main']['temp'] }}°C</p>
    <p>Unyevu: {{ $data['main']['humidity'] }}%</p>
    <p>Hali ya Hewa: {{ $data['weather'][0]['main'] }}</p>

    <h4>Mapendekezo ya Mazao ya Kupanda</h4>
    @if(count($advice['crops_to_plant']) > 0)
        <ul>
            @foreach($advice['crops_to_plant'] as $crop)
                <li>{{ $crop }}</li>
            @endforeach
        </ul>
    @else
        <p>Hakuna mazao yanayopendekezwa kwa sasa.</p>
    @endif

    <h4>Mapendekezo ya Mazao yasiyofaa Kupandwa</h4>
    @if(count($advice['crops_not_to_plant']) > 0)
        <ul>
            @foreach($advice['crops_not_to_plant'] as $crop)
                <li>{{ $crop }}</li>
            @endforeach
        </ul>
    @else
        <p>Hakuna mazao ambayo hayafai kupandwa kwa sasa.</p>
    @endif

    <h4>Ushauri wa Jumla</h4>
    <p>{{ $advice['general_advice'] }}</p><br><br>

<a href="{{ route('student.dashboard') }}">Click here to Back in dashboard</a>


</div>

        </div> 

    @endisset
</main>

</body>
</html>

