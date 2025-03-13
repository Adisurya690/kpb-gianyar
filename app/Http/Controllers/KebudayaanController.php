<?php

namespace App\Http\Controllers;

use App\Models\Kebudayaan;
use Illuminate\Http\Request;

class KebudayaanController extends Controller
{
    public function index(Request $request, $category = null)
    {
        $query = Kebudayaan::with('images'); // Ambil relasi images

        // Jika ada kategori, filter berdasarkan kategori
        if ($category) {
            $query->where('category', $category);
        }

        // Filter berdasarkan pencarian teks
        if ($request->filled('search')) {
          $searchTerms = explode(' ', $request->input('search'));
          $query->where(function ($q) use ($searchTerms) {
              foreach ($searchTerms as $term) {
                  $q->where(function ($innerQuery) use ($term) {
                      $innerQuery->where('category', 'like', "%$term%")
                          ->orWhere('name', 'like', "%$term%")
                          ->orWhere('location', 'like', "%$term%");
                  });
              }
          });
      }

      // Filter berdasarkan kategori (Benda/Tak Benda)
      if ($request->filled('category') && in_array($request->input('category'), ['Benda', 'Tak Benda'])) {
          $query->where('category', $request->input('category'));
      }

        // Ambil data kebudayaan berdasarkan query dan pagination
        $kebudayaan = $query->orderBy('name', 'asc')->paginate(12);

        return view('user.kebudayaan', compact('kebudayaan'));
    }

    public function show($slug)
    {
        // Ambil data kebudayaan beserta semua gambar
        $kebudayaan = Kebudayaan::with('images')->where('slug', $slug)->firstOrFail();

        // Kebudayaan lainnya (tidak termasuk kebudayaan yang sedang dibuka)
        $otherKebudayaans = Kebudayaan::with('images')
            ->where('id', '!=', $kebudayaan->id)
            ->latest()
            ->take(4)
            ->get();

        return view('user.kebudayaanDetail', compact('kebudayaan', 'otherKebudayaans'));
    }
}
