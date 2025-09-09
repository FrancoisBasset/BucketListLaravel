<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Services\ApiNinjasService;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class IdeaController {
    public function index(Request $request) {
        return $request->user()->ideas;
    }

    public function store(Request $request) {
        $title = ApiNinjasService::getRandomIdea();
        $title = GoogleTranslate::trans($title, 'fr');

        $idea = Idea::create([
            'user_id' => $request->user()->id,
            'title' => $title,
            'description' => ''
        ]);

        return $idea;
    }

    public function show(Request $request, Idea $idea) {
        return $idea;
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
