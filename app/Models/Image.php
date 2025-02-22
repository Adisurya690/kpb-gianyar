<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'path', // Tambahkan kolom path
        'lapor_id', // Jika Anda juga ingin mengisi lapor_id secara massal
    ];

    public function lapor()
    {
        return $this->belongsTo(Lapor::class, 'lapor_id');
    }
    
}