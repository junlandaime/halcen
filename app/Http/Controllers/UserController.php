<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use PragmaRX\Google2FAQRCode\Google2FA;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Ambil semua role dari database
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
$validated = $request->validate([
    'name'     => 'required|string|max:255',
    'email'    => 'required|email|unique:users',
    'password' => 'required|string|min:8|confirmed',
    'role'     => 'required|exists:roles,name',
]);

$user = User::create([
    'name'     => $validated['name'],
    'email'    => $validated['email'],
    'password' => Hash::make($validated['password']),
    'role'     => $validated['role'], // <- tambahkan ini
]);

$user->assignRole($validated['role']);




        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $roles = Role::all(); // Ambil semua role dari Spatie
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
$validated = $request->validate([
    'name'     => 'required|string|max:255',
    'email'    => ['required', 'email', Rule::unique('users')->ignore($user->id)],
    'password' => 'nullable|string|min:8|confirmed',
    'role'     => 'required|exists:roles,name',
]);


$user->update([
    'name'     => $validated['name'],
    'email'    => $validated['email'],
    'password' => $validated['password']
        ? Hash::make($validated['password'])
        : $user->password,
    'role'     => $validated['role'], // <- tambahkan ini
]);

$user->syncRoles([$validated['role']]);



        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }

    public function enable2FA(User $user)
    {
        $google2fa = app(Google2FA::class);
        $secret = $google2fa->generateSecretKey();

        $user->two_factor_secret = $secret;
        $user->save();

        return redirect()->route('admin.users.qr', $user->id);
    }

    public function disable2FA(User $user)
    {
        $user->two_factor_secret = null;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', '2FA dinonaktifkan.');
    }

    public function showQr(User $user)
    {
        if (!$user->two_factor_secret) {
            return redirect()->route('admin.users.index')->with('error', 'User belum mengaktifkan 2FA.');
        }

        $google2fa = app(Google2FA::class);

        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $user->two_factor_secret
        );

        return view('admin.users.qr', [
            'user'      => $user,
            'QR_Image'  => $QR_Image,
            'secret'    => $user->two_factor_secret,
        ]);
    }
}
