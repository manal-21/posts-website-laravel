<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index () {

        // the with function is used to perform eager loading which helps in reducing the queries required by each iteration in the view
        $posts = Post::latest()->with(['user', 'likes'])->paginate(5);

        return view('index', [ 'posts' => $posts ]);
    }

    public function store (Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    public function destroy (Post $post) {

        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }
}
