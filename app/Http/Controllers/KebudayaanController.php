<?php

namespace App\Http\Controllers;

use App\Models\Kebudayaan;
use Illuminate\Http\Request;

class KebudayaanController extends Controller
{
    public function index(Request $request, $category = null)
    {
        $query = Kebudayaan::query(); // Query dasar untuk kebudayaan
    
        // Jika ada kategori, filter berdasarkan kategori
        if ($category) {
            $query->where('category', $category);
        }
    
        // Filter pencarian jika ada input
        if ($request->filled('search')) {
            $searchTerms = explode(' ', $request->input('search')); // Pisahkan input menjadi beberapa kata
            $query->where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->where(function ($innerQuery) use ($term) {
                        $innerQuery->where('category', 'like', "%$term%")
                            ->orWhere('name', 'like', "%$term%")
                            ->orWhere('location', 'like', "%$term%")
                            ->orWhere('description', 'like', "%$term%");
                    });
                }
            });
        }
    
        // Ambil data kebudayaan berdasarkan query dan pagination
        $kebudayaan = $query->orderBy('name', 'asc')->paginate(12);
    
        return view('user.kebudayaan', compact('kebudayaan'));
    }    

    public function show($slug)
    {
        $kebudayaan = Kebudayaan::where('slug', $slug)->firstOrFail();

        // Kebudayaan lainnya (tidak termasuk kebudayaan yang sedang dibuka)
        $otherKebudayaans = Kebudayaan::where('id', '!=', $kebudayaan->id)
            ->latest()
            ->take(4)
            ->get();

        return view('user.kebudayaanDetail', compact('kebudayaan', 'otherKebudayaans'));
    }
}
