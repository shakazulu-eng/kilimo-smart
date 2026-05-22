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


<!-- Modern AI Assistant Button -->
<a href="{{ url('/test-ai') }}"
   class="fixed bottom-5 right-5 z-50
          flex items-center gap-2
          bg-white/90 backdrop-blur-md
          border border-green-200
          hover:border-green-400
          text-green-700 hover:text-green-800
          px-4 py-2 rounded-full
          shadow-lg hover:shadow-xl
          transition-all duration-300
          hover:-translate-y-1">

    <!-- Small AI Icon -->
    <div class="w-8 h-8 rounded-full
                bg-gradient-to-r from-green-500 to-emerald-600
                flex items-center justify-center
                shadow-md">

        <span class="text-white text-sm">🤖</span>
    </div>

    <!-- Text -->
    <span class="text-sm font-semibold">
        Chat with AI
    </span>

</a>
            
@endsection
