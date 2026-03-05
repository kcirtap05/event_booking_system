<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegistrationRequest;
use App\Http\Resources\User\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function register(RegistrationRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'code'   => 200,
                'status'  => 'ok',
                'message' => 'successfully created',
                'data'    => new UserResource($user),
            ]);
            
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            return response()->json([
                'code' => 500,
                'status' => 'fail',
                'message' => 'UNHANDLED EXCEPTION',
            ]);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (! $user || ! Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
            $expires_at = Carbon::now()->addSeconds(1800);
            $token = $user->createToken('api_token', ['*'], $expires_at)->plainTextToken;

            return response()->json([
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => $expires_at
            ]);
        } catch (Throwable $e) {
            Log::info($e->getMessage());
            return response()->json([
                'code' => 500,
                'status' => 'fail',
                'message' => 'UNHANDLED EXCEPTION',
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function getMe()
    {
        $user = Auth::user();
        return $user;
    }

}