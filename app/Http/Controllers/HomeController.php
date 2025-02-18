<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function home()
  {
      $blogs = Blog::latest()->take(3)->get(); // Mengambil 3 blog terbaru
      return view('user.home', compact('blogs'));
  }
}
