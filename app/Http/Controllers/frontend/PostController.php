<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $list_post = Post::where([['status', '=', 1], ['type', '=', 'post']])
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('frontend.post', compact('list_post'));
    }
    // In Post.php model

    public function post_detail($slug)
    {
        // Retrieve the post item based on the slug
        $postitem = Post::where([['slug', '=', $slug], ['status', '=', 1], ['type', '=', 'post']])
            ->first();

        if (!$postitem) {
            abort(404); // or handle the error as needed
        }

        // Get the topic_id of the retrieved post
        $topicId = $postitem->topic_id;

        // Use the getlistoptc method to get posts with the same topic_id
        $list_post = Post::getlistoptc($topicId);

        // Return the view with the retrieved data
        return view('frontend.post_detail', compact('postitem', 'list_post'));
    }
    public function topic($slug)
    {
        $row_topic = Topic::where([['slug', '=', $slug], ['status', '=', 1]])
            ->select("id", "name", "slug")->first();
        $list_post = Post::where([['status', '=', 1], ['type', '=', 'post'], ['topic_id', '=', $row_topic->id]])
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('frontend.post_topic', compact('list_post', 'row_topic'));
    }
    public function topic_index()
    {
        return view('frontend.topic');
    }
}
