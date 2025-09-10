<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Http\Request;

class FriendshipController {
    public function index(Request $request) {
        return $request->user()->friends;
    }

    public function store(Request $request) {
        abort_if($request->user()->id == $request->friend_id, 409, 'Vous ne pouvez pas être ami avec vous même');

        $where = [
            'user_id' => $request->user()->id,
            'friend_id' => $request->friend_id
        ];

        abort_if(Friendship::where($where)->exists(), 409, 'Vous êtes déjà amis');

        abort_if(User::whereId($request->friend_id)->doesntExist(), 404, 'Cet utilisateur n\'existe pas');

        $friendship = Friendship::create($where);
        return response()->json($friendship, 201);
    }

    public function show(Request $request, $id) {
        return User::findOrFail($id);
    }

    public function destroy(Request $request, $id) {
        Friendship::where([
            'user_id' => $request->user()->id,
            'friend_id' => $id
        ])->delete();

        return response()->json(null, 204);
    }
}
