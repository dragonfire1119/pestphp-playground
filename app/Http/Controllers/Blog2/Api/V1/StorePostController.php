<?php

namespace App\Http\Controllers\Blog2\Api\V1;

use App\Http\Controllers\Blog2BaseController;
use App\Models\Blog2\Post;
use Illuminate\Http\Request;

class StorePostController extends Blog2BaseController
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
