<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::all(); // Получаем все записи
        return view('welcome', compact('posts'));
    }

    public function show($id)
    {
        $post = Posts::findOrFail($id); // Найдет пост или выкинет 404
        return view('show', compact('post'));
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'theme' => 'required|string',
            'post' => 'required',
            'time_for_posted' => 'required'
        ]);

        $post = Posts::findOrFail($id);
        $post->update($validated);

        return redirect("/posts/{$post->id}");
    }
}
