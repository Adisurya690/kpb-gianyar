<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Lapor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportSubmittedMail;
use App\Mail\ReportSubmittedMailUser;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validasi input
      $data = $request->validate([
        'name' => 'required|string',
        'location' => 'required|string',
        'images' => 'required|array|max:3', // Maksimal 3 file
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120', // Maksimal 5 MB per file
        'description' => 'required|string',
      ]);

      // Simpan data laporan ke dalam database
      $report = new Lapor();
      $report->name = $request->name;
      $report->location = $request->location;
      $report->description = $request->description;
      if (Auth::guard('web')->check()) {
          $report->reporter = Auth::guard('web')->user()->name; // Dari tabel users
      } elseif (Auth::guard('internal')->check()) {
          $report->reporter = Auth::guard('internal')->user()->name; // Dari tabel internals
      }
      $report->status = 'Laporan Dikirim'; // Status default
      $report->save();

      // Simpan gambar
      if ($request->hasFile('images')) {
          foreach ($request->file('images') as $image) {
              $path = $image->store('lapor_images', 'public'); // Simpan di storage/app/public/lapor_images
      
              // Cek apakah gambar dengan path ini sudah ada
              $exists = $report->images()->where('path', $path)->exists();
      
              if (!$exists) {
                  $report->images()->create([
                      'path' => $path,
                  ]);
              }
          }
      }    

      // Menambahkan informasi lainnya
      if (Auth::guard('web')->check()) {
          $data['reporter'] = Auth::guard('web')->user()->name; // Dari tabel users
      } elseif (Auth::guard('internal')->check()) {
          $data['reporter'] = Auth::guard('internal')->user()->name; // Dari tabel internals
      } 
      $data['status'] = 'Laporan Dikirim';

      // Kirim email ke admin dan user
      $adminEmails = \App\Models\Email::where('email_active_status', 'Aktif')->get();
      foreach ($adminEmails as $adminEmail) {
          Mail::to($adminEmail->email)->send(new ReportSubmittedMail($report));
      }

      // Kirim email ke user (pelapor)
      if (Auth::guard('web')->check()) {
          $email = Auth::guard('web')->user()->email; // Email dari tabel users
      } elseif (Auth::guard('internal')->check()) {
          $email = Auth::guard('internal')->user()->email; // Email dari tabel internals
      }
      
      Mail::to($email)->send(new ReportSubmittedMailUser($report));    

      return redirect()->route('kebudayaan')->with('success', 'Laporan berhasil dikirim.');
    }

    public function showStatus()
    {
        $user = Auth::user();

        if ($user instanceof \App\Models\User || $user instanceof \App\Models\Internal) {
            // Mengambil laporan berdasarkan nama pelapor dari tabel `users` atau `internals`
            $reports = Lapor::where('reporter', $user->name)
                            ->with('statusHistories')
                            ->get();

            return view('user.statusLapor', compact('reports'));
        }

        return abort(403, 'Unauthorized'); // Jika tidak ada user yang login
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
