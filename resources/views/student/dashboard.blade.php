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


<!-- Small AI Button -->
<a href="{{ url('/test-ai') }}"
   class="fixed bottom-4 right-4 z-50
          bg-green-600 hover:bg-green-700
          text-white text-xs font-medium
          px-3 py-2 rounded-full shadow-md
          transition">

    🤖 AI Chat

</a>
            
@endsection
