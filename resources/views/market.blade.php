<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Insights - Kilimo Smart</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- HEADER -->
    <div class="bg-green-600 text-white p-6 text-center">
        <h1 class="text-3xl font-bold">🌾 Market Insights</h1>
        <p>Angalia masoko na mazao yanayouzwa zaidi</p>
    </div>


    <!-- MARKET CARDS -->
    <div class="max-w-6xl mx-auto py-10 px-6 grid md:grid-cols-3 gap-6">

        <!-- MARKET 1 -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold text-green-600 mb-2">Kariakoo Market</h2>
            <p class="text-gray-600 mb-3">📍 Dar es Salaam</p>

            <ul class="text-gray-700 space-y-1">
                <li>🌽 Mahindi - High demand</li>
                <li>🍅 Nyanya - Fast selling</li>
                <li>🥔 Viazi - Stable market</li>
            </ul>
        </div>

        <!-- MARKET 2 -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold text-green-600 mb-2">Mwanjelwa Market</h2>
            <p class="text-gray-600 mb-3">📍 Mbeya</p>

            <ul class="text-gray-700 space-y-1">
                <li>🍌 Ndizi - High demand</li>
                <li>🌶 Pilipili - Fast selling</li>
                <li>🥬 Mboga - Daily demand</li>
            </ul>
        </div>

        <!-- MARKET 3 -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-bold text-green-600 mb-2">Sabasaba Market</h2>
            <p class="text-gray-600 mb-3">📍 Morogoro</p>

            <ul class="text-gray-700 space-y-1">
                <li>🌾 Mpunga - High demand</li>
                <li>🍊 Machungwa - Seasonal boom</li>
                <li>🥕 Karoti - Growing demand</li>
            </ul>
        </div>

    </div>


    <!-- GOOGLE MAP -->
    <div class="max-w-6xl mx-auto px-6 pb-16">
        <h2 class="text-2xl font-bold text-green-600 mb-4 text-center">
            📍 Market Location (Kariakoo)
        </h2>

        <div class="w-full h-[400px] rounded-xl overflow-hidden shadow">
            <iframe 
                src="https://www.google.com/maps?q=Kariakoo+Market+Dar+es+Salaam&output=embed"
                width="100%" 
                height="100%" 
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </div>


    <!-- BACK BUTTON -->
    <div class="text-center pb-10">
        <a href="/" class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            ⬅ Back Home
        </a>
    </div>

</body>
</html>
