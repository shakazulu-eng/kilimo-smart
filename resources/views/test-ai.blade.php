<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<!-- CSRF Meta Tag Placeholder - Keep as provided in original -->
<meta content="{{ csrf_token() }}" name="csrf-token"/>
<title>Agri-Assistant | AI Powered Farming Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container": "#dbf1fe",
                        "on-error": "#ffffff",
                        "primary": "#0d631b",
                        "primary-fixed-dim": "#88d982",
                        "error": "#ba1a1a",
                        "surface": "#f3faff",
                        "background": "#f3faff",
                        "secondary": "#286b33",
                        "secondary-fixed-dim": "#90d792",
                        "on-tertiary-fixed": "#2b1700",
                        "on-primary-fixed-variant": "#005312",
                        "on-secondary-fixed": "#002107",
                        "on-primary-container": "#cbffc2",
                        "on-primary-fixed": "#002204",
                        "surface-variant": "#cfe6f2",
                        "on-background": "#071e27",
                        "tertiary-fixed": "#ffddba",
                        "inverse-primary": "#88d982",
                        "on-tertiary": "#ffffff",
                        "outline": "#707a6c",
                        "error-container": "#ffdad6",
                        "secondary-fixed": "#abf4ac",
                        "on-surface-variant": "#40493d",
                        "surface-bright": "#f3faff",
                        "on-tertiary-container": "#ffeee0",
                        "surface-container-highest": "#cfe6f2",
                        "on-secondary": "#ffffff",
                        "tertiary-container": "#9c6000",
                        "surface-dim": "#c7dde9",
                        "surface-container-high": "#d5ecf8",
                        "on-tertiary-fixed-variant": "#663d00",
                        "outline-variant": "#bfcaba",
                        "secondary-container": "#abf4ac",
                        "surface-tint": "#1b6d24",
                        "on-surface": "#071e27",
                        "inverse-surface": "#1e333c",
                        "inverse-on-surface": "#dff4ff",
                        "on-primary": "#ffffff",
                        "tertiary": "#7a4a00",
                        "on-secondary-container": "#2e7238",
                        "primary-container": "#2e7d32",
                        "tertiary-fixed-dim": "#ffb865",
                        "on-error-container": "#93000a",
                        "primary-fixed": "#a3f69c",
                        "surface-container-low": "#e6f6ff",
                        "on-secondary-fixed-variant": "#07521d",
                        "surface-container-lowest": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "xl": "32px",
                        "gutter": "16px",
                        "xs": "8px",
                        "sm": "12px",
                        "md": "16px",
                        "lg": "24px",
                        "margin-mobile": "16px",
                        "margin-desktop": "48px",
                        "base": "4px"
                    },
                    "fontFamily": {
                        "label-md": ["Inter"],
                        "h1": ["Manrope"],
                        "h3": ["Manrope"],
                        "h2": ["Manrope"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "caption": ["Inter"]
                    },
                    "fontSize": {
                        "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "500"}],
                        "h1": ["40px", {"lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "h3": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "h2": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "caption": ["12px", {"lineHeight": "16px", "fontWeight": "400"}]
                    }
                },
            },
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .chat-bubble-assistant {
            background-color: #cbffc2;
            color: #002204;
            border-radius: 16px 16px 16px 4px;
        }
        .chat-bubble-user {
            background-color: #ffffff;
            color: #071e27;
            border-radius: 16px 16px 4px 16px;
            box-shadow: 0 2px 8px rgba(46, 125, 50, 0.05);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #bfcaba;
            border-radius: 10px;
        }
        body {
            min-height: 100vh;
        }
    </style>
</head>
<body class="bg-surface font-body-md text-on-surface flex flex-col md:flex-row">
<!-- Desktop Sidebar Navigation -->
<aside class="hidden md:flex flex-col w-64 h-screen sticky top-0 bg-surface-container-lowest border-r border-outline-variant/30 px-md py-lg shrink-0">
<div class="flex items-center gap-xs mb-xl px-xs">
<span class="material-symbols-outlined text-primary text-h3" data-icon="agriculture">agriculture</span>
<h1 class="font-h3 text-h3 font-bold text-primary">Agri-AI</h1>
</div>
<nav class="flex-grow space-y-sm">
<a class="flex items-center gap-md px-md py-sm bg-secondary-container text-on-secondary-container rounded-lg font-label-md" href="#">
<span class="material-symbols-outlined" data-icon="chat">chat</span>
                Assistant
            </a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container transition-colors rounded-lg font-label-md" href="#">
<span class="material-symbols-outlined" data-icon="cloud">cloud</span>
                Farming Insights
            </a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container transition-colors rounded-lg font-label-md" href="#">
<span class="material-symbols-outlined" data-icon="psychology_alt">psychology_alt</span>
                Crop Analysis
            </a>
<a class="flex items-center gap-md px-md py-sm text-on-surface-variant hover:bg-surface-container transition-colors rounded-lg font-label-md" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
                Settings
            </a>
</nav>
<div class="pt-lg border-t border-outline-variant/30">
<div class="flex items-center gap-sm px-xs">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center font-bold text-on-primary-fixed-variant">JD</div>
<div class="overflow-hidden">
<p class="font-label-md text-on-surface truncate">John Doe</p>
<p class="text-caption text-on-surface-variant">Premium Plan</p>
</div>
</div>
</div>
</aside>
<!-- Mobile Header -->
<header class="md:hidden bg-surface-container-lowest sticky top-0 z-40 shadow-sm px-gutter py-sm flex justify-between items-center">
<div class="flex items-center gap-xs">
<span class="material-symbols-outlined text-primary text-h3" data-icon="agriculture">agriculture</span>
<h1 class="font-h3 text-h3 font-bold text-primary">Agri-AI</h1>
</div>
<button class="p-xs text-on-surface-variant">
<span class="material-symbols-outlined" data-icon="menu">menu</span>
</button>
</header>
<!-- Main Content Area -->
<main class="flex-grow flex flex-col h-screen overflow-hidden">
<!-- Dashboard Header / Weather (Prominent) -->
<div class="px-gutter py-md bg-surface-container-low border-b border-outline-variant/20 flex flex-wrap items-center justify-between gap-md shrink-0">
<div>
<h2 class="font-h2 text-h3 md:text-h2 text-on-surface">Welcome back, Farmer</h2>
<p class="text-on-surface-variant font-body-md">Here is your farm overview for today.</p>
</div>
<!-- Weather Widget (Now prominent dashboard feature) -->
<div class="flex items-center gap-lg bg-surface-container-lowest p-md rounded-xl border border-outline-variant/30 shadow-sm">
<div class="flex items-center gap-md">
<div class="w-12 h-12 rounded-full bg-tertiary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-on-tertiary-fixed text-[32px]" data-icon="wb_sunny">wb_sunny</span>
</div>
<div>
<p class="text-caption font-medium uppercase tracking-wider text-outline">Current Weather</p>
<p class="text-h3 font-bold text-on-surface">28°C <span class="text-body-md font-normal text-on-surface-variant">/ 18°C</span></p>
</div>
</div>
<div class="hidden sm:block border-l border-outline-variant/30 pl-lg">
<p class="text-caption text-outline">Humidity</p>
<p class="font-bold">64%</p>
</div>
<div class="hidden sm:block border-l border-outline-variant/30 pl-lg">
<p class="text-caption text-outline">Precipitation</p>
<p class="font-bold">0%</p>
</div>
</div>
</div>
<div class="flex-grow flex flex-col lg:flex-row overflow-hidden">
<!-- Center: Expanded Chat Interface -->
<section class="flex-grow flex flex-col min-w-0 border-r border-outline-variant/20 bg-surface">
<!-- Chat Header -->
<div class="px-lg py-sm border-b border-outline-variant/10 flex items-center justify-between bg-surface-container-lowest">
<div class="flex items-center gap-md">
<div class="relative">
<div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary-fixed-variant" data-icon="smart_toy">smart_toy</span>
</div>
<div class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full"></div>
</div>
<div>
<h3 class="font-h3 text-body-lg font-bold text-on-surface">Field Expert AI</h3>
<p class="text-caption text-secondary">Expert in Tanzanian Agriculture</p>
</div>
</div>
</div>
<!-- Chat Area -->
<div class="flex-grow overflow-y-auto p-lg space-y-lg custom-scrollbar flex flex-col" id="chat-box">
<!-- Welcome Message -->
<div class="chat-bubble-assistant self-start max-w-[70%] px-lg py-md shadow-sm">
<p class="text-body-md">Habari! I am your Agri-Assistant. How can I help with your crops or farming strategy today? I can help with soil health, pest control, and optimal planting cycles.</p>
</div>
</div>
<!-- Chat Input Area -->
<div class="p-lg bg-surface-container-lowest border-t border-outline-variant/20">
<div class="flex items-center gap-sm bg-surface rounded-xl border border-outline-variant/50 px-md py-sm focus-within:border-primary focus-within:ring-1 focus-within:ring-primary transition-all max-w-4xl mx-auto shadow-sm">
<button class="p-xs text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined" data-icon="attach_file">attach_file</span>
</button>
<input class="flex-grow bg-transparent border-none focus:ring-0 text-body-md placeholder:text-outline-variant" id="message" placeholder="Ask about soil, pests, or harvest cycles..." type="text"/>
<button class="w-10 h-10 rounded-lg bg-primary text-on-primary flex items-center justify-center shadow-md active:scale-90 transition-transform" onclick="sendMessage()">
<span class="material-symbols-outlined" data-icon="send" style="font-variation-settings: 'FILL' 1;">send</span>
</button>
</div>
</div>
</section>
<!-- Right Column: Sidebar Insights (Advice sections) -->
<aside class="hidden lg:flex flex-col w-96 overflow-y-auto custom-scrollbar bg-surface-container-lowest shrink-0 p-lg space-y-lg border-l border-outline-variant/10">
<!-- General Advice Section -->
<section class="bg-surface rounded-xl p-md border border-outline-variant/30">
<div class="flex items-center gap-sm mb-md">
<div class="w-8 h-8 rounded-lg bg-secondary-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-secondary-container text-[20px]" data-icon="lightbulb">lightbulb</span>
</div>
<h2 class="font-h3 text-label-md font-bold text-on-surface">General Advice</h2>
</div>
<p class="text-caption text-on-surface-variant mb-md leading-relaxed">Real-time AI recommendations based on your location and seasonal data.</p>
<div class="mb-md p-md rounded-lg bg-surface-container-low font-body-md text-on-surface-variant empty:hidden border-l-4 border-primary text-sm" id="advice">
<!-- Advice results will appear here -->
</div>
<button class="w-full py-xs px-md bg-primary-container text-on-primary-container font-label-md text-label-md rounded-lg hover:shadow-md transition-all active:scale-95 flex items-center justify-center gap-xs" onclick="getAdvice()">
<span class="material-symbols-outlined text-[16px]" data-icon="bolt">bolt</span>
                        Get Smart Advice
                    </button>
</section>
<!-- Crop Analysis Section -->
<section class="bg-surface rounded-xl p-md border border-outline-variant/30">
<div class="flex items-center gap-sm mb-md">
<div class="w-8 h-8 rounded-lg bg-tertiary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-on-tertiary-fixed text-[20px]" data-icon="psychology_alt">psychology_alt</span>
</div>
<h2 class="font-h3 text-label-md font-bold text-on-surface">Crop Diagnostics</h2>
</div>
<div class="space-y-sm mb-md">
<label class="font-label-md text-caption text-on-surface-variant" for="crop">Which crop are you growing?</label>
<input class="w-full bg-surface-container-low border border-outline-variant/40 focus:border-primary focus:ring-1 focus:ring-primary rounded-lg py-sm px-md text-body-md placeholder:text-outline/50" id="crop" placeholder="e.g. mahindi, mpunga" type="text"/>
</div>
<div class="mb-md p-md rounded-lg bg-surface-container-low font-body-md text-on-surface-variant empty:hidden border-l-4 border-tertiary text-sm" id="crop-result">
<!-- Crop advice results will appear here -->
</div>
<button class="w-full py-xs px-md bg-secondary text-on-secondary font-label-md text-label-md rounded-lg hover:shadow-md transition-all active:scale-95 flex items-center justify-center gap-xs" onclick="getCropAdvice()">
                        Analyze Crop
                    </button>
</section>
<!-- Quick Visual Tool Card -->
<div class="relative overflow-hidden rounded-xl h-40 group cursor-pointer">
<img class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A lush, expansive green farm field" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOuCw1-IGbW4x5JP6lXsfZDHlh6rTwhATajFHQcjUzQ0_cth6EvT1iFcAS_Y8Z0H67zMbvX_jd3vrOmnYRzn-wTd7hYVIegfObU3s7NhC5Y-ppgFAaVEuvtwzIiNS84fJc41OXp5H3-1Yv1loRd81CQHYEPa3k8qaRCer_ee9lP9t2aT8U11USLEMZmlAwIC2BkCPFaGOIbtE1R-3_YfZXo4RjE_KYmC-9hrIuXGmmCfd4pd5qRjYhcesU79ynzn6rr8F1c5Ofk4w"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex flex-col justify-end p-md">
<p class="text-white font-bold text-body-md">Yield Predictor</p>
<p class="text-white/80 text-caption">Estimate harvest results</p>
</div>
</div>
</aside>
</div>
</main>
<!-- Mobile Navigation Bar (Visible only on mobile) -->
<nav class="md:hidden fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-gutter py-sm bg-surface-container-lowest border-t border-outline-variant shadow-lg rounded-t-xl">
<a class="flex flex-col items-center justify-center bg-secondary-container text-on-secondary-container rounded-full px-lg py-xs active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="chat">chat</span>
<span class="font-label-md text-caption">Assistant</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant px-lg py-xs hover:text-primary active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="cloud">cloud</span>
<span class="font-label-md text-caption">Farming</span>
</a>
<a class="flex flex-col items-center justify-center text-on-surface-variant px-lg py-xs hover:text-primary active:scale-90 transition-all" href="#">
<span class="material-symbols-outlined" data-icon="psychology_alt">psychology_alt</span>
<span class="font-label-md text-caption">Crops</span>
</a>
</nav>
<!-- Original Scripts -->
<script>
        async function sendMessage() {
            const messageInput = document.getElementById('message');
            const message = messageInput.value.trim();
            if (!message) return;

            const chatBox = document.getElementById('chat-box');
            
            // Add user message to UI
            const userDiv = document.createElement('div');
            userDiv.className = 'chat-bubble-user self-end max-w-[85%] lg:max-w-[70%] px-lg py-md';
            userDiv.innerHTML = `<p class="text-body-md">${message}</p>`;
            chatBox.appendChild(userDiv);
            
            messageInput.value = '';
            chatBox.scrollTop = chatBox.scrollHeight;

            try {
                const response = await fetch('/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRFToken': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ message })
                });
                const data = await response.json();
                
                // Add assistant response to UI
                const botDiv = document.createElement('div');
                botDiv.className = 'chat-bubble-assistant self-start max-w-[85%] lg:max-w-[70%] px-lg py-md shadow-sm mt-md';
                botDiv.innerHTML = `<p class="text-body-md">${data.response}</p>`;
                chatBox.appendChild(botDiv);
                chatBox.scrollTop = chatBox.scrollHeight;
            } catch (error) {
                console.error('Error sending message:', error);
            }
        }

        async function getAdvice() {
            const adviceContainer = document.getElementById('advice');
            adviceContainer.innerHTML = '<span class="italic text-caption">Fetching expert advice...</span>';
            adviceContainer.classList.remove('hidden');

            try {
                const response = await fetch('/get_advice', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRFToken': document.querySelector('meta[name="csrf-token"]').content
                    }
                });
                const data = await response.json();
                adviceContainer.innerHTML = data.advice;
            } catch (error) {
                console.error('Error getting advice:', error);
                adviceContainer.innerHTML = 'Sorry, could not fetch advice at this moment.';
            }
        }

        async function getCropAdvice() {
            const cropInput = document.getElementById('crop');
            const crop = cropInput.value.trim();
            if (!crop) return;

            const resultContainer = document.getElementById('crop-result');
            resultContainer.innerHTML = '<span class="italic text-caption">Analyzing crop data...</span>';
            resultContainer.classList.remove('hidden');

            try {
                const response = await fetch('/get_crop_advice', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRFToken': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ crop })
                });
                const data = await response.json();
                resultContainer.innerHTML = data.advice;
            } catch (error) {
                console.error('Error getting crop advice:', error);
                resultContainer.innerHTML = 'Error analyzing crop data.';
            }
        }

        // Support Enter key for message input
        document.getElementById('message').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    </script>
</body></html>
