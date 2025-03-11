<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebudayaanImage extends Model
{
    use HasFactory;

    protected $fillable = ['kebudayaan_id', 'path'];

    public function kebudayaan()
    {
        return $this->belongsTo(Kebudayaan::class);
    }
}
