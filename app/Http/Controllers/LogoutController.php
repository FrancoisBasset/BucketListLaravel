<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController {
    function logout(Request $request) {
        $request->user()->tokens()->delete();
    }
}
