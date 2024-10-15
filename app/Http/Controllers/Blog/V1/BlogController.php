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
            'users.name as user_name',
            'users.profile_photo_path as user_image',
            'user_details.vname as display_name',
            'user_details.bio as user_bio',
            'user_details.role as user_role',
            )
            ->join('commons as categories', 'categories.id', '=', 'posts.blogcategory_id')
            ->join('blog_tags', 'blog_tags.id', '=', 'posts.blogtag_id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('user_details', 'user_details.user_id', '=', 'posts.user_id')
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
                    'user_image' =>URL(\Illuminate\Support\Facades\Storage::url($post->user_image)),
                    'user_id'=>$post->user_id,
                    'user_name'=>$post->user_name,
                    'display_name'=>$post->display_name,
                    'user_bio'=>$post->user_bio,
                    'user_role'=>$post->user_role,
                    'created_at'=>$post->created_at,
                    'updated_at'=>$post->updated_at,
                ];
            });
    }
}
