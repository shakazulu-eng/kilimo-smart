<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Weather Alerts
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

                @if($alerts->isEmpty())
                    <p class="text-gray-500">No alerts for now.</p>
                @else
                    <ul class="space-y-2">
                        @foreach($alerts as $alert)
                            <li class="p-3 rounded
                                @if($alert->severity == 'high') bg-red-200
                                @elseif($alert->severity == 'medium') bg-yellow-200
                                @else bg-green-200 @endif
                            ">
                                <strong>{{ ucfirst($alert->type) }}:</strong> {{ $alert->message }}
                                <br>
                                <small class="text-gray-600">{{ $alert->created_at->format('d M Y H:i') }}</small>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </div>
        </div>
<a href="{{ route('dashboard') }}"
               class="text-green-700 font-semibold hover:underline">
                ← Rudi Dashboard
            </a

    </div>
</x-app-layout>
