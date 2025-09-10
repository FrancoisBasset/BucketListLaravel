<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController {
    public function store(Request $request, $id) {
        if (Idea::whereId($id)->exists()) {
            $comment = Comment::create([
                'idea_id' => $id,
                'user_id' => $request->user()->id,
                'comment' => $request->comment
            ]);

            return response()->json($comment, 201);
        } else {
            abort(404, 'Cet idée n\'existe pas');
        }
    }

    public function update(Request $request, Comment $comment) {
        $comment->update($request->all());

        return $comment;
    }

    public function destroy(Comment $comment) {
        $comment->delete();

        return response()->noContent();
    }
}
