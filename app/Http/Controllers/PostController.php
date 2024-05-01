<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $imagePath = $this->fileOperations($request);

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'image' => $imagePath,
        ];

        Post::create($data);

        return redirect()->route('posts.home');

    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);

    $imagePath = $this->fileOperations($request);

    $data = [
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'body' => $request->input('body'),
        'image' => $imagePath,
    ];

    $post->update($data);

    return redirect()->route('posts.home');
}


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.home');
    }

    private function fileOperations($request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
           
            return $image ->store("/","posts_uploads");
        }
        return null;
    }
}

