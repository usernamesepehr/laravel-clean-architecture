<?php

namespace App\Interfaces\Http\Controllers;

use Application\User\CreateUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController 
{
    public function __construct(
        private CreateUserService $createUserService
    ) {}

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = $this->createUserService->execute(
            $request->name,
            $request->email
        );

        return response()->json([
            'id'    => $user->id()->toString(),
            'name'  => $user->name(),
            'email' => $user->email()->toString(),
        ], 201);
    }
}