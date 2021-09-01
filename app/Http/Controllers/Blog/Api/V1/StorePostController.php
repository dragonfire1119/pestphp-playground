<?php

namespace App\Http\Controllers\Blog\Api\V1;

use App\Http\Controllers\BlogBaseController;
use App\Models\Blog\Post;
use Illuminate\Http\Request;

class StorePostController extends BlogBaseController
{
    public function __invoke(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        $post = new Post;
        $post->title = $title;
        $post->content = $content;
        $post->save();

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post,
        ]);
    }
}
