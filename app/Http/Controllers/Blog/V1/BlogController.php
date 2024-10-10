<?php

namespace App\Http\Controllers\Blog\V1;

use Aaran\Blog\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function getBlog()
    {
        return DB::table('posts')
            ->select('posts.*',
                'categories.vname as category_name',
                'blog_tags.vname as tag_name',
            'users.name as user_name')
            ->join('commons as categories', 'categories.id', '=', 'posts.blogcategory_id')
            ->join('blog_tags', 'blog_tags.id', '=', 'posts.blogtag_id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->latest()
            ->take(10)->get()
            ->transform(function ($post) {
                return [
                    'id' => $post->id,
                    'vname' => $post->vname,
                    'body' => $post->body,
                    'blogcategory_id' => $post->blogcategory_id,
                    'category_name' => $post->category_name,
                    'blogtag_id' => $post->blogtag_id,
                    'tag_name' => $post->tag_name,
                    'image' =>URL(\Illuminate\Support\Facades\Storage::url('images/'.$post->image)),
                    'user_id'=>$post->user_id,
                    'user_name'=>$post->user_name,
                ];
            });
    }
}
