<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdeaResource;
use App\Http\Resources\LikeResource;
use App\Models\Idea;
use App\Services\ApiNinjasService;
use Illuminate\Http\Request;

class IdeaController {
    public function index(Request $request) {
        return IdeaResource::collection(Idea::all());
    }

    public function store(Request $request) {
        $title = ApiNinjasService::getRandomIdea();

        $idea = Idea::create([
            'user_id' => $request->user()->id,
            'title' => $title,
            'description' => ''
        ]);

        return $idea;
    }

    public function show(Request $request, Idea $idea) {
        return IdeaResource::make($idea);
    }

    public function update(Request $request, Idea $idea) {
        $idea->update($request->all());

        return $idea;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea) {
        $idea->delete();

        return $idea;
    }
}
