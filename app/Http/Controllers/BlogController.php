<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
    
        // Query awal untuk blog
        $blogsQuery = Blog::latest();
    
        // Filter berdasarkan pencarian jika ada
        if (!empty($query)) {
            $blogsQuery->where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                  ->orWhere('content', 'like', '%' . $query . '%');
            });
        }
    
        $blogs = $blogsQuery->paginate(9);
    
        return view('user.blog', compact('blogs', 'query'));
    }
  
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Blog lainnya (tidak termasuk blog yang sedang dibuka)
        $otherBlogs = Blog::where('id', '!=', $blog->id)
            ->latest()
            ->take(4)
            ->get();

        return view('user.blogDetail', compact('blog', 'otherBlogs'));
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $blogs = Blog::where('title', 'like', '%' . $query . '%')
    //                 ->orWhere('content', 'like', '%' . $query . '%')
    //                 ->latest()
    //                 ->get();

    //     return view('user.blog', compact('blogs', 'query'));
    // }
}
