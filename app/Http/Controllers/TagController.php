<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags',
            'color' => 'required|string',
        ]);
        Tag::create([
            'name' => $request->name,
            'color' => $request->color,
        ]);
        return redirect()->route('tags.index')->with('success', 'Tag criada!');
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['color' => 'required|string']);
        $tag->color = $request->color;
        $tag->save();
        return redirect()->route('tags.index')->with('success', 'Cor da tag atualizada!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag excluída!');
    }
}
