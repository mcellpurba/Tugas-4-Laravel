<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   public function login(Request $request)
   {
      // Validasi input email dan password
      $rules = [
         'email' => 'required|email',
         'password' => 'required'
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
         return response()->json([
            'status' => false,
            'message' => 'proses login gagal',
            'data' => $validator->errors()

         ], 401);
      }
      if (!Auth::attempt($request->only(['email', 'password']))) {
         return response()->json([
            'status' => false,
            'message' => 'Email atau Password Salah'
         ], 401);
      }
      $user = User::where('email', $request->email)->first();
      return response()->json([
         'status' => true,
         'message' => 'Login Berhasil',
         'token' => $user->createToken('API Token')->plainTextToken,
         'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->Role ? $user->Role->nama_role : null
         ]
      ]);
   }

   public function register(Request $request)
   {
      $user = new User();
      $rules = [
         'name' => 'required',
         'email' => 'required|email|unique:users,email',
         'password' => 'required'
      ];

      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) {
         return response()->json([
            'status' => false,
            'message' => 'proses validasi gagal',
            'data' => $validator->errors()

         ], 401);
      }

      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->save();

      return response()->json([
         'status' => true,
         'message' => 'Registrasi berhasil'
      ], 200);
   }

   public function logout(Request $request)
   {
      // Hapus semua token user yang sedang login
      $request->user()->tokens()->delete();

      return response()->json([
         'status' => true,
         'message' => 'Logout berhasil'
      ], 200)->header('Content-Type', 'application/json');
   }
}


