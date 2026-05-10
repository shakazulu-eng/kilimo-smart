@extends('layouts.farmer')

@section('title','Farmer Dashboard')

@section('content')

<h2>Quick Actions</h2>

<ul>
    <li><a href="{{ route('student.alerts') }}"
   class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
    View Weather Alerts
</a>
</li>
    <li><a href="#">Weather history & reports</a></li>
<li>
   <a href="{{ route('student.crop.advice') }}" class="btn btn-primary">
    Advice
</a>

</li>

    <li><a href="secure">Add Comment</a></li>
</ul>



<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

<a href="{{ url('/test-ai') }}"
   class="fixed bottom-5 right-5 z-50 group flex items-center gap-2">

    <!-- Text -->
    <span class="bg-green-600 text-white text-sm font-semibold
                 px-3 py-2 rounded-full shadow-lg
                 group-hover:bg-green-700 transition-all duration-300">
        Chat with Assistant
    </span>

    <!-- Small AI Icon -->
    <div class="relative flex items-center justify-center
                w-12 h-12 rounded-full
                bg-gradient-to-r from-green-600 to-emerald-500
                shadow-xl shadow-green-500/30
                hover:scale-110
                transition-all duration-300">

        <!-- Glow -->
        <div class="absolute inset-0 rounded-full
                    bg-green-400 blur-lg opacity-30
                    group-hover:opacity-60 transition-all">
        </div>

        <!-- Icon -->
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-6 h-6 text-white relative z-10"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor"
             stroke-width="2">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M9.75 3a6.75 6.75 0 00-6.75 6.75c0 1.75.66 3.34 1.75 4.53V21l4.97-2.49c.73.16 1.49.24 2.28.24A6.75 6.75 0 1012 3h-2.25z"/>

        </svg>

    </div>

</a>
@endsection
