<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function PHPUnit\Framework\returnArgument;

class JWTAuthController extends Controller
{

    public function register(UserStoreRequest $request): JsonResponse {
        $fields = $request->validated();

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return $this->successResponse($response);
    }

    public function login(UserLoginRequest $request): JsonResponse
    {
        $fields = $request->validated();

        if (!Auth::attempt($fields)) {
            return $this->errorResponse(ResponseAlias::HTTP_UNAUTHORIZED,'Invalid Email or Password');
        }

        $user = User::where('email', $fields['email'])->first();

        if ( !$user || !Hash::check($fields['password'], $user->password)) {
            return $this->errorResponse(ResponseAlias::HTTP_INTERNAL_SERVER_ERROR,'Error in Login');
        }

        $token = $user->createToken('authToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return $this->successResponse($response);
    }

    public function logout(Request $request): JsonResponse {
        auth()->user()->tokens()->delete();
        return $this->successResponse([],"Logged out");
    }

}
