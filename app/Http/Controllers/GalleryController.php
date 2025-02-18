<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
  public function index(Request $request)
  {
      $search = $request->input('search'); // Ambil input pencarian

      // Jika ada pencarian, filter hasilnya berdasarkan nama
      $galleries = Gallery::when($search, function ($query, $search) {
          return $query->where('name', 'like', "%{$search}%"); // Cari berdasarkan nama
      })->get(); // Ambil data yang sudah difilter

      return view('user.galeri', compact('galleries')); // Kirim data ke view
  }
}
