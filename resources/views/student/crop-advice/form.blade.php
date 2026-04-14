<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <title>Ushauri wa Kilimo | Smart Kilimo</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gradient-to-br from-green-100 via-green-50 to-emerald-100
             flex items-center justify-center px-4">

    <!-- Main Card -->
    <div class="w-full max-w-md bg-white/70 backdrop-blur-2xl
                shadow-[0_25px_70px_rgba(0,0,0,0.15)]
                rounded-[2.75rem] p-10 relative border border-white/40">

        <!-- Floating Badge -->
        <div class="absolute -top-4 left-1/2 -translate-x-1/2
                    bg-gradient-to-r from-green-600 to-emerald-600
                    text-white px-6 py-1.5 rounded-full text-xs
                    shadow-lg animate-pulse">
            🌱 Smart Kilimo Advisor
        </div>

        <!-- Title -->
        <h2 class="text-4xl font-black text-center
                   bg-gradient-to-r from-green-700 to-emerald-600
                   bg-clip-text text-transparent mt-8">
            Ushauri wa Mazao
        </h2>

        <!-- Subtitle -->
        <p class="text-center text-gray-600 mt-4 mb-10 text-sm leading-relaxed">
            Mfumo mahiri wa ushauri wa kilimo unaozingatia eneo lako na aina ya zao
        </p>

        <!-- Form -->
        <form method="POST" action="{{ route('student.crop.advice.post') }}" class="space-y-7">
            @csrf

            <!-- Area -->
            <div>
                <label class="flex items-center gap-2 text-sm font-bold text-gray-700 mb-2">
                    📍 Eneo
                </label>
                <select name="city" required
                    class="w-full rounded-2xl border border-gray-200 px-5 py-3.5
                           bg-white/80 shadow-sm
                           focus:ring-4 focus:ring-green-500/30
                           focus:border-green-600 transition">
                    <option value="" disabled selected>-- Chagua Eneo --</option>
                    <option>Dar es Salaam</option>
                    <option>Dodoma</option>
                    <option>Arusha</option>
                    <option>Mwanza</option>
                    <option>Mbeya</option>
                    <option>Morogoro</option>
                </select>
            </div>

            <!-- Crop -->
            <div>
                <label class="flex items-center gap-2 text-sm font-bold text-gray-700 mb-2">
                    🌾 Zao
                </label>
                <select name="crop" required
                    class="w-full rounded-2xl border border-gray-200 px-5 py-3.5
                           bg-white/80 shadow-sm
                           focus:ring-4 focus:ring-green-500/30
                           focus:border-green-600 transition">
                    <option value="" disabled selected>-- Chagua Zao --</option>
                    <option value="maize">🌽 Mahindi</option>
                    <option value="rice">🌾 Mpunga</option>
                    <option value="beans">🫘 Maharage</option>
                    <option value="groundnuts">🥜 Karanga</option>
                    <option value="cassava">🍠 Mihogo</option>
                    <option value="banana">🍌 Ndizi</option>
                    <option value="sunflower">🌻 Alizeti</option>
                    <option value="coffee">☕ Kahawa</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full relative overflow-hidden
                       bg-gradient-to-r from-green-600 via-emerald-600 to-green-700
                       text-white font-extrabold py-4 rounded-2xl
                       shadow-[0_18px_45px_rgba(16,185,129,0.5)]
                       transition-all duration-300
                       hover:scale-[1.02]
                       hover:shadow-[0_25px_60px_rgba(16,185,129,0.65)]
                       active:scale-95 uppercase tracking-wider">
                🌿 Pata Ushauri Sasa
            </button>
        </form>

        <!-- Back Link -->
        <div class="text-center mt-8">
            <a href="{{ route('dashboard') }}"
               class="text-green-700 font-semibold hover:underline">
                ← Rudi Dashboard
            </a>
        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-400 mt-8">
            © {{ date('Y') }} Smart Kilimo • Powered by AI
        </p>
    </div>

</body>
</html>
