<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogMainController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('category', 'user')
            ->orderBy('id', 'desc')
            ->where('is_published', '=', 1)
            ->paginate(8);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->where('is_published', '=', 1)->with('user')->firstOrFail();
        $post->views += 1;
        $post->update();

        $previous_id = BlogPost::where('is_published', '=', 1)->where('id', '<', $post->id)->max('id');
        $previous_post = BlogPost::find($previous_id);
        $next_id = BlogPost::where('is_published', '=', 1)->where('id', '>', $post->id)->min('id');
        $next_post = BlogPost::find($next_id);

        return view('blog.show', compact('post', 'previous_post', 'next_post'));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->where('is_published', '=', 1)->orderBy('id', 'desc')->paginate(8);

        return view('blog.category', compact('category', 'posts'));
    }

    public function tag($slug)
    {
        $tag = BlogTag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->where('is_published', '=', 1)->orderBy('id', 'desc')->paginate(8);

        return view('blog.tag', compact('tag', 'posts'));
    }
}
