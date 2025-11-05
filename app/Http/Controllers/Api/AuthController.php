<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\User;


class AuthController extends Controller
{
    public function login(Request $request)
{
// Validasi input email dan password
$request->validate([
'email' => ['required', 'string', 'email'],
'password' => ['required', 'string'],
]);
if (!Auth::attempt($request->only('email', 'password'))) {
return response()->json([
'message' => 'Kredensial tidak valid.'
], 401);
}
$user = Auth::user();
// Hapus token yang ada sebelumnya (opsional, untuk keamanan)
// Membuat token baru. 'api-token' adalah nama token.

return response()->json([
'user' => $user,
'token_type' => 'Bearer',
]);
}
public function user(Request $request)
{
return response()->json($request->user());
}
public function logout(Request $request)
{
// Mendapatkan pengguna yang saat ini terautentikasi melalui token.
$user = $request->user();
// Menghapus token API yang saat ini digunakan (currentAccessToken()).
// Memastikan token tidak bisa digunakan lagi.
$user->currentAccessToken()->delete();
return response()->json([
'message' => 'Berhasil logout. Token telah dicabut.'
], 200);
}
}
