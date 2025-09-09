<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOwnedIdea {
    public function handle(Request $request, Closure $next): Response {
        $idea = $request->route('idea');

        if ($idea && $idea->user_id !== $request->user()->id) {
            abort(403);
        }

        return $next($request);
    }
}
