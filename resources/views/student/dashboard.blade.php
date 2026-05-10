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


<a href="/test-ai"
   class="fixed bottom-6 right-6 z-50 group">

    <div class="relative flex items-center justify-center
                w-16 h-16 rounded-full
                bg-gradient-to-r from-green-600 to-emerald-500
                shadow-2xl shadow-green-500/40
                hover:scale-110
                transition-all duration-300">

        <!-- Glow Effect -->
        <div class="absolute inset-0 rounded-full
                    bg-green-400 blur-xl opacity-40
                    group-hover:opacity-70 transition-all">
        </div>

        <!-- AI Icon -->
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-8 h-8 text-white relative z-10"
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


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>


@endsection
