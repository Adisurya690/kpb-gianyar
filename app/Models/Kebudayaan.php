<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebudayaan extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(KebudayaanImage::class, 'kebudayaan_id');
    }

}
