<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegistrationRequest $request) 
    {
        try {
            $newUser = User::create([
                'name'             => $request->name,
                'email'            => $request->email,
                'password'         => Hash::make($request->password)
            ]);

            return response()->json([
                'status_code' => 201,
                'message'     => 'Successful',
                'data'        => new UserResource($newUser)
            ]);
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status_code' => 400,
                    'message'     => $e->getMessage(),
                ],
                400
            );
        }
    }
}
