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

    <li><a href="secure">Add Comment here </a></li>
</ul>



<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>


<!-- AI Assistant Button -->
<a href="{{ url('/test-ai') }}"
   class="fixed bottom-5 right-5 z-50 flex items-center gap-2
          bg-gradient-to-r from-green-600 to-emerald-500
          hover:from-green-700 hover:to-emerald-600
          text-white text-sm font-semibold
          px-4 py-2 rounded-full shadow-lg
          hover:shadow-2xl hover:scale-105
          transition-all duration-300">

    <!-- AI Icon -->
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-5 h-5"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor"
         stroke-width="2">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M8 10h.01M12 10h.01M16 10h.01M9 16h6
                 M12 3C7.03 3 3 6.58 3 11c0 2.05.87 3.92
                 2.29 5.36L4 21l5.09-1.67
                 c.91.25 1.89.38 2.91.38
                 4.97 0 9-3.58 9-8s-4.03-8-9-8z"/>
    </svg>

    <span>AI Assistant</span>
</a>
            
@endsection
