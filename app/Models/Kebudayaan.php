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

    // Method untuk mengambil gambar utama (featured image)
    public function getFeaturedImageUrl()
    {
        // Jika featured_image ada, gunakan itu
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }

        // Jika tidak, ambil gambar pertama dari tabel kebudayaan_images
        $firstImage = $this->images->first();
        return $firstImage ? asset('storage/' . $firstImage->path) : asset('images/default-image.png');
    }

}
