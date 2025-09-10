<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController {
    public function store(Request $request, $id) {
        $where = [
            'user_id' => $request->user()->id,
            'idea_id' => $id
        ];

        if (Like::where($where)->doesntExist()) {
            $like = Like::create($where);

            return $like;
        } else {
            abort(409, 'Vous avez déjà liké cette idée');
        }
    }

    public function destroy(Request $request, $id) {
        Like::where([
            'user_id' => $request->user()->id,
            'idea_id' => $id
        ])->delete();

        return response()->noContent();
    }
}
