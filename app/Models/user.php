use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'role' => 'farmer'  // automatically assign role
]);
