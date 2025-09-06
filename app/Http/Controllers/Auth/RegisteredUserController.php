<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController {
	/**
	 * Handle an incoming registration request.
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(RegisterRequest $request): Response {
		$user = User::create([
			'username' => $request->username,
			'password' => Hash::make($request->string('password')),
		]);

		event(new Registered($user));

		Auth::login($user);

		return new Response(null, Response::HTTP_CREATED);
	}
}
