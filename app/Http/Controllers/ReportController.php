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
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'description' => 'required|string',
      ]);

      // Simpan data laporan ke dalam database
      $report = new Lapor();
      $report->name = $request->name;
      $report->location = $request->location;
      $report->description = $request->description;
      $report->reporter = Auth::user()->name; // Ambil nama user yang login
      $report->status = 'Laporan Dikirim'; // Status default
      $report->save();

      // Jika ada gambar, simpan ke storage
      if ($request->hasFile('image')) {
          $path = $request->file('image')->store('lapor_image', 'public');
          $report->image = $path;
          $report->save();
      }

      // Menambahkan informasi lainnya
      $data['reporter'] = Auth::user()->name;
      $data['status'] = 'Laporan Dikirim';

      // Kirim email ke admin dan user
      $adminEmails = \App\Models\Email::where('email_active_status', 'Aktif')->get();
      foreach ($adminEmails as $adminEmail) {
          Mail::to($adminEmail->email)->send(new ReportSubmittedMail($report));
      }

      // Kirim email ke user (pelapor)
      Mail::to(Auth::user()->email)->send(new ReportSubmittedMailUser($report));

      return redirect()->route('kebudayaan')->with('success', 'Laporan berhasil dikirim.');
    }

    public function showStatus()
    {
        // Mengambil laporan yang terkait dengan user yang login dan relasi statusHistories
        $reports = Lapor::where('reporter', Auth::user()->name)->with('statusHistories')->get();
        return view('user.statusLapor', compact('reports'));
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
