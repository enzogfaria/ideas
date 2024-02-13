<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea){

        return view('ideas.show', compact('idea'));
    }

    public function store(){

        request()->validate([
            'content'=> 'required|min:5|max:240'
        ]);

        $idea = Idea::create(
            [
            'content' => request()->get('idea', ''),
            ]
        );

        return redirect()->route('dashboard')->with('sucess', 'Idea created sucessfully!');
    }

    public function destroy(Idea $idea){
        $idea->delete();

        return redirect()->route('dashboard')->with('sucess', 'Idea deleted sucessfully!');
    }

    public function edit(Idea $idea){

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea){

    request()->validate([
        'idea'=> 'required|min:5|max:240'
    ]);

    $idea->content = request()->get('content', '');

    return view('ideas.show', compact('idea', 'editing'));
    }
}
