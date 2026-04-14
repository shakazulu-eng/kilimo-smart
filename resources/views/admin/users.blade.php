<x-app-layout>

    <div style="padding: 30px;">

        <h2 style="margin-bottom: 20px;">All Students</h2>

        @if(session('success'))
            <div style="color: green; margin-bottom:10px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="color: red; margin-bottom:10px;">
                {{ session('error') }}
            </div>
        @endif

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 700px;">

                <thead style="background-color: #f5f5f5;">
                    <tr>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align:left;">Name</th>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align:left;">Email</th>
                        <th style="padding: 12px; border: 1px solid #ddd; text-align:left;">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">
                            {{ $user->name }}
                        </td>

                        <td style="padding: 12px; border: 1px solid #ddd;">
                            {{ $user->email }}
                        </td>

                        <td style="padding: 12px; border: 1px solid #ddd;">
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Una uhakika?')">
                                @csrf
                                @method('DELETE')

                                <button style="
                                    background: red;
                                    color: white;
                                    border: none;
                                    padding: 6px 12px;
                                    border-radius: 5px;
                                    cursor: pointer;
                                ">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</x-app-layout>
